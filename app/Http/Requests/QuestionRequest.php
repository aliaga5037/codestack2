<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestionRequest extends Request
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
            'ques_title' => 'required|min:5',
            'sual' => 'required|min:5',
        ];
    }

     public function messages()
{
    return [
        'ques_title.min' => 'basliqda en azi 5 simvol olmalidi',
        'sual.required'  => 'sual hissesi bos ola bilmez',
    ];
}
}
