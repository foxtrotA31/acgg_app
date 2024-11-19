<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\IrrigationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(){

        $my_plants = Auth::user()->plant;

        return view('users.dashboard', ['my_plants' => $my_plants]);

    }
    
    public function showIrrigationGraph()
    {
        // This will return the view with empty data or default data for the first load
        return view('users.dashboard');
    }

    public function getIrrigationData(Request $request)
{
    // Ensure we fetch only logs for the authenticated user
    $startDate = Carbon::now()->subWeek();  // past 7 days
    $endDate = Carbon::now();

    // Query irrigation logs based on the authenticated user
    $logs = IrrigationLog::selectRaw('
            DATE(start_time) as date,
            sensor_id,
            SUM(TIMESTAMPDIFF(SECOND, start_time, end_time)) / 60 as total_duration
        ')
        ->where('user_id', Auth::id())  // Filter by authenticated user
        ->whereBetween('start_time', [$startDate, $endDate]) // Filter by date range
        ->groupBy('date', 'sensor_id') // Group by date and sensor
        ->orderBy('date', 'asc') // Order by date
        ->get();

    // Format the data for the chart
    $labels = $logs->groupBy('date')->keys();
    $datasets = [];

    // Group by sensor_id and create a dataset for each sensor
    foreach ($logs->groupBy('sensor_id') as $sensorId => $sensorLogs) {
        $sensorName = 'Sensor ' . $sensorId; // Or fetch actual sensor name from the Sensor model
        $dataset = [
            'label' => $sensorName,
            'data' => $sensorLogs->pluck('total_duration')->toArray(),
            'borderColor' => $this->randomColor(),
            'fill' => false,
        ];

        $datasets[] = $dataset;
    }

    // Return the data as JSON for the AJAX call
    return response()->json([
        'labels' => $labels,
        'datasets' => $datasets
    ]);
}

// Helper function to generate random color for chart lines
private function randomColor()
{
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

   
}
