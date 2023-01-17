<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('projects')->ignore($this->project)],
            'description' => ['nullable'],
            'framework' => ['nullable'],
            'diff_lvl' => ['nullable'],
            'team' => ['nullable'],
            'link_git' => ['nullable'],
            'cover_image' => ['nullable', 'image', 'max:1000'],
            'type_id' => 'required|exists:types,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome del progetto è obbligatorio',
            'type_id.exists' => 'Tipo già esistente',
            'name.unique' => 'Nome già utilizzato',
            'name.max' => 'Il nome del progetto non può superare i :max caratteri',
            'name.min' => 'Il nome del progetto non può essere inferiore a :min caratteri',
            'diff_lvl.min' => 'Livello difficoltà non può essere inferiore a :min',
            'diff_lvl.max' => 'Livello difficoltà non può essere superiore a :max',
            'image.max' => 'l\'immagine è troppo grande',
        ];
    }
}
