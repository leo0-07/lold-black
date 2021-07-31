<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNotaRequest extends FormRequest
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
		'pchave' => 'required|max:100|unique:notas,pchave',
		'descrição' => 'required',
            //
        ];
    }
public function messages()
    {
        return [
            'pachave.required' => 'Por favor informe a palavra chave!',
            'title.unique' => 'Palavra já cadastrada.',
            'descrição.required' => 'Por favor informe a descição.'
        ];
    }
}
