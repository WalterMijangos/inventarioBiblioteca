<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:300',
            'year' => 'required|numeric',
            'author_id' => 'required|exists:authors,id',
            'stock' => 'required|numeric|min:0'
        ];
    }


    public function messages():array
    {
        return[
            'title.required' => 'El titulo es obligatorio',
            'title.max' => 'El titulo no debe de pasar los 300 caracteres',
            'year.required' => 'El año es obligatorio',
            'year.numeric' => 'El año debe de ser un numero',
            'author_id.required' => 'El autor es obligatorio',
            'stock.required' => 'El stock es obligatorio',
            'stock.numeric' => 'El stock debe de ser un numero',
            'stock.min' => 'El stock no puede ser negativo'
        ];
    }
}
