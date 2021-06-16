<?php

namespace App\Console\Commands;

use App\Models\ConfigSegment;
use App\Models\StravaActivity;
use App\Models\StravaSegment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Strava;

class GetActivities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'strava:getactivities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Obter todas as atividades';

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
        Log::info('Obtendo as atividades.');
        Log::info('Obtendo usuários.');

        $users = User::get();
        $configSegment = ConfigSegment::first();

        if (count($users) == 0) {
            Log::info('Nenhum usuário encontrado.');
        } else {
            Log::info(count($users) . ' usuário(s) encontrado(s).');

            $users->each(function ($user) use (&$configSegment) {
                if ($user->subscription == false) {
                    Log::info('Usuário ainda não efetuou o pagamento da inscrição '. $user->id);
                } else {
                    Log::info('Obtendo atividades do usuário '. $user->id);

                    // Set starting date to get activities from if not set
                    if (empty($user->activities_until)) {
                        Log::info('Não foram encontradas atividades deste usuário, obtendo atividades desde'. $user->activities_until);
                        $user->activities_until = Carbon::createMidnightDate($configSegment->start_date);
                        $user->save();
                    }

                    if ($user->activities_until->lessThanOrEqualTo(Carbon::createMidnightDate($configSegment->end_date)->addHours(23)->addMinutes(59))) {

                        // Make sure Strava API Token is valid
                        if (Carbon::now() > $user->expires_at) {
                            Log::info('API Token expirou, atualizando o token.');
                            // Token has expired, generate new tokens using the currently stored user refresh token
                            $refresh = Strava::refreshToken($user->refresh_token);

                            $user->update([
                                'access_token' => $refresh->access_token,
                                'refresh_token' => $refresh->refresh_token,
                                'expires_at' => Carbon::createFromTimestamp($refresh->expires_at)
                            ]);

                            $user->save();
                        }

                        $now = Carbon::now()->timestamp;
                        $activities = collect(Strava::activities($user->access_token, 1, 100, $now, ($user->activities_until->timestamp - 1)));
                        $activities = $activities->reverse();

                        if(count($activities) == 0) {
                            Log::info('Nenhuma atividade encontrada para o usuário.');

                            $user->activities_until = Carbon::parse($user->activities_until)->addHours(2);

                            $user->save();
                            
                        } else {
                            Log::info(count($activities) .' atividade(s) encontrada(s).');

                            $activities->each(function ($activity) use (&$user, &$configSegment) {

                                if (count($user->activities()->where('id', '=', $activity->id)->get()) > 0) {
                                    Log::info('A atividade ' . $activity->id . ' já existe.');
                                } else {
                                    Log::info('Criando atividade '. $activity->id);

                                    $lastActivity =  StravaActivity::create([
                                        'user_id' => $user->id,
                                        'activity_id' => $activity->id,
                                        'external_id' => $activity->external_id,
                                        'activity_upload_id' => $activity->upload_id,
                                        'name' => $activity->name,
                                        'type' => strtolower($activity->type),
                                        'start_date' => Carbon::parse($activity->start_date),
                                        'start_date_local' => Carbon::parse($activity->start_date_local),
                                        'utc_offset' => $activity->utc_offset,
                                    ]);

                                    $user->activities_until = Carbon::parse($activity->start_date_local)->addSeconds($activity->elapsed_time)->addHours(4);

                                    // Verificação do segmento na atividade e contagem de voltas
                                    $getSegments = Strava::activity($user->access_token, $activity->id);
                                    $segments = collect($getSegments->segment_efforts);

                                    $countSegments = $segments
                                        ->filter( function ($segment) use (&$configSegment) {
                                            return $segment->segment->id == $configSegment->segment_id;
                                        })->map( function ($segment) use (&$user, &$lastActivity) {
                                            return [
                                                'user_id' => $user->id,
                                                'strava_activity_id' => $lastActivity->id,
                                                'segment_id' => $segment->segment->id,
                                                'segment_lap_id' => $segment->id,
                                                'segment_name' => $segment->name,
                                                'distance' => $segment->distance,
                                                'city' => $segment->segment->city,
                                                'state' => $segment->segment->state,
                                                'country' => $segment->segment->country,
                                                'start_date' => Carbon::parse($segment->start_date),
                                                'start_date_local' => Carbon::parse($segment->start_date_local),
                                            ];
                                        });

                                    StravaSegment::insert($countSegments->toArray());
                                    
                                    Log::info('Voltas nos segmento registrados para a atividade'. $lastActivity->id .' do usuário '. $user->id);
                                }
                            });
                            $user->save();
                        }

                        Log::info('Registro de atividades e voltas no segmentos concluídas para o usuário '. $user->id);
                    }
                }
            });
        }

        // Analyse Activities
        //$this->call('strava:analyseactivities');

        // Generate updated at and next update timestamps
        $now = Carbon::now();
        Cache::store('file')->put('strava_get_activities_time', $now->toDateTimeString());
        $now = $now->addMinutes(15);
        $start = Carbon::createFromTimeString('07:00');
        $end = Carbon::createFromTimeString('20:00');

        if ($now->between($start, $end)) {
            Cache::store('file')->put('strava_next_activities_time', $now->toDateTimeString());
        } else {
            if ($now->isBefore($start)) {
                Cache::store('file')->put('strava_next_activities_time', Carbon::create($now->year,$now->month,$now->day,5,0,0)->toDateTimeString());
            } else {
                Cache::store('file')->put('strava_next_activities_time', Carbon::create($now->year,$now->month,$now->day,5,0,0)->addDay()->toDateTimeString());
            }
        }
        return 0;
    }
}
