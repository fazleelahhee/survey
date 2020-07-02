<?php

return [
    'rules' => [
        'borrower_age' => \App\Rules\BorrowerAge::class,
        'aff_anual_income' => \App\Rules\AffordabilityAnualIncome::class,
        'aff_loan_amount' => \App\Rules\AffordabilityLoanAmount::class,
        'fin_loan_amount' => \App\Rules\FinanceLoanAmount::class,
        'fin_loan_length' => \App\Rules\FinanceLoanLength::class 
    ]
];