<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    function __construct(){
        $this->middleware('verified');
    }

    function Dashboard(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('-','');
        return view('Dashboard.dashboard',[
            'last'=>$last,
        ]);
    }
}
