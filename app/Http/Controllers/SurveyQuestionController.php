<?php 

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function create(Survey $survey)
    {
        return view('survey_questions.create', compact('survey'));
    }

    public function store(Request $request, Survey $survey)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:text,multiple_choice',
            'options' => 'array|nullable',
            'options.*' => 'nullable|string|max:255'
        ]);

        $question = $survey->questions()->create([
            'question' => $request->question,
            'type' => $request->type
        ]);

        if ($request->type == 'multiple_choice' && $request->options) {
            foreach ($request->options as $optionText) {
                if (!empty($optionText)) {
                    $question->options()->create(['option_text' => $optionText]);
                }
            }
        }

        return redirect()->route('surveys.show', $survey->id)->with('success', 'Question added.');
    }

    public function destroy(Survey $survey, SurveyQuestion $question)
    {
        $question->delete();
        return redirect()->route('surveys.show', $survey->id)->with('success', 'Question deleted.');
    }
}
