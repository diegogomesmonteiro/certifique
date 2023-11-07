<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Enums\TipoConfigCertificadoEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigCertificadoRequest extends FormRequest
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
            'nome'=>'string|required',
            'texto'=>'string|required',
            'tipo'=>[
                'required',
                'valor' => Rule::in(TipoConfigCertificadoEnum::getValues()),
            ],
            'atividade_id'=>'integer|nullable',
            'evento_id'=>'integer|required',
            'arquivo_layout'=>'nullable|mimes:jpeg,jpg,png|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'nome.string'=>'O nome deve ser uma string',
            'nome.required'=>'O nome é obrigatório',
            'texto.string'=>'O texto deve ser uma string',
            'texto.required'=>'O texto é obrigatório',
            'tipo.valor'=>'O tipo não é válido',
            'evento_id.integer'=>'O evento_id deve ser um inteiro',
            'evento_id.required'=>'O evento_id é obrigatório',
            'arquivo_layout.mimetypes'=>'O layout deve ser uma imagem',
            'arquivo_layout.max'=>'O layout deve ter no máximo 2MB',
            'atividade_id.integer'=>'O atividade_id deve ser um inteiro',
        ];
    }
}
