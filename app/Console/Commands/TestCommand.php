<?php

namespace App\Console\Commands;

use App\Models\Survey;
use App\Rules\BorrowerAge;
use App\Services\SurveyService;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'validation:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'validation test';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $payload = Collection::make([
            'Annual Income' => "30,000",
            'Borrower Trustworthiness' => 'Trustworthy',
            'Borrower Age' => 27,
            'Loan Length in Months' => 12,
            'Loan Amount' => '90,000'
        ]);

        $ruleEvaluator = resolve(SurveyService::class);
        $ruleEvaluator->addSurvey(Survey::find(1));
        $ruleEvaluator->evaluate($payload);
    }
}
