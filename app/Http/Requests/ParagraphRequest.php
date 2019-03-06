<?php

namespace App\Http\Requests;

class ParagraphRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'paragraph' => 'required|min:10|max:512',
        ];
    }
}
