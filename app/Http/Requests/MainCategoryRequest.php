<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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
            'photo' => validate_image(),
            'category' => 'required|array|min:1',
            'category.*.name' => 'required',
            'category.*.abbreviation' => 'required',
            'category.*.active' => 'required',
           
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
