<?php

namespace App\Http\Requests\Setor;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreSetorRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'nome' => 'required|unique:setors|max:255',
            'codigo' => 'required|unique:setors|max:255',
            'setor_pai_id' => 'nullable|integer|exists:setors,id'
        ];
    }

    
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }
    
}
