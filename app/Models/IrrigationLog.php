<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IrrigationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'sensor_id',
        'start_time',
        'end_time',
    ];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class,'sensor_id');
    }
}
