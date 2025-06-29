<?php

namespace App\Http\Controllers;
use App\Models\Survey;


use Illuminate\Http\Request;

class SurveyAnswerController extends Controller
{
    public function store(Request $request, Survey $survey)
    {
        $user = auth()->user();

        foreach ($request->input('answers') as $questionId => $input) {
            SurveyAnswer::create([
                'user_id' => $user->id,
                'survey_id' => $survey->id,
                'survey_question_id' => $questionId,
                'survey_option_id' => $input['option_id'] ?? null,
                'answer_text' => $input['text'] ?? null,
            ]);
        }

        return redirect()->route('surveys.index')->with('success', 'Thank you for your answers.');
    }
}
