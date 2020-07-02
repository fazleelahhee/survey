<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'survey';

    protected $fillable = [
        'name', 'description'
    ];

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'section_survey', 'survey_id', 'section_id');
    }
}
