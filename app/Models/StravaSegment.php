<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StravaSegment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'strava_activity_id',
        'segment_id',
        'segment_lap_id',
        'segment_name',
        'distance',
        'city',
        'state',
        'country',
        'start_date',
        'start_date_local',
    ];

    public function activity()
    {
        return $this->belongsTo(StravaActivity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
