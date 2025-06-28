<?php

public function survey()
{
    return $this->belongsTo(Survey::class);
}

public function options()
{
    return $this->hasMany(SurveyOption::class);
}
