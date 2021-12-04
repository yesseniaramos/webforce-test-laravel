<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|min:2|max:25',
            'slug' => 'min:2|max:50',
            'description' => 'min:0|max:25',
            'price' => 'required|min:0'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => ':attribute is mandatory',
          'price.required' => ':attribute is mandatory',
          'name.min' => ':attribute does not meet the minimum length.'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
}
