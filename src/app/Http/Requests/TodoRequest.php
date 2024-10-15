<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'todo_content' => ['required', 'string', 'max:20'],
        ];
    }

    public function messages()
    {
        return [
            'todo_content.required' => 'やることを入力してください',
            'todo_content.string' => 'やることを文字列で入力してください',
            'todo_content.max' => 'やることを20文字以下で入力してください'
        ];
    }
}
