<?php

namespace App\Http\Requests\Catalog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EquipmentRequest extends FormRequest
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
            'category_id' => 'required | exists:categories,id',
            'updatedBy' => 'required'
        ];

        if (request()->routeIs('equipment.store')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:equipment,name',
                'createdBy' => 'required',
            ];
        } elseif (request()->routeIs('equipment.update')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:equipment,name,' . $this->equipment->id,
            ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        if (request()->routeIs('equipment.store')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'category_id' => $this->input('relationships.category_id'),
                    'name' => $this->input('attributes.name'),
                    'createdBy' => Auth::user()->username,
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        } elseif (request()->routeIs('equipment.update')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'category_id' => $this->input('relationships.category_id'),
                    'name' => $this->input('attributes.name'),
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        }
    }
}
