<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
            "name"=> ['required','json','max:255'],
            "status"=> 'required|string|in:available,busy,waiting',
            "compaigns_num"=>["required"],
            "areas_examined"=>["required"],
            "unit_id"=>["required","exists:units,id"],
            "teamposition_id"=>["required","exists:teampositions,id"],
            "level"=>["required"],
        ];
    }
}
