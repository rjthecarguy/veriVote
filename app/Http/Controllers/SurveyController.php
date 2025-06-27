<?php

// app/Http/Controllers/SurveyController.php
namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('surveys.index', compact('surveys'));
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Survey::create($request->only('title', 'description'));

        return redirect()->route('surveys.index')->with('success', 'Survey created.');
    }

    public function edit(Survey $survey)
    {
        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $survey->update($request->only('title', 'description'));

        return redirect()->route('surveys.index')->with('success', 'Survey updated.');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index')->with('success', 'Survey deleted.');
    }
}
