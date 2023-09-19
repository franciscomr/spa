<?php

namespace App\Http\Requests\Catalog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContractRequest extends FormRequest
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
            'contract_type_id' => 'required | exists:contract_types,id',
            'addendumNumber' => 'nullable|string',
            'vendor' => 'required ',
            'billDate' => 'required | date',
            'startDate' => [Rule::excludeIf($this->contract_type_id < 2),  'date'],
            'expirationDate' =>  [Rule::excludeIf($this->contract_type_id < 2), 'date', 'after:startDate'],
            'updatedBy' => 'required'
        ];

        if (request()->routeIs('contracts.store')) {
            $rules += [
                'name' => 'required | string | min:2 | unique:contracts,name',
                'billNumber' => [
                    'required',
                    Rule::unique('contracts')
                        ->where('billNumber', $this->billNumber)
                        ->where('addendumNumber', $this->addendumNumber)
                ],
                'createdBy' => 'required',
            ];
        } elseif (request()->routeIs('contracts.update')) {
            $rules += [
                'name' => 'required |string | min:2 | unique:contracts,name,' . $this->contract->id,
                'billNumber' => [
                    'required',
                    Rule::unique('contracts')
                        ->ignore($this->contract->id)
                        ->where('billNumber', $this->billNumber)
                        ->where('addendumNumber', $this->addendumNumber)
                ],
            ];
        }
        return $rules;
    }

    protected function prepareForValidation()
    {
        if (request()->routeIs('contracts.store')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'name' => $this->input('attributes.name'),
                    'billNumber' => $this->input('attributes.billNumber'),
                    'addendumNumber' => $this->input('attributes.addendumNumber'),
                    'vendor' => $this->input('attributes.vendor'),
                    'billDate' => $this->input('attributes.billDate'),
                    'startDate' => $this->input('attributes.startDate'),
                    'expirationDate' => $this->input('attributes.expirationDate'),
                    'createdBy' => Auth::user()->username,
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        } elseif (request()->routeIs('contracts.update')) {
            $this->merge(array_replace(
                $this->all(),
                [
                    'id' => $this->input('id'),
                    'contract_type_id' => $this->input('relationships.contract_type_id'),
                    'name' => $this->input('attributes.name'),
                    'billNumber' => $this->input('attributes.billNumber'),
                    'addendumNumber' => $this->input('attributes.addendumNumber'),
                    'vendor' => $this->input('attributes.vendor'),
                    'billDate' => $this->input('attributes.billDate'),
                    'startDate' => $this->input('attributes.startDate'),
                    'expirationDate' => $this->input('attributes.expirationDate'),
                    'updatedBy' => Auth::user()->username,
                ]
            ));
        }
    }
}
