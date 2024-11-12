<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_id',
        'sensor_type',
        'ping_status',
        'action_status',
        'ping_date',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }

    public function irrigationLog() : HasMany 
    {
        return $this->hasMany(IrrigationLog::class);
        
    }
    
}
