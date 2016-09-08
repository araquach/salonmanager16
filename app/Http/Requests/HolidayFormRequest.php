<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HolidayFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hours_requested' => 'required',
            'prebooked' => '',
            'request_date_from' => 'required',
            'request_date_to' => 'required',
        ];
    }
}
