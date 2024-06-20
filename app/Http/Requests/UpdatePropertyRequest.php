<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        $property = $this->route('property');
        return $user->lendlord && $user->lendlord->lendlord_id == $property->lendlord_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'property_cost' => 'required|numeric|min:0',
            'total_area' => 'required|numeric|min:0',
            'property_status' => 'required|in:available,sold,pending',
            'property_type_id' => 'required|exists:property_types,property_type_id',
            'property_details.address.city' => 'required|string|max:255',
            'property_details.address.building' => 'required|string|max:255',
            'property_details.address.street' => 'required|string|max:255',
            'property_details.address.zip' => 'required|string|max:10',
            'property_details.bedrooms' => 'required|integer|min:0',
            'property_details.bathrooms' => 'required|integer|min:0',
            'property_details.floors' => 'required|integer|min:0',
            'property_details.garage' => 'required|boolean',
            'property_details.pool' => 'required|boolean',
            'property_details.description' => 'required|string|max:1000',
        ];
    }
}
