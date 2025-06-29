<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyOption extends Model
{
    protected $fillable = ['survey_question_id',
                            'option_text',
                            'question_text'];

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }
}
