<?php

use App\Models\Section;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = new Section([
            'name' => 'Borrower Age',
            'description' => 'Borrower Age > 21 and Borrower Age < 75',
            'fields' => 'Borrower Age',
            'required' => 0,
            'rules' => 'borrower_age'
        ]);

        $section->save();
        $section->survey()->attach(1);
        $section = new Section([
            'name' => 'Affordability',
            'description' => 'Annual Income > 40,000 and Loan Amount < 3 * Annual Income',
            'fields' => 'Annual Income|Loan Amount',
            'required' => 1,
            'rules' => 'aff_anual_income|aff_loan_amount'
        ]);

        $section->save();
        $section->survey()->attach(1);
        $section = new Section([
            'name' => 'Finance',
            'description' => 'Loan Length in Months < 12 and Loan Amount < 500,000',
            'fields' => 'Loan Length in Months|Loan Amount',
            'required' => 1,
            'rules' => 'fin_loan_length|fin_loan_amount'
        ]);

        $section->save();
        $section->survey()->attach(1);
    }
}
