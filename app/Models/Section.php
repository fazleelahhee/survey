<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section';

    protected $fillable = [
        'name', 'description', 'fields', 'rules', 'required'
    ];

    public function survey()
    {
        return $this->belongsToMany(Survey::class, 'section_survey', 'section_id', 'survey_id');
    }
}
