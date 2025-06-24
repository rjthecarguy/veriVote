<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SbVoter;

class sbVoterController extends Controller
{
    public function search(Request $request)

{
    

     $query = SbVoter::query();

 
     $name_last = strtoupper($request->name_last);
     $name_first = strtoupper($request->name_first);
     $street = strtoupper($request->street);
     $city = strtoupper($request->city);


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

    $results = $query->get();

   

    return response()->json($results); 
}
}
