<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerChoice extends Model
{
    protected $fillable = ['question_id', 'choice_text'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
