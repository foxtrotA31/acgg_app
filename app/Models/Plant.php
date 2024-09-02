<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

     protected $fillable = [
        'plant_name',
        'irrigation_frequency',
        'action_start',
        'irrigation_status'
    ];
}
