<?php

namespace App\Http\Livewire;

use App\Models\StravaActivity;
use App\Models\StravaSegment;
use Livewire\Component;

class ActivityStream extends Component
{
    public $activities, $email;

    public function mount()
    {
        $this->activities = StravaActivity::with('segments')
                                ->where('user_id', request()->id)
                                ->has('segments')
                                ->orderBy('start_date_local', 'desc')
                                ->get();
    }

    public function render()
    {
        return view('livewire.activity-stream');
    }
}
