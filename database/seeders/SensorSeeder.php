<?php

namespace Database\Seeders;

use App\Models\Sensor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Sensor::create([
            'id' => '82640',
            'sensor_type' => 'Soil Moisture',
        ]);

        Sensor::create([
            'id' => '23126',
            'sensor_type' => 'Soil Moisture',
        ]);

        Sensor::create([
            'id' => '96301',
            'sensor_type' => 'Soil Moisture',
        ]);
    }
}
