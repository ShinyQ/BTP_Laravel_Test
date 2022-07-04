<?php

namespace App\Http\Controllers;

use App\Models\Method;
use Response;

class HomeController extends Controller
{
    public function index(){
        $methods = Method::with('activity')
            ->orderBy('id')
            ->get();

        $months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni"];

        return view('index', compact('methods', 'months'));
    }
}
