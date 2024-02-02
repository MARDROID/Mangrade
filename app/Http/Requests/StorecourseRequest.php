<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'url' => 'required|url',
        
        ];
    }

     /**
     * Get the custom error messages for the validation rules.
     */

    public function messages()
    {
        return [
            'title.required' => 'Please enter the course title',
            'description.required' => 'Please enter the course description',
            'url.required' => 'Please enter the course url',
            'url.url' => 'Please enter a valid url',
        ];
    }
}
