<?php

namespace App\Services;

use App\Models\Rachao;

class RachaoService
{
    private $athlete;
    private $subscription;

    public function activating(Rachao $athlete, int $subscription): array
    {
        $this->athlete = $athlete;
        $this->subscription = ($subscription === 0) ? 1 : 0;

        $query = $this->athlete->update(['subscription' => $this->subscription]);

        if (!$query) {
            $type = 'warning'; 
            $message = 'Não foi possível executar a tarefa. Tente novamente ou contate o suporte.';

            return (['type' => $type, 'message' => $message]);
        }
        
        $type = 'success';
        $message = ($subscription === 0) ? 'Inscrição confirmada.' : 'Inscrição ainda não foi confirmada.';

        return (['type' => $type, 'message' => $message]);
    }
}