<?php

namespace App\Http\Requests\Catalog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PhonePlanRequest extends FormRequest
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
            'phone_company_id' => 'required | exists:phone_companies,id',
            'data' => 'required',
            'startDate' => 'required| date',
            'expirationDate' => 'required| date|after:startDate',
            'updatedBy' => 'required'
        ];

        if (request()->routeIs('phonePlans.store')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:phone_plans,name',
                'createdBy' => 'required',
            ];
        } elseif (request()->routeIs('phonePlans.update')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:phone_plans,name,' . $this->phonePlan->id,
            ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        if (request()->routeIs('phonePlans.store')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'phone_company_id' => $this->input('relationships.phone_company_id'),
                    'name' => $this->input('attributes.name'),
                    'data' => $this->input('attributes.data'),
                    'startDate' => $this->input('attributes.startDate'),
                    'expirationDate' => $this->input('attributes.expirationDate'),
                    'createdBy' => Auth::user()->username,
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        } elseif (request()->routeIs('phonePlans.update')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'phone_company_id' => $this->input('relationships.phone_company_id'),
                    'name' => $this->input('attributes.name'),
                    'data' => $this->input('attributes.data'),
                    'startDate' => $this->input('attributes.startDate'),
                    'expirationDate' => $this->input('attributes.expirationDate'),
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        }
    }
}
