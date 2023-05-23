<?php

namespace App\Http\Requests\Cliente;



use Illuminate\Foundation\Http\FormRequest;

class NewClienteRequest extends FormRequest
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
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|min:11',
            'email' => 'required|string|max:255',
        ];
    }
}
