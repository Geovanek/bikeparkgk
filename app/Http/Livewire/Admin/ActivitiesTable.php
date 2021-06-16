<?php

namespace App\Http\Livewire\Admin;

use App\Models\StravaActivity;
use Livewire\Component;

class ActivitiesTable extends Component
{
    public $activities;
    public $flagged;
    public $activityId;

    protected $listeners = ['destroy'];

    protected $messages = [
        'flagged.required' => 'Oops! Ocorreu um erro. Por favor, contate o suporte.',
        'flagged.boolean' => 'O valor informado para sinalizar a atividade esta incorreto. Por favor contate o suporte.',
    ];

    public function render()
    {
        $this->activities = StravaActivity::with('user', 'segments')
                                ->withCount('segments')
                                ->has('segments')
                                ->orderBy('start_date_local', 'desc')
                                ->get();

        return view('livewire.admin.activities-table');
    }

    public function flagged($activityId, $flagged)
    {
        $activity = StravaActivity::where('id', $activityId)->firstOrFail();
        $return = app(FlaggedService::class)->flagging($activity, $flagged);

        $this->emit('footable');
        
        $this->emit('message', [
            'type' => $return['type'], 
            'message' => $return['message'],
        ]);
    }

    public function destroy($key)
    {

        $activity = StravaActivity::where('id', $key)->firstOrFail();
        $activity->delete();

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Atividade deletada.'
        ]);

        $this->emit('footable');
    }

    public function showConfirmation($activityId)
    { 
        $this->dispatchBrowserEvent('swalConfirm', ['key' => $activityId]);
    }
}
