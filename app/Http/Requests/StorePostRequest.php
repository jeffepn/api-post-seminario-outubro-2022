<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user-can-create-post');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required','min:5' ,'max:200'],
            'content' => ['required', 'min:100'],
        ];
    }

    public function messages()
    {
        return [
            'min' => 'O campo deve ter no mínimo :min caracteres.',
            'title.required' => 'Forneça um título para o post.',
            'title.max' => 'Limite o campo a no máximo :max caracteres.',
            'content.required' => 'Forneça um conteúdo para o post',
        ];
    }
}
