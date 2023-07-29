<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAtividadeRequest extends FormRequest
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
            'nome'=> 'required|max:100',
            'atividade_tipo_id'=> 'required',
            'carga_horaria' => 'required|int',
            'data_inicio'=> 'required|date',
            'data_fim'=> 'required|date|after_or_equal:data_inicio',
        ];
    }
}
