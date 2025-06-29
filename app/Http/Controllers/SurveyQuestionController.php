<?php

namespace App\Http\Controllers;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyOption;


use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function create(Survey $survey)
    {
        return view('survey_questions.create', compact('survey'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'survey_id' => 'required|exists:surveys,id',
            'question_text' => 'required|string',
            'question_type' => 'required|in:multiple_choice,open_ended',
            'options' => 'array'
        ]);

        $question = SurveyQuestion::create($validated);

        if ($validated['question_type'] === 'multiple_choice' && $request->has('options')) {
            foreach ($request->options as $text) {
                SurveyOption::create([
                    'survey_question_id' => $question->id,
                    'option_text' => $text
                ]);
            }
        }

        return redirect()->route('surveys.show', $validated['survey_id'])->with('success', 'Question added.');
    }
}
