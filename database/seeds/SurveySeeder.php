<?php

use App\Models\Survey;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servey = new Survey([
            'name' => 'Consumer Loan',
            'description' => 'Rules that determine whether the consumer loan application should be accepted or rejected'
        ]);

        $servey->save();
    }
}
