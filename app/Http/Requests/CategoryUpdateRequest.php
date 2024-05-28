<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

          
                'category_name' => 'required|max:255',
                'category_description' => 'sometimes',
           
         
      
                'category_name.required' => 'O nome da categoria é obrigatório.',
                'category_description.sometimes' => 'A descrição da categoria é obrigatória.',

          
        ];
    }
}
