<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenusCategoryRequest extends FormRequest
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
            'title_oz' => 'max:255|required_without_all:title_uz,title_ru,title_en',
            'title_uz' => 'max:255|required_without_all:title_oz,title_ru,title_en',
            'title_ru' => 'max:255|required_without_all:title_oz,title_uz,title_en',
            'title_en' => 'max:255|required_without_all:title_oz,title_uz,title_ru',
        ];
    }

    public function messages()
    {
        return [
            'max' => tr('No more than 255 characters'),
            'required_without_all' => tr('At least one language should be filled'),
        ];
    }
}
