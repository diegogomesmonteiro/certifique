<?php

namespace App\Http\Requests;

use App\Enums\EventoTipoEnum;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventoRequest extends FormRequest
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
            'nome' => 'required|max:100',
            'descricao' => 'max:300',
            'tipo' => [
                'required',
                new Enum(EventoTipoEnum::class),
            ],
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'carga_horaria' => 'required|integer|min:1',
            'local' => 'required|max:100',
        ];
    }
}
