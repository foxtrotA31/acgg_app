<?php

namespace App\Http\Controllers;

use App\Models\Plant;
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
        return view('my_plants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $fields = $request->validate([
            'plant_name' => ['required'],
            'irrigation_frequency' => ['required'],
            'action_start' => ['required'],
            'irrigation_status' => ['nullable']
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
        
        return view('my_plants.show', ['plant'=> $my_plant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        //
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
}
