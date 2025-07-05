<?php

namespace App\Http\Controllers;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Log;



use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{

    public function index(Survey $survey) {

        return("OK" . $survey->id);
    }

     public function show( Survey $survey , SurveyQuestion $question) {

        return($request);
    }

    public function update(Request $request, SurveyQuestion $question)
{


   // Validate input
     $validated = $request->validate([
        'question_text' => 'string|max:255',
        'question_type' => 'in:multiple_choice,open_ended',
    ]);  

    

    // Update question
    $question->update($validated);
  return redirect()->route('surveys.show', $question->survey_id);

  /*   // Optionally update options (if applicable)
    if ($request->question_type === 'multiple_choice' && $request->has('options')) {
        $question->options()->delete(); // remove old
        foreach ($request->options as $text) {
            $question->options()->create(['option_text' => $text]);
        }
    } */

   
}

      public function edit($id) {

        $question = SurveyQuestion::findOrFail($id);

        return view('survey_questions.edit', compact('question'));
    }

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
                
                QuestionOption::create([
                    'survey_question_id' => $question->id,
                    'option_text' => $text
                ]);
            }

            
        }

        return redirect()->route('surveys.show', $validated['survey_id'])->with('success', 'Question added.');
    }

   
}
