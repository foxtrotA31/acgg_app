<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\IrrigationLog;
use App\Models\Plant;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IrrigationLogController extends Controller
{
    public function getAllLogs()
    {
        $my_logs = IrrigationLog::join('sensors', 'sensors.id','=', 'irrigation_logs.sensor_id')
                             ->join('plants', 'plants.id', '=', 'sensors.plant_id')
                             ->where('plants.user_id', Auth::user()->id)
                             ->select('irrigation_logs.*')
                             ->get();

        return view('irrigation_logs.index',compact('my_logs'));
    }

    public function startLog(Request $request)
    {   
        // $plant_sensor = Plant::with('sensor')->findOrFail($request->plant_id);
        $sensor = Sensor::findOrFail($request->sensor_id);

        if($sensor->action_status === NULL || $sensor->action_status === 0){
            $sensor->update([
                'action_status' => 1,
            ]);
        }

        $irrigationLog = IrrigationLog::create([
            'sensor_id' => $request->sensor_id,
            'start_time' => Carbon::now('Asia/Shanghai'),
        ]);

        return response()->json(['id' => $irrigationLog->id]);
    }

    public function endLog(Request $request, $id)
    {
        $irrigationLog = IrrigationLog::findOrFail($id);

        $irrigationLog->update([
            'end_time' => Carbon::now('Asia/Shanghai'),
        ]);

        $sensor = $irrigationLog->sensor;

        
        if ($sensor->action_status === 1) {

            $sensor->update([
                'action_status' => 0]
            );

        }

        return response()->json(['message' => 'Irrigation log updated successfully']);
    }

    public function getLogs($id)
    {
        $logs = IrrigationLog::where('sensor_id', $id)->get();
        return response()->json($logs);
    }
}
