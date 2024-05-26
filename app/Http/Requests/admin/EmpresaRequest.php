<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombreEmpresa' => ['required', 'string', 'min:5','max:255'],
            'razonSocial' => ['nullable','string', 'max:255'],
            'rif' => ['required', 'string', 'min:4','max:20'],
            'correo' => ['required', 'string', 'email'],
            'telefono' => ['required', 'string', 'min:4','max:20'],
            'direccion' => ['required', 'string', 'min:4','max:255'],
            'ciudad' => ['required', 'string', 'min:4','max:255'],
            'estado' => ['required', 'string', 'min:4','max:255'],
            'codigoPostal' => ['required', 'string', 'min:3','max:10'],
            'foto' => [
                'image', 
                'mimes:jpeg,png',
                'max:12288', 
            ],
        ];
    }
}
