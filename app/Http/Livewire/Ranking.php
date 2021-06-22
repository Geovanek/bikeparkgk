<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Ranking extends Component
{
    public $usersMale, $usersFemale, $countMale, $countFemale, $totalMaleSegments, $totalFemaleSegments;

    public function render()
    {
        $this->usersMale = User::withCount(['segments' => function ($query) {
                                    $query->where('flagged', false);
                                }])
                                ->withSum('activities', 'laps_to_compensate')
                                ->where('sex', 'M')
                                ->where('subscription', true)
                                ->orderBy('segments_count', 'desc')
                                ->get();
        
        $this->totalMaleSegments = $this->usersMale->sum('segments_count') + $this->usersMale->sum('activities_sum_laps_to_compensate');

        $this->countMale = User::where('sex', 'M')->where('subscription', true)->count();

        $this->usersFemale = User::withCount(['segments' => function ($query) {
                                    $query->where('flagged', false);
                                }])
                                ->withSum('activities', 'laps_to_compensate')
                                ->where('sex', 'F')
                                ->where('subscription', true)
                                ->orderBy('segments_count', 'desc')
                                ->get();
        $this->totalFemaleSegments = $this->usersFemale->sum('segments_count') + $this->usersFemale->sum('activities_sum_laps_to_compensate');

        $this->countFemale = User::where('sex', 'F')->where('subscription', true)->count();

        return view('livewire.ranking');
    }
}
