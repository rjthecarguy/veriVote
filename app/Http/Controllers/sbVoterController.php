<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SbVoter;

class sbVoterController extends Controller
{
    public function search(Request $request)
{
    $query = SbVoter::query();

    if ($request->filled(strtoupper('name_last'))) {
        $query->where('name_last', 'like', '%' . $request->name_last . '%');
    }

    if ($request->filled(strtoupper('name_first'))) {
        $query->where('name_first', 'like', '%' . $request->name_first . '%');
    }

    if ($request->filled('house_number')) {
        $query->where('house_number', $request->house_number);
    }

    if ($request->filled(strtoupper('street'))) {
        $query->where('street', 'like', '%' . $request->street . '%');
    }

    if ($request->filled(strtoupper('city'))) {
        $query->where('city', 'like', '%' . $request->city . '%');
    }

    $results = $query->get();

    return response()->json($results);
}
}
