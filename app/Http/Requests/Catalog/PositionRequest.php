<?php

namespace App\Http\Requests\Catalog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PositionRequest extends FormRequest
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
            'department_id' => 'required | exists:departments,id',
            'updatedBy' => 'required'
        ];

        if (request()->routeIs('positions.store')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:positions,name',
                'createdBy' => 'required',
            ];
        } elseif (request()->routeIs('positions.update')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:positions,name,' . $this->position->id,
            ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        if (request()->routeIs('positions.store')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'department_id' => $this->input('relationships.department_id'),
                    'name' => $this->input('attributes.name'),
                    'createdBy' => Auth::user()->username,
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        } elseif (request()->routeIs('positions.update')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'department_id' => $this->input('relationships.department_id'),
                    'name' => $this->input('attributes.name'),
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        }
    }
}
