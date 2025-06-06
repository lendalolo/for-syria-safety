<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
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
                "name"=>['sometimes','String','max:255'],
                 "lat"=>['sometimes','string','max:255'],
                  "lon"=>['sometimes','string','max:255'],
                 "status"=> 'sometimes|string|in:safe,danger,warning',
       ];
    }
}
