<?php

namespace App\Http\Requests\Catalog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrganizationRequest extends FormRequest
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
            'address' => 'required | string | min:2 ',
            'city' => 'required | string | min:2 ',
            'state' => 'required | string | min:2 ',
            'postalCode' => 'required | numeric | digits:5',
            'updatedBy' => 'required'
        ];

        if (request()->routeIs('organizations.store')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:organizations,name',
                'businessName' => 'required | string | min:2 | unique:organizations,businessName',
                'createdBy' => 'required',
            ];
        } elseif (request()->routeIs('organizations.update')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:organizations,name,' . $this->organization->id,
                'businessName' => 'required | string | min:2 | unique:organizations,businessName,' . $this->organization->id
            ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        if (request()->routeIs('organizations.store')) {
            $this->merge(
                [
                    'createdBy' => Auth::user()->username,
                    'updatedBy' => Auth::user()->username,
                ]
            );
        } elseif (request()->routeIs('organizations.update')) {
            $this->merge(
                [
                    'updatedBy' => Auth::user()->username,
                ]
            );
        }
    }
}
