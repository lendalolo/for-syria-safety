<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
                        "name"=> ['sometimes','string','max:255'],
                        "status"=> 'sometimes|string|in:available,busy,waiting',
                        "compaigns_num"=>["sometimes"],
                         "areas_examined"=>["sometimes"],
                         "unit_id"=>["sometimes","exists:units,id"],
                        "teamposition_id"=>["sometimes","exists:teampositions,id"],
                        "level"=>["sometimes"],


        ];
    }
}
