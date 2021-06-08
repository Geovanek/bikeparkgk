<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HomeLocalLegend extends Component
{
    public $usersMale, $usersFemale, $countMale, $countFemale;

    public function render()
    {
        $this->usersMale = User::with('segments')
                                ->withCount('segments')
                                ->has('segments')
                                ->where('sex', 'M')
                                ->where('subscription', true)
                                ->orderBy('segments_count', 'desc')
                                ->limit(5)
                                ->get();
        
        $this->countMale = User::where('sex', 'M')->where('subscription', true)->count();

        $this->usersFemale = User::with('segments')
                                ->withCount('segments')
                                ->has('segments')
                                ->where('sex', 'F')
                                ->where('subscription', true)
                                ->orderBy('segments_count', 'desc')
                                ->limit(5)
                                ->get();

        $this->countFemale = User::where('sex', 'F')->where('subscription', true)->count();

        return view('livewire.home-local-legend');
    }
}
