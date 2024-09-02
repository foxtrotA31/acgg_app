<?php

namespace App\Http\Controllers;

use App\Models\PlantCareGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(){

        $my_plants = Auth::user()->plant;

        return view('users.dashboard', ['my_plants' => $my_plants]);

    }
}
