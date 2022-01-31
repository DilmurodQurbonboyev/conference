<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppealRequest extends FormRequest
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
            'inn' => 'required',
            'address' => 'required',
            'person' => 'required',
            'person_inn' => 'required|numeric',
            'person_address' => 'required',
            'project' => 'required',
            'project_price' => 'required',
            'additional_info' => 'required',
            'bank_number' => 'required',
            'bank_email' => 'required',
            'shoft_info' => "file",
            'energy_save' => "file",
            'other_info' => "file",
            'confirm_info' => "file",
        ];
    }
}
