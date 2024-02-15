<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'budget' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'requirements' => 'required|string',
            'status' => 'required|integer', 
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artist_id' => 'required|exists:users,id',
            'partner_ids' => 'required|array|exists:partners,id',
        ];
    }
}
