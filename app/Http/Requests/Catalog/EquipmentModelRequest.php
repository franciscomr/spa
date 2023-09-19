<?php

namespace App\Http\Requests\Catalog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EquipmentModelRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'equipment_id' => 'required | exists:equipment,id',
            'brand_id' => 'required | exists:brands,id',
            'attributes' => 'required | string | min:2 ',
            'updatedBy' => 'required'
        ];

        if (request()->routeIs('equipmentModels.store')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:equipment_models,name',
                'createdBy' => 'required',
            ];
        } elseif (request()->routeIs('equipmentModels.update')) {
            $rules += [
                'name' => 'required |string | min:2 | unique:equipment_models,name,' . $this->equipmentModel->id,
            ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        if (request()->routeIs('equipmentModels.store')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'equipment_id' => $this->input('relationships.equipment_id'),
                    'brand_id' => $this->input('relationships.brand_id'),
                    'name' => $this->input('attributes.name'),
                    'attributes' => $this->input('attributes.attributes'),
                    'createdBy' => Auth::user()->username,
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        } elseif (request()->routeIs('equipmentModels.update')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'equipment_id' => $this->input('relationships.equipment_id'),
                    'brand_id' => $this->input('relationships.brand_id'),
                    'name' => $this->input('attributes.name'),
                    'attributes' => $this->input('attributes.attributes'),
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        }
    }
}
