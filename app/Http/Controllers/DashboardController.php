<?php

namespace App\Http\Controllers;

use App\Models\flow_metter;
use App\Models\FlowMetter;
use App\Models\Meteran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $flow_metter = FlowMetter::all();
        return view('disini',compact('flow_metter   '));
    }
   
}
