<?php

namespace App\Console\Commands;

use App\Models\Guest;
use App\Models\User;
use App\Notifications\LeaderChangedPush;
use App\Notifications\LegendNotification;
use App\Notifications\WebPushNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class AnalyseActivities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'strava:analyseactivities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Analisando atividades dos atletas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
	Log::info('Analisando atividades');
        // Loop through users updating stats
        $users = User::get();

        if (count($users) > 0) {

            $users->each(function($user) {

	            Log::info('Analisando métricas para o usuário '. $user->strava_id . 'do Strava');

                $user->profile_link = 'https://www.strava.com/athletes/'. $user->strava_id;
                return $user;

            });

	        // Update the leader board
	        Log::info('Procurando o Líder');
            $users = $users->sortByDesc('total_distance_meters');// Sort by largest distance
            $leader_changed = false;
            $isFirst = true;
            $leader_activity_time = null;
            $leader = null;
            $users->each(function($user) use (&$leader_changed, &$isFirst, &$leader_activity_time, &$leader){
    		// Is this the first entry (leader)
                if ($isFirst) {
		        Log::info('Processing leader '. $user->strava_id);
	    	    // Was this already the leader?
                    if (!$user->is_in_lead){
                        Log::info($user->strava_id .' took the lead at '. $leader_activity_time);
                        $user->is_in_lead = true;
		            	$user->last_took_lead = $user->activities_until;
                        $leader_activity_time = $user->activities_until;
			            $leader_changed = true;
			            $leader = $user->username;
                    }
                    $isFirst = false;
		} else {
		    Log::info('Processing non-leaders '. $user->strava_id);
            // Has the leader changed?
            if ($leader_changed) {
                // Was this athlete the previous leader?
                if ($user->is_in_lead) {
                    Log::info($user->strava_id .' lost the lead at '. $leader_activity_time);
                    // Increase time in lead
                    $user->time_in_lead += $user->last_took_lead->diffInSeconds($leader_activity_time);
                    $user->time_in_lead_hum = $this->secondsToTime($user->time_in_lead);
                }
                $user->is_in_lead = false;
            }
        }

       $user->save();
        });
        }

        // Send push notification
        if ($leader_changed) {
            Notification::send(Guest::all(), new LegendNotification('Lockdown Challenge', $leader .' just took the lead'));
        }
        return 0;
    }

    /**
     * Convert seconds to a human readable "1 day, 23 hours, 32 minutes"
     * @param $inputSeconds
     * @return string
     */
    protected function secondsToTime($inputSeconds) {
        $secondsInAMinute = 60;
        $secondsInAnHour = 60 * $secondsInAMinute;
        $secondsInADay = 24 * $secondsInAnHour;

        // Extract days
        $days = floor($inputSeconds / $secondsInADay);

        // Extract hours
        $hourSeconds = $inputSeconds % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);

        // Extract minutes
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);

        // Extract the remaining seconds
        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);

        // Format and return
        $timeParts = [];
        $sections = [
            'day' => (int)$days,
            'hour' => (int)$hours,
            'minute' => (int)$minutes,
            'second' => (int)$seconds,
        ];

        foreach ($sections as $name => $value){
            if ($value > 0){
                $timeParts[] = $value. ' '.$name.($value == 1 ? '' : 's');
            }
        }

        return implode(', ', $timeParts);
    }
}
