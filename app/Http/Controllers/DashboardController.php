<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index(){


        $county = Auth::user()->county_id;

       

        return view('dashboard.index')->with('county', $county);
    }
}
