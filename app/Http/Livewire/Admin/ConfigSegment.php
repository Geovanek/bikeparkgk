<?php

namespace App\Http\Livewire\Admin;

use App\Models\ConfigSegment as ModelsConfigSegment;
use Livewire\Component;

class ConfigSegment extends Component
{
    public $configSegment, $segment_id, $start_date, $end_date;

    public function render()
    {
        $this->configSegment = ModelsConfigSegment::first();

        return view('livewire.admin.config-segment');
    }

    public function updateOrCreate()
    {
        $validate = $this->validate([
            'segment_id' => "required",
            'start_date' => "required",
            'end_date' => "required",
        ]);
    
        $configSegment = ModelsConfigSegment::updateOrCreate(
            ['id' => 1],
            $validate
        );

        $this->configSegment = $configSegment;

        $this->emit('message', [
            'type' => 'success', 
            'message' => 'Segmento atualizado com sucesso.'
        ]);

        $this->resetInputFields();
        $this->emit('closeModal');
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->reset([
            'segment_id', 'start_date', 'end_date'
        ]);
        //$this->resetErrorBag('email');
    }
}
