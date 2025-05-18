<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompaignRequest extends FormRequest
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
                "name"=>['sometimes','string','max:255'],
                "description"=>['sometimes','string'],
                "start_date"=>['sometimes','date'],
                "end_date"=>['sometimes','date'],
                "location_id"=>['sometimes','exists:locations,id'],
                "team_id"=>['sometimes','exists:teams,id'],
               "step_id"  => ['sometimes','exists:steps,id'],
        ];
    }
}
