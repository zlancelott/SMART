<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;

class OperationController extends Controller
{
    public function index()
    {
        $stations = Station::with('readers')->orderBy('id')->get();

        return view('operation.index', compact('stations'));
    }
}
