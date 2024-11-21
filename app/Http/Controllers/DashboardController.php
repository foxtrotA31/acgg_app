<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\IrrigationLog;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(){
                
        return view('users.dashboard');
    }

    public function getIrrigationData(Request $request)
    {
        
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        
        $logs = IrrigationLog::selectRaw('
                MONTH(start_time) as month,
                sensor_id,
                SUM(TIMESTAMPDIFF(SECOND, start_time, end_time)) / 60 as total_duration
            ')
            ->join('sensors', 'sensors.id', '=', 'irrigation_logs.sensor_id') // Join with sensors table
            ->join('plants', 'plants.id', '=', 'sensors.plant_id') // Join with plants table
            ->where('plants.user_id', Auth::id())
            ->groupBy('month', 'sensor_id') // Group by date and sensor
            ->orderBy('month', 'asc') // Order by date
            ->get();
        
        $labels = $logs->groupBy('month')->keys()->map(function ($month) {
            return Carbon::create()->month($month)->format('F'); // Full month name
        });
        $datasets = [];

        
        foreach ($logs->groupBy('sensor_id') as $sensorId => $sensorLogs) {
            $sensorId = 'Sensor ' . $sensorId; 
            $dataset = [
                'label' => $sensorId,
                'data' => $sensorLogs->pluck('total_duration')->toArray(),
                'borderColor' => $this->randomColor(),
                'fill' => false,
            ];

            $datasets[] = $dataset;
        }

    // Return the data as JSON for the AJAX call
        return response()->json([ 'labels' => $labels, 'datasets' => $datasets]);
    }
    

// Helper function to generate random color for chart lines
    private function randomColor()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    public function getDeviceAction() {
        // Select only the id and action_status for simplicity
        $devices = Sensor::select('sensors.id', 'sensors.action_status')
            ->join('plants','plants.id','=','sensors.plant_id')
            ->where('plants.user_id', Auth::id())
            ->get();
        return response()->json($devices);
    }
}
