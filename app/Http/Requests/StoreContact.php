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
            'phone' => 'required|min:14|regex:/^\(\d{2}\)\s?\d{4,5}-\d{4}$/',
            'message' => 'required',
            'archive' => 'required|file|max:500|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.oasis.opendocument.text,text/plain',
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
            'phone.regex' => 'Insira um telefone no padrão correto',
            'message.required' => 'Preencha o campo mensagem',
            'archive.required' => 'Envie um arquivo',
            'archive.max' => 'Envie um arquivo com menos de 500kb',
            'archive.mimetypes' => 'Envie um arquivo do tipo correto: pdf, doc, docx, odt ou txt'
        ];
    }
}
