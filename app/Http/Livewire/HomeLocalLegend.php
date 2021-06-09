<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HomeLocalLegend extends Component
{
    public $usersMale, $usersFemale, $countMale, $countFemale, $totalMaleSegments, $totalFemaleSegments;

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
        
        $this->totalMaleSegments = $this->usersMale->sum('segments_count');

        $this->countMale = User::where('sex', 'M')->where('subscription', true)->count();

        $this->usersFemale = User::with('segments')
                                ->withCount('segments')
                                ->has('segments')
                                ->where('sex', 'F')
                                ->where('subscription', true)
                                ->orderBy('segments_count', 'desc')
                                ->limit(5)
                                ->get();
        $this->totalFemaleSegments = $this->usersFemale->sum('segments_count');

        $this->countFemale = User::where('sex', 'F')->where('subscription', true)->count();

        return view('livewire.home-local-legend');
    }
}
