<?php

namespace App\Http\Requests\Catalog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'branch_id' => 'required | exists:branches,id',
            'position_id' => 'required | exists:positions,id',
            'firstSurname' => 'required | string | min:2 ',
            'secondSurname' => 'required | string | min:2 ',
            'updatedBy' => 'required'
        ];

        if (request()->routeIs('employees.store')) {
            $rules += [
                'name' => [
                    'required',
                    Rule::unique('employees')
                        ->where('name', $this->name)
                        ->where('firstSurname', $this->firstSurname)
                        ->where('secondSurname', $this->secondSurname)
                ],
                'createdBy' => 'required',
            ];
        } elseif (request()->routeIs('employees.update')) {
            $rules += [
                'name' => [
                    'required',
                    Rule::unique('employees')
                        ->ignore($this->employee->id)
                        ->where('name', $this->name)
                        ->where('firstSurname', $this->firstSurname)
                        ->where('secondSurname', $this->secondSurname)
                ],
            ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        if (request()->routeIs('employees.store')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'branch_id' => $this->input('relationships.branch_id'),
                    'position_id' => $this->input('relationships.position_id'),
                    'name' => $this->input('attributes.name'),
                    'firstSurname' => $this->input('attributes.firstSurname'),
                    'secondSurname' => $this->input('attributes.secondSurname'),
                    'createdBy' => Auth::user()->username,
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        } elseif (request()->routeIs('employees.update')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'branch_id' => $this->input('relationships.branch_id'),
                    'position_id' => $this->input('relationships.position_id'),
                    'name' => $this->input('attributes.name'),
                    'firstSurname' => $this->input('attributes.firstSurname'),
                    'secondSurname' => $this->input('attributes.secondSurname'),
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        }
    }
}
