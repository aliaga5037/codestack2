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
            'quest_title' => 'required|min:5|max:80',
            'sual' => 'required|min:10',
        ];
    }

     public function messages()
{
    return [
        'quest_title.required' => 'Sual Basligi bolmesini doldurun!',
        'quest_title.min' => 'Sual Basligi en az 10 simvol olmalidir.',
        'quest_title.max' => 'Sual Basligi 100 simvoldan cox olmamalidir.',
        'sual.required'  => 'Sual bomlesini doldurun!',
        'sual.min'  => 'Sual bomlesini en az 10 simvol olmalidir.',
    ];
}
}
