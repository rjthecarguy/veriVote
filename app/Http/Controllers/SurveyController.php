<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Survey;

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
        Survey::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));

        return redirect()->route('surveys.index')->with('success', 'Survey created.');
    }

    public function show(Survey $survey)
    {
        return view('surveys.show', compact('survey'));
    }

    public function edit(Survey $survey)
    {
        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        $survey->update($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));

        return redirect()->route('surveys.index')->with('success', 'Survey updated.');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index')->with('success', 'Survey deleted.');
    }
}
