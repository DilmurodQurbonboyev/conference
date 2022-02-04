<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'status' => 'required',
            'organization' => 'required',
            'position' => 'required',
            'country' => 'required',
            'email' => 'required',
            'photo' => 'required|image|mimes:jpeg,jpg,|max:300',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => tr('The last name field is required'),
            'first_name.required' => tr('The first name field is required'),
            'middle_name.required' => tr('The middle name field is required'),
            'organization.required' => tr('The organization field is required'),
            'position.required' => tr('The position field is required'),
            'country.required' => tr('The country field is required'),
            'email.required' => tr('The email field is required'),
            'photo.required' => tr('The photo field is required'),
            'photo.image' => tr('The photo must be an image'),
            'photo.mimes' => tr('The photo must be a file of type: jpeg, jpg'),
            'photo.max' => tr('The photo must be 300 kilobytes'),
            'status.required' => tr('The status field is required'),
        ];
    }
}
