<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNotaRequest extends FormRequest
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
//
	  return [
        'pchave' => 'required|max:255|unique:notas,pchave,'.$this->nota->id,
        'descrição' => 'required'
        ];
    }

 public function messages()
    {
        return [
            'pchave.required' => 'Favor informar a palavra chave.',
            'pchave.unique' => 'Palavra chave já cadastrada..',
            'conteúdo.required' => 'Favor informar a descrição.',
        ];
    }
}
