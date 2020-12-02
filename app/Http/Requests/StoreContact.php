<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10|regex:/^\(\d{2}\)\s?\d{4,5}-\d{4}$/',
            'message' => 'required',
            'archive' => 'required|file|max:500|mime:pdf,doc,docx,odt,txt',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Preencha o campo nome',
            'email.required' => 'Preencha o campo e-mail',
            'email.email' => 'Insira um e-mail válido',
            'phone.required' => 'Preencha o campo telefone',
            'phone.min' => 'Insira um telefone válido',
            'phone.regex' => 'Insira um telefone no padrão correto'
        ];
    }
}
