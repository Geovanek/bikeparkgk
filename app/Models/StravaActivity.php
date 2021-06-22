<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Strava;

class StravaActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_id',
        'external_id',
        'activity_upload_id',
        'name',
        'type',
        'start_date',
        'start_date_local',
        'utc_offset',
        'is_analyzed',
        'flagged',
        'elapsed_time',
        'laps_to_compensate',
    ];

    protected $dates = ['start_date', 'start_date_local'];

    public function segments()
    {
        return $this->hasMany(StravaSegment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
