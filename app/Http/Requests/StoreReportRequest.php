<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            "description"=>['required','String'],
            // "user_id"=>['required','exists:users,id'],
            // "location_id"=>['required','exists:locations,id'],
            "location_name"=>['required'],
            "lon"=>['required'],
            "lat"=>['required'],
            "location_status"=>['required'],
            "statue"=>['string','in:verified,processing,unverified'],
        ];
    }
}
