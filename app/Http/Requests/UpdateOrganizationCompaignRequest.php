<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationCompaignRequest extends FormRequest
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
                        "organization_id"=>['exists:organizations,id',"sometimes"],
                        "compaign_id"=>['exists:compaigns,id',"sometimes"],
                        "financing_value"=>["sometimes"],
                        "Budget"=>["sometimes"],
                        "current_covered_areas"=>["sometimes"],
                        "covered_areas"=>["sometimes"],
                        "amount_paid"=>["sometimes"],
                        "materials_num"=>["sometimes"],
        ];
    }
}
