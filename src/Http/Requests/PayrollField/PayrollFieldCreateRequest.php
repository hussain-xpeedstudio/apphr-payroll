<?php

namespace AppHr\Payroll\Http\Requests\PayrollField;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use AppHr\Payroll\Http\Responses\ApiResponse;
class PayrollFieldCreateRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255|unique:payroll_fields',
            'deduction' => 'required|numeric',
            'is_system' => 'required|boolean'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The field name field is required.',
            'name.max' => 'The name field should not exceed :max characters.',
            'name.unique' => 'The payroll name field must be unique.',
            'deduction.required' => 'The deduction field is required.',
            'deduction.numeric' => 'The deduction field must be a number.',
            'is_system.required' => 'The is_system field is required.',
            'is_system.boolean' => 'The is_system field must be a boolean value.'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiResponse::validationError($validator->errors(), 'Validation Failed', 422));
    }

}
