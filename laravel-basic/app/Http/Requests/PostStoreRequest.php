<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|max:20',    // タイトルは必須で最大20文字
            'content' => 'required|max:200'  // 本文は必須で最大200文字
        ];
    }
    public function messages()
    {
        return [
          'title.required' => 'タイトルは必須です。',
            'content.required' => '本文は必須です。',
            'title.required' => 'タイトルは必須です。',
            'content.required' => '本文は必須です。',
        ];
    }
}
