<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicarCertificadoRequest extends FormRequest
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
            'participantes' => ['required', 'array'],
            'participantes[*]' => ['required', 'exists:participantes,id'],
            'config_certificado_id' => ['required', 'exists:config_certificados,id'],
        ];
    }
    public function messages()
    {
        return [
            'participantes.required' => 'Nenhum participante selecionado!',
            'participante_id.exists' => 'O participante selecionado não existe!',
            'config_certificado_id.required' => 'Configuração de certificado não informada!',
            'config_certificado_id.exists' => 'A configuração de certificado não existe!',
        ];
    }
}
