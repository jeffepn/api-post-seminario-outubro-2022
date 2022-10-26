<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'message' => ['sometimes', 'required', 'min:2', 'max:255'],
            'post_id' => ['sometimes', 'required', 'exists:posts,id'],
            'user_id' => ['sometimes', 'required', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'min' => "O campo dever ter no minímo :min caracteres",
            'max' => "O campo dever ter no máximo :max caracteres",
            'message.required' => "É necessário fornecer uma mensagem.",
            'post_id.required' => "Selecione um Post válido.",
            'post_id.exists' => "O post id fornecido não existe.",
            'user_id.required' => "Selecione um Usuário válido.",
            'user_id.exists' => "O user id fornecido não existe.",
        ];
    }
}
