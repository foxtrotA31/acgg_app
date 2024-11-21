<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'pc_id',
        'plant_name',
        'monitoring_status',
    ];

    public function plantCategory() 
    {
        return $this->belongsTo(PlantCategory::class,'pc_id');
        
    }

    public function sensor()
    {
        return $this->hasOne(Sensor::class);
    }

}
