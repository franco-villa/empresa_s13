<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonaRequest extends FormRequest
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
    public function rules()
    {
        return [
            'cPerNombre' => 'required|string|max:30',
            'cPerApellido'=>'required|string|max:30',
            'cPerDireccion'=>'required|string|max:50',
            'nPerEdad' => 'required|integer|min:18',
            'nPerSueldo' => 'required|numeric|min:500',
            'nPerEstado' => 'required|in:0,1',
            'dPerFecNac' => 'required|date|before:today',
            'image' => [
                $this->route('persona') ? 'nullable' : 'required',
                'mimes:jpg,jpeg,png'
            ]
        ];
    }

    public function messages()
    {
        return [
            'cPerNombre.required' =>  'El nombre es obligatorio.',
            'cPerNombre.max' =>  'El nombre no debe ser mayor a 30 caracteres.',
            'cPerApellido.required' =>  'El Apellido es obligatorio.',
            'cPerApellido.max' =>  'El apellido no debe ser mayor a 30 caracteres.',
            'cPerDireccion.required' =>  'La direccion es obligatoria.',
            'cPerDireccion.max' =>  'La direccion no debe ser mayor a 50 caracteres.',

            'nPerEdad.required' =>  'La edad es obligatoria.',
            'nPerEdad.min' =>  'La edad minima es de 18 años.',
            'nPerSueldo.required' =>  'El sueldo es obligatorio.',
            'nPerSueldo.min' =>  'El sueldo no puede ser menor a 500 soles.',

            'dPerFecNac.required' => 'La fecha de nacimiento es obligatoria.',
            'dPerFecNac.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'dPerFecNac.before' => 'La fecha de nacimiento debe ser anterior a hoy.',

            'image.required' =>  'Debes seleccionar una imagen.'
        ];
    }
}
