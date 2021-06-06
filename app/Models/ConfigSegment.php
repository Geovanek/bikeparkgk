<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSegment extends Model
{
    use HasFactory;

    protected $fillable = [
        'segment_id',
        'start_date',
        'end_date',

    ];
}
