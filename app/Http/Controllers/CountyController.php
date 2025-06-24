<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class CountyController extends Controller
{

    public function index() {

        $counties = Role::all();

        return view('counties.index')->with('counties', $counties);

    }

}
