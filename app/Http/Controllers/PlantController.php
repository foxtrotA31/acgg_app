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
        $my_plants = Auth::user()->plant()->latest()->paginate(10);

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
        $fields = $request->validate([
            'plant_name' => ['required'],
            'pc_id' => ['required'],
        ]);
        
        Auth::user()->plant()->create($fields);
        
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
        
        return redirect()->route('my_plants.show', $my_plant->id) ->with('success', 'Sensor Connected and Activated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $my_plant)
    {
        $plant = Plant::find($my_plant->id);

        $plant->delete();

       return back()->with('delete', 'You have just ended monitoring a plant');
    }

     public function getPlantDetailsByCategory(Request $request)
    {
        $pc_id = $request->pc_id;
        $plants = PlantCategory::where('id', $pc_id)->get();

        return response()->json($plants);
    }
}
