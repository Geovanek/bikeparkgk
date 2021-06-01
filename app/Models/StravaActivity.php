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
        'strava_activity_id',
        'external_id',
        'activity_upload_id',
        'name',
        'type',
        'start_date',
        'start_date_local',
        'utc_offset',
        'is_analyzed',
    ];

    protected $dates = ['start_date', 'start_date_local'];
}
