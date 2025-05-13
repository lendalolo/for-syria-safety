<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamReportRequest extends FormRequest
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
            "team_id"=>["sometimes",'exists:teams,id'],
            "report_id"=>["sometimes",'exists:reports,id'],
            "date"=>["sometimes",'date'],
            "status"=>["sometimes",'enum {
            completed ;
            uncompleted ;
            working on ;
            }'],
        ];
    }
}