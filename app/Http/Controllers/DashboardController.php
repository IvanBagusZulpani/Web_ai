<?php

namespace App\Http\Controllers;

use App\Models\flow_metter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $flow_metter = flow_metter::all();
        return view('disini',compact('flow_metters'));
    }
}
