<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationCompaignRequest extends FormRequest
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
            "organization_id"=>['exists:organizations,id',"required"],
            "compaign_id"=>['exists:compaigns,id',"required"],
            "financing_value"=>["required"],
            "Budget"=>["required"],
            "current_covered_areas"=>["required"],
            "covered_areas"=>["required"],
            "amount_paid"=>["required"],
            "materials_num"=>["required"],
        ];
    }
}
