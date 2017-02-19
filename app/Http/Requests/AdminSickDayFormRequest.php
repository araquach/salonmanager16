<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminSickDayFormRequest extends Request
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
            'sick_hours' => 'required | numeric',
            'description' => 'required',
            'sick_from' => 'required | date',
            'sick_to' => 'required | date',
        ];
    }
}
