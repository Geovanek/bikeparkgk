<?php

namespace App\Services;

use App\Models\StravaActivity;
use App\Models\StravaSegment;

class FlaggedService
{
    private $activity;
    private $flagged;

    public function flagging(StravaActivity $activity, int $flagged): array
    {
        $this->activity = $activity;
        $this->flagged = ($flagged === 0) ? 1 : 0;

        $query = $this->activity->update(['flagged' => $this->flagged]);
        $query2 = $this->activity->segments->toQuery()->update(['flagged' => $this->flagged]);

        if (!$query OR !$query2) {
            $type = 'warning'; 
            $message = 'Não foi possível executar a tarefa. Tente novamente ou contate o suporte.';

            return (['type' => $type, 'message' => $message]);
        }
        
        $type = 'success';
        $message = ($flagged === 0) ? 'Atividade sinalizada.' : 'Atividade liberada.';

        return (['type' => $type, 'message' => $message]);
    }
}