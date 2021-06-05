<?php

namespace App\Http\Livewire;

use App\Models\StravaActivity;
use Livewire\Component;

class HomeActivityStream extends Component
{
    public $activities, $countSegments;

    public function mount()
    {
        $this->activities = StravaActivity::with('user', 'segments')
                                ->withCount('segments')
                                ->has('segments')
                                ->orderBy('start_date_local', 'desc')
                                ->get();
    }

    public function render()
    {
        foreach ($this->activities as $activity) {
            $this->countSegments = $this->countSegments + $activity->segments_count;
        }
        
        return view('livewire.home-activity-stream');
    }
}
