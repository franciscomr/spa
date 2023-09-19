<?php

namespace App\Http\Requests\AssetManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AssetRequest extends FormRequest
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
            'contract_id' => 'required | exists:contracts,id',
            'branch_id' => 'required | exists:branches,id',
            'category_id' => 'required | exists:categories,id',
            'equipment_model_id' => 'required | exists:equipment_models,id',
            'asset_condition_id' => 'required | exists:asset_conditions,id',
            'asset_disposal_reason_id' => 'required',
            'updatedBy' => 'required'
        ];

        if (request()->routeIs('assets.store')) {
            $rules += [
                'serialNumber' => 'required | string | min:2 | unique:assets,serialNumber',
                'charger' => 'nullable | string | min:2 | unique:assets,charger',
                'createdBy' => 'required',
            ];
        } elseif (request()->routeIs('assets.update')) {
            $rules += [
                'serialNumber' => 'string | min:2 | unique:assets,serialNumber,' . $this->asset->id,
                'charger' => 'nullable | string | min:2 | unique:assets,charger,' . $this->asset->id,
            ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        if (request()->routeIs('assets.store')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'contract_id' => $this->input('relationships.contract_id'),
                    'branch_id' => $this->input('relationships.branch_id'),
                    'category_id' => $this->input('relationships.category_id'),
                    'equipment_model_id' => $this->input('relationships.equipment_model_id'),
                    'serialNumber' => $this->input('attributes.serialNumber'),
                    'charger' => $this->input('attributes.charger'),
                    'asset_condition_id' => $this->input('relationships.asset_condition_id'),
                    'asset_disposal_reason_id' => 1,
                    'createdBy' => Auth::user()->username,
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        } elseif (request()->routeIs('assets.update')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'contract_id' => $this->input('relationships.contract_id'),
                    'branch_id' => $this->input('relationships.branch_id'),
                    'category_id' => $this->input('relationships.category_id'),
                    'equipment_model_id' => $this->input('relationships.equipment_model_id'),
                    'serialNumber' => $this->input('attributes.serialNumber'),
                    'charger' => $this->input('attributes.charger'),
                    'asset_condition_id' => $this->input('relationships.asset_condition_id'),
                    'asset_disposal_reason_id' => 1,
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        }
    }
}
