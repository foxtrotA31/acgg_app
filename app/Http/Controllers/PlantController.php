<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plant;
use App\Models\Sensor;
use App\Models\PlantCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $my_plants = Auth::user()->plant()->where('monitoring_status','!=',3)->latest()->paginate(10);
        // 3 means terminated

        return view('my_plants.index', ['my_plants' => $my_plants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = PlantCategory::all();
        return view('my_plants.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'pc_id' => ['required'],
            'plant_name' => ['required'],
        ]);
        
        Auth::user()->plant()->create([
            'pc_id' => $request->pc_id,
            'plant_name' => $request->plant_name,
            'monitoring_status' => 0
        ]);
        
        return back()->with('success','Plant Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $my_plant)
    {
        //
        if ($my_plant->sensor) 
        {
            $plant = $my_plant->load('plantCategory', 'sensor');
        } 
        else 
        {
            $plant = $my_plant->load('plantCategory');
        }
        
        return view('my_plants.show', ['plant' => $plant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $my_plant)
    {   
        $plant = Auth::user()->plant()->where('id', $my_plant->id)->first();
        return view('my_plants.edit',compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $my_plant)
    {
        
        $sensor = Sensor::find($request->sensor_id);
        
        $sensor->update([
            'plant_id' => $my_plant->id,
            'ping_status' => 1, 
            'ping_date' => Carbon::now('Asia/Shanghai'),
        ]);

        $my_plant->update([
            'monitoring_status' => 1
        ]);
        
        return redirect()->route('my_plants.show', $my_plant->id) ->with('success', 'Sensor Connected and Activated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $my_plant)
    {   
        $sensor = Sensor::where('plant_id','=',$my_plant->id)
        ->update([
            'plant_id' => null,
            'ping_status' => null,
            'action_status' => null, 
            'ping_date' => null,
        ]);

        $my_plant->update([
            'monitoring_status' => 0
        ]);

       return back()->with('quit', 'Monitoring for plant '.$my_plant->plant_name.' has been terminated and it has been removed from the list. All irrigation logs associated with this plant, if linked to a sensor device, will be retained.');
    }

     public function getPlantDetailsByCategory(Request $request)
    {
        $pc_id = $request->pc_id;
        $plants = PlantCategory::where('id', $pc_id)->get();

        return response()->json($plants);
    }

}
