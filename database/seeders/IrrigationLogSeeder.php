<?php

namespace Database\Seeders;

use App\Models\IrrigationLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IrrigationLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        IrrigationLog::create([
            'sensor_id' => '82640',
            'start_time' => '2024-11-10 04:00:00',
            'end_time' => '2024-11-10 04:05:00',
        ]);

        IrrigationLog::create([
            'sensor_id' => '82640',
            'start_time' => '2024-11-11 04:41:29',
            'end_time' => '2024-11-11 04:47:27',
        ]);

        IrrigationLog::create([
            'sensor_id' => '82640',
            'start_time' => '2024-11-12 05:28:16',
            'end_time' => '2024-11-12 05:30:11',
        ]);

        IrrigationLog::create([
            'sensor_id' => '23126',
            'start_time' => '2024-11-10 05:30:00',
            'end_time' => '2024-11-10 05:40:00',
        ]);

        IrrigationLog::create([
            'sensor_id' => '23126',
            'start_time' => '2024-11-11 05:40:29',
            'end_time' => '2024-11-11 05:45:27',
        ]);

        IrrigationLog::create([
            'sensor_id' => '23126',
            'start_time' => '2024-11-12 06:30:16',
            'end_time' => '2024-11-12 06:43:11',
        ]);

        IrrigationLog::create([
            'sensor_id' => '96301',
            'start_time' => '2024-11-10 07:00:00',
            'end_time' => '2024-11-10 07:05:00',
        ]);

        IrrigationLog::create([
            'sensor_id' => '96301',
            'start_time' => '2024-11-11 04:40:29',
            'end_time' => '2024-11-11 04:45:27',
        ]);

        IrrigationLog::create([
            'sensor_id' => '96301',
            'start_time' => '2024-11-12 05:15:16',
            'end_time' => '2024-11-12 05:25:11',
        ]);

    }
}