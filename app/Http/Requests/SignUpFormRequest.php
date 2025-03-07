<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','min:3'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', Password::default()],
        ] ;
    }

    protected function prepareForValidation(){
        return[
            $this->merge([
              'email' =>str(request('email'))
                ->squish()
                ->lower()
                ->value(),
            ])
        ];
    }
}
