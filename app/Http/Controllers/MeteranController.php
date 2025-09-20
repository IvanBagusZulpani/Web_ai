<?php

namespace App\Http\Controllers;

use App\Models\Meteran;

class MeteranController extends Controller
{
    public function index()
    {
        $meteran = Meteran::latest()->get();
        return view('disini', compact('meteran'));
    }
}
