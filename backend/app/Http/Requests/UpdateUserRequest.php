<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name"=> "required|string",
            "email" => 'required|email',
            "password" => "nullable|string|min:6",
        ];
    }
}
