<?php

namespace App\Services;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;

class SurveyService 
{

    private $survey; 
    private $payload;
    private $reasonForDeclined;

    public function __construct()
    {
    }

    public function addSurvey(Survey $survey) 
    {
        $this->survey = $survey;
        return $this;
    }

    public function evaluate(Collection $payload): bool 
    {
        $this->payload = $payload;

        $validator = Validator::make($payload->toArray(), $this->getRules());

        if ($validator->fails()) {
            $this->reasonForDeclined = $validator->errors();
            return false;
        }

        return true;
    }

    public function getRules() 
    {
        $rules = [];

        foreach($this->survey->sections as $section) {
         
            $fields = explode('|',$section->fields);
            $arrRules = explode('|', $section->rules);

            foreach($fields  as $field) {
                if(!isset($rules[$field]))
                {
                    $rules[$field] = $this->transformRules($arrRules);
                } else {
                    $rules[$field] += $this->transformRules($arrRules);
                }

                if($section->required && !in_array('required', $rules[$field]))
                {
                    $rules[$field][] = 'required';
                }
            }
        }

        return $rules;
    }

    protected function transformRules($rules) 
    {
        $output = [];
        $surveyRules = config('survey.rules');

        foreach($rules as $rule) 
        {
            if(isset($surveyRules[$rule])) {
                $output[] = new $surveyRules[$rule]($this->payload);
            }
        }

        return $output;
    }
}