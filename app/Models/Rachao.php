<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rachao extends Model
{
    protected $table = 'rachao';

    protected $fillable = [
        'name',
        'email',
        'category',
        'phone',
        'subscription',
        'exemption_term'
    ];
}
