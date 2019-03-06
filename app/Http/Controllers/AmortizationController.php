<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmortizationRequest;
use App\Services\AmortizationService;
use App\Services\ParagraphService;

class AmortizationController extends Controller
{
    /**
     * @var ParagraphService
     */
    private $amortizationService;

    public function __construct(AmortizationService $amortizationService)
    {
        $this->amortizationService = $amortizationService;
    }

    /**
     * Show Amortization form
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('amortization.index');
    }

    /**
     * @param AmortizationRequest $amortizationRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function calculateAmortization(AmortizationRequest $amortizationRequest)
    {
        return view(
            'amortization.index',
            [
                'form_data'      => $amortizationRequest->all(),
                'interest_table' => $this->amortizationService->calculateAmortizationTable($amortizationRequest),
            ]
        );
    }
}
