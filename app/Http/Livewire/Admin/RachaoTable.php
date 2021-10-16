<?php

namespace App\Http\Livewire\Admin;

use App\Models\Rachao;
use App\Services\RachaoService;
use Livewire\Component;

class RachaoTable extends Component
{
    public $athletes;
    public $subscription;
    public $athleteId;

    protected $listeners = ['destroyAthlete'];

    protected $messages = [
        'subscription.required' => 'Oops! Ocorreu um erro. Por favor, contate o suporte.',
        'subscription.boolean' => 'O valor informado para ativação esta incorreto. Por favor contate o suporte.',
    ];

    public function render()
    {
        $this->athletes = Rachao::get();
        return view('livewire.admin.rachao-table');
    }

    public function subscription($athleteId, $subscription)
    {
        $athlete = Rachao::where('id', $athleteId)->firstOrFail();
        $return = app(RachaoService::class)->activating($athlete, $subscription);

        $this->emit('footable');
        
        $this->emit('message', [
            'type' => $return['type'], 
            'message' => $return['message'],
        ]);
    }

    public function destroyAthlete($key)
    {

        $user = Rachao::where('id', $key)->firstOrFail();
        $user->delete();

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Atleta deletado.'
        ]);

        $this->emit('footable');
    }

    public function showConfirmation($athleteId)
    { 
        $this->dispatchBrowserEvent('swalConfirm', ['model'=>'Rachao', 'key' => $athleteId]);
    }
}
