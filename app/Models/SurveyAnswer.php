<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $fillable = [
        'user_id',
        'survey_id',
        'survey_question_id',
        'survey_option_id',
        'answer_text'
    ];

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

    public function option()
    {
        return $this->belongsTo(SurveyOption::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
