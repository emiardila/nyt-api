<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BestSellersRequestValidation extends FormRequest
{
    /**
     * Redirect to this URL if validation fails
     */
    protected $redirect = '/api/1/nyt/best-sellers/bad-request';

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => 'string',
            'isbn' => 'array',
            'isbn.*' => 'string|max:13|min:10',
            'title' => 'string',
            'offset' => 'integer|multiple_of:20'
        ];
    }
}
