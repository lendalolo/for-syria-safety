<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3|unique:users|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:admin,user,member',
            'email_verified_at' => 'nullable|date',
            'team_id' => 'nullable|integer|exists:teams,id',
            'phone number' => 'nullable|string|regex:/^[\pL\s\-]+$/u',
            'address' => 'nullable|string|regex:/^[\pL\s\-]+$/u',
            'gender' => 'required|string|in:male,female',
            'password' => 'required',
            'position' =>'nullable|string',
            'technical_skills' => 'nullable|string',
            'field_experiance' => 'nullable|string',
        ];
    }
}
