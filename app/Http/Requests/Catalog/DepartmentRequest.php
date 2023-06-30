<?php

namespace App\Http\Requests\Catalog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DepartmentRequest extends FormRequest
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
            'updatedBy' => 'required'
        ];

        if (request()->routeIs('departments.store')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:departments,name',
                'createdBy' => 'required',
            ];
        } elseif (request()->routeIs('departments.update')) {
            $rules += [
                'name' => 'required |string | min:2 | unique:departments,name,' . $this->department->id,
            ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        if (request()->routeIs('departments.store')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'name' => $this->input('attributes.name'),
                    'createdBy' => Auth::user()->username,
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        } elseif (request()->routeIs('departments.update')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'name' => $this->input('attributes.name'),
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        }
    }
}
