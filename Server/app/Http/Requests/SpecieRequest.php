<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'animal_kingdom_id' => 'required|exists:animal_kingdoms,id',
            'habitat_id' => 'required|exists:habitats,id',
            'common_name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'seend_amount' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
