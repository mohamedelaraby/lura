<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  // DON~T FORGET turn it on later
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'abbreviation' => 'required|string|max:10',
            'direction' => 'required|in:rtl,ltr',
            // 'active' => 'required|in:0,1',
        ];
    }

     /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => trans('auth.required_field'),
            'in' => trans('auth.incorrect_inputs'),
            'name.string' => $this->stringType(),
            'name.max' => trans('auth.string_max'),
            'abbreviation.string' => $this->stringType(),
            'abbreviation.max' => trans('auth.string_max_abbr'),
        ];
    }

    /**
     *  Get string type validaiton
     *  @return string
     */
     protected function stringType(){
         return trans('auth.string_name');
     }
}
