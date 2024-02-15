<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // You can change this to handle authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
           
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profession' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'status' => Rule::in(array_keys(User::STATUS_RADIO)),
        
        ];
    
    }
}
