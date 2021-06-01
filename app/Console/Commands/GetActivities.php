<?php

namespace App\Console\Commands;

use App\Models\StravaActivity;
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

        if (count($users) == 0) {
            Log::info('Nenhum usuário encontrado.');
        } else {
            Log::info(count($users) . ' usuário(s) encontrado(s).');

            $users->each(function ($user) {
                Log::info('Obtendo atividades do usuário '. $user->id);

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

                // Set starting date to get activities from if not set
                if (empty($user->activities_until)) {
                    Log::info('Não foram encontradas atividades deste usuário, obtendo atividades desde 03-06-2021.');
                    $user->activities_until = Carbon::createMidnightDate('2021', '05', '20');;
                    $user->save();
                }

                //if ($user->activities_until->lessThanOrEqualTo(Carbon::createMidnightDate('2021', '06', '23'))) {

                    $now = Carbon::now()->timestamp;
                    $activities = collect(Strava::activities($user->access_token, 1, 100, $now, ($user->activities_until->timestamp - 1)));
                    $activities = $activities->reverse();

                    if(count($activities) == 0) {
                        Log::info('Nenhuma atividade encontrada para o usuário.');
                    } else {
                        Log::info(count($activities) .' atividade(s) encontrada(s).');

                        $activities->each(function ($activity) use (&$user) {

                            if (count($user->activities()->where('id', '=', $activity->id)->get()) > 0) {
                                Log::info('A atividade ' . $activity->id . ' já existe.');
                            } else {
                                Log::info('Criando atividade '. $activity->id);

                                /* StravaActivity::create([
                                    'user_id' => $user->id,
                                    'external_id' => $activity->external_id,
                                    'activity_upload_id' => $activity->upload_id,
                                    'name' => $activity->name,
                                    'type' => strtolower($activity->type),
                                    'start_date' => Carbon::parse($activity->start_date),
                                    'start_date_local' => Carbon::parse($activity->start_date_local),
                                    'utc_offset' => $activity->utc_offset,
                                ]); */

                                $user->activities_until = Carbon::parse($activity->start_date)->addSeconds($activity->elapsed_time);

                                // Verificação do segmento na atividade e contagem de voltas
                                $getSegments = Strava::activity($user->access_token, $activity->id);
                                $segments = collect($getSegments->segment_efforts);
                                
                                $segments->each(function ($segment) use (&$user) {
                                    if ($segment->segment->id == '23142740') {
                                        dd($segment->name);
                                    }
                                });
                            }
                        });
                        $user->save();
                    }

                    Log::info('Registro de atividades e voltas no segmentos concluídas para o usuário '. $user->id);
                //}
            });
        }

        // Analyse Activities
        //$this->call('strava:analyseactivities');

        // Generate updated at and next update timestamps
        $now = Carbon::now();
        Cache::store('file')->put('strava_get_activities_time', $now->toDateTimeString());
        $now = $now->addMinutes(15);
        $start = Carbon::createFromTimeString('05:00');
        $end = Carbon::createFromTimeString('23:00');


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
