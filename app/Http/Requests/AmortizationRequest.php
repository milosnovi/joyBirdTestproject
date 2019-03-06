<?php

namespace App\Http\Requests;

class AmortizationRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'loan'          => 'required|numeric|min:1',
            'loan_terms'    => 'required|integer|min:1|max:360',
            'interest_rate' => 'required|numeric',
        ];
    }
}
