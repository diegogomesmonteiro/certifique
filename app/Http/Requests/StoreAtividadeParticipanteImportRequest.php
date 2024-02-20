<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtividadeParticipanteImportRequest extends FormRequest
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
        // dd(request()->file->getClientOriginalExtension());
        return [
            'evento_id_import' => [
                "required",
                "exists:eventos,id"
            ],
            'file' =>[
                "required",
                "mimes:xlsx,xls,csv"
                
            ]
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'O arquivo é obrigatório',
            'file.mimes' => "O arquivo deve ser do tipo: '.xlsx', '.xls' ou '.csv'",
        ];
    }
}
