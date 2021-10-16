<?php

namespace App\Http\Livewire;

use App\Models\Rachao;
use Livewire\Component;

class RachaoInscritos extends Component
{
    public $athletes, $athletesCount;

    protected $listeners = ['$refresh'];

    public function render()
    {
        $this->athletes = Rachao::all();
        $this->athletesCount = Rachao::where('subscription', '=', 1)->count();
        return view('livewire.rachao-inscritos');
    }
}
