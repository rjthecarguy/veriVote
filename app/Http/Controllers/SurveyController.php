<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{

    // Show all surveys in standard table
    public function index()
    {
        // Get all surveys and return the view
        $surveys = Survey::all();
        return view('surveys.index', compact('surveys'));
    }

    // Create new survey - return create view
    public function create()
    {
        return view('surveys.create');
    }

    // Get data from create view and store new suvy
    public function store(Request $request)
    {
    

        $validated = $request->validate([
             'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

         Survey::create($validated);

        // Back to index 
       // return redirect()->route('surveys.index')->with('success', 'Survey created.'); 
       return redirect()->back()->with('success', 'Survey created.'); 
    
    }

   // Show a single survey title
    public function show(Survey $survey)
    {
        return view('surveys.show', compact('survey'));
    }

    // Edit survey title
    public function edit(Survey $survey)
    {
        return view('surveys.edit', compact('survey'));
    }

    // Update survey title
    public function update(Request $request, Survey $survey)
    {
        $survey->update($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));

        return redirect()->route('surveys.index')->with('success', 'Survey updated.');
    }

    // Delete survey
    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index')->with('success', 'Survey deleted.');
    }
}
