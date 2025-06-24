<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SbVoter;

class sbVoterController extends Controller
{
    public function search(Request $request)
{
     // Start query
     $query = SbVoter::query();

     // Convert to upper case    
     $name_last = strtoupper($request->name_last);
     $name_first = strtoupper($request->name_first);
     $street = strtoupper($request->street);
     $city = strtoupper($request->city);

    // Ensure strings have value, if so, add to query

    $query->when($name_last, function ($q, $value) {
        $q->where('name_last',  'like', '%' . $value . '%');
    });


    $query->when($name_first, function ($q, $value) {
        $q->where('name_first', 'like', '%' . $value . '%');
    });


    $query->when($request->house_number, function ($q, $value) {
        $q->where('house_number', $value);
    });

    $query->when($street, function ($q, $value) {
        $q->where('street', 'like', '%' . $value .'%');
    });


    $query->when($city, function ($q, $value) {
        $q->where('city', 'like', '%' . $value . '%');
    });


    // Execute query and get results
    $results = $query->get();

   

    return response()->json($results); 
}
}
