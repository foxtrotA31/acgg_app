<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class PlantCategory extends Model
{
    use HasFactory;

     protected $fillable = [
        'pc_name',
        'pc_ideal_moisture',
        'pc_wilting_point',
        'pc_description'
    ];

     public function plant() : HasMany 
    {
        return $this->hasMany(Plant::class, 'pc_id','id');
        
    }
}


