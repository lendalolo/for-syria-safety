<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "team_id"=>["required",'exists:teams,id'],
            "report_id"=>["required",'exists:reports,id'],
            "date"=>["required",'date'],
            "status"=>["required",'enum {
                completed ;
                uncompleted ;
                working on ;
            }'],
        ];
    }
}