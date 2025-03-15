<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAchievementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'achievement_id' => 'required|exists:achievements,id',
            'points' => 'required|integer|min:0',
        ];
    }
}
