<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;

class StoreCompaignRequest extends FormRequest
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
    {$locale = App::getLocale();
        return [
            "name"=>['required','json'],
                // Rule::unique('compaigns')->where("JSON_UNQUOTE(JSON_EXTRACT(name, '$.\"$locale\"')) = ?",
                //     [$this->input("name.$locale")])],
            "description"=>['nullable','json'],
            "start_date"=>['required','date'],
            "end_date"=>['required','date'],
            "location_id"=>['required','exists:locations,id'],
            "team_id"=>['required','exists:teams,id'],
            // "step_id"  => ['required','exists:steps,id'],
        ];
    }
}