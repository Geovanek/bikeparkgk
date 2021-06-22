<?php

namespace App\Http\Livewire;

use App\Models\StravaActivity;
use Livewire\Component;

class HomeActivityStream extends Component
{
    public $activities, $countSegments;

    public function mount()
    {
        $this->activities = StravaActivity::with('user')
                                ->withCount('segments')
                                ->has('segments')
                                ->where('flagged', false)
                                ->orderBy('start_date_local', 'desc')
                                ->get();
    }

    public function render()
    {
        foreach ($this->activities as $activity) {
            $this->countSegments = $this->countSegments + $activity->segments_count + $activity->laps_to_compensate;
        }
        
        return view('livewire.home-activity-stream');
    }
}
