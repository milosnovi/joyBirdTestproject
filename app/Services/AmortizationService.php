<?php

namespace App\Services;

use App\Http\Requests\AmortizationRequest;

/**
 * Class ReverseCharactersService
 * @package App\Services
 */
class AmortizationService
{
    /**
     * @param AmortizationRequest $amortizationRequest
     *
     * @return array
     */
    public function calculateAmortizationTable(AmortizationRequest $amortizationRequest)
    {
        $loan = $amortizationRequest->get('loan');
        $loan_terms = $amortizationRequest->get('loan_terms');
        $interest_rate = $amortizationRequest->get('interest_rate');

        $interestTable = [];
        $totalAmount = $loan;

        $balance = $totalAmount;
        $pmt = Finance::pmt($interest_rate/ 100 / 12, $loan_terms, $totalAmount, 0, false);
        $pmt = abs($pmt);

        for ($i = 1; $i <= $loan_terms; $i++) {
            $ppmt = Finance::ppmt($interest_rate/ 100 / 12, $i, $loan_terms, $totalAmount, 0, false);
            $ppmt = abs($ppmt);

            $interest = $pmt - $ppmt;

            if($balance > $pmt) {
                $balance = $balance - $pmt + $interest;
            } else {
                $balance = 0.0;
            }


            $interestTable[] = [
                'pmt'      => round($pmt, 2),
                'ppmt'     => round($ppmt, 2),
                'interest' => round($interest, 2),
                'balance'  => round($balance, 2),
            ];
        }

        return $interestTable;
    }
}