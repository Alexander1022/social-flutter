<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AchievementRequest extends FormRequest
{
    /** 
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:achievements,name',
            'description' => 'required|string',
            'points_to_complete' => 'required|integer',
            'reward_xp' => 'required|integer',
            'specie_types' => 'required|array|min:1',
            'specie_types.*' => 'exists:specie_types,id',
        ];
    }
}
