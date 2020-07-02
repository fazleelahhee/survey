<?php

namespace App\Providers;

use App\Models\Survey;
use App\Rules\BorrowerAge;
use App\Services\SurveyService;
use Illuminate\Support\ServiceProvider;
use Validator;

class SurveyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SurveyService::class, function ($app) {
            return new SurveyService();
        });   
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
