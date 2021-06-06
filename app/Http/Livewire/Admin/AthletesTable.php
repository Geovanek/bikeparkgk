<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Services\SubscriptionService;

class AthletesTable extends Component
{
    public $athletes;
    public $subscription;
    public $athleteId;

    protected $messages = [
        'subscription.required' => 'Oops! Ocorreu um erro. Por favor, contate o suporte.',
        'subscription.boolean' => 'O valor informado para ativação esta incorreto. Por favor contate o suporte.',
    ];

    public function render()
    {
        $this->athletes = User::get();
        return view('livewire.admin.athletes-table');
    }

    public function subscription($athleteId, $subscription)
    {
        $athlete = User::where('id', $athleteId)->firstOrFail();
        $return = app(SubscriptionService::class)->activating($athlete, $subscription);

        $this->emit('footable');
        
        $this->emit('message', [
            'type' => $return['type'], 
            'message' => $return['message'],
        ]);
    }
}
