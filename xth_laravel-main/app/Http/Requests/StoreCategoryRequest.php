<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update as needed based on your authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2', // Name is required and must be at least 2 characters long
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional cover image
            'is_active' => 'nullable|boolean', // Optional, default is 0
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.min' => 'Tên danh mục phải có ít nhất 2 ký tự.',
            'cover.image' => 'Ảnh bìa phải là một tập tin hình ảnh.',
            'cover.mimes' => 'Ảnh bìa phải có định dạng jpeg, png, jpg, hoặc gif.',
            'cover.max' => 'Ảnh bìa không được vượt quá 2MB.',
        ];
    }
}
