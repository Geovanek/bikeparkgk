<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HomeLocalLegend extends Component
{
    public $usersMale, $usersFemale;

    public function render()
    {
        $this->usersMale = User::with('segments')
                                ->withCount('segments')
                                ->where('sex', 'M')
                                ->where('subscription', true)
                                ->orderBy('segments_count', 'desc')
                                ->limit(5)
                                ->get();

        $this->usersFemale = User::with('segments')
                                ->withCount('segments')
                                ->where('sex', 'F')
                                ->where('subscription', true)
                                ->orderBy('segments_count', 'desc')
                                ->limit(5)
                                ->get();

        return view('livewire.home-local-legend');
    }
}
