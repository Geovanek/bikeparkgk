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

    protected $listeners = ['destroyUser'];

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

    public function destroyUser($key)
    {

        $user = User::where('id', $key)->firstOrFail();
        $user->delete();

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Usuário deletado.'
        ]);

        $this->emit('footable');
    }

    public function showConfirmation($athleteId)
    { 
        $this->dispatchBrowserEvent('swalConfirm', ['model'=>'User', 'key' => $athleteId]);
    }
}
