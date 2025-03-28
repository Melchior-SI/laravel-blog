<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "title" => "required|string",
            "content" => "required|string",
            "preview_image" => "required|file|mimes:jpeg,jpg,png,webp",
            "banner_image" => "required|file|mimes:jpeg,jpg,png,webp",
            "category_id" => "required|integer|exists:categories,id",
            "tag_ids" => "nullable|array",
            "tag_ids.*" => "nullable|integer|exists:tags,id",
        ];
    }

    public function messages(){
        return [
            "title.required" => "Название обязательно для заполнения",
            "title.string" => "Название должно быть строкой",

            "content.required" => "Содержание обязательно для заполнения",
            "content.string" => "Содержание должно быть текстом",

            "preview_image.required" => "Превью обязательно для загрузки",
            "preview_image.file" => "Превью должно быть файлом",
            "preview_image.mimes" => "Превью должно быть в формате: JPEG, JPG, PNG или WebP.",

            "banner_image.required" => "Баннер обязателен для загрузки",
            "banner_image.file" => "Баннер должен быть файлом",
            "banner_image.mimes" => "Баннер должен быть в формате: JPEG, JPG, PNG или WebP.",

            "category_id.required" => "Выбор категории обязателен",
            "category_id.integer" => "ID Категории должно быть числом",
            "category_id.exists" => "Выбранной категория не существует",

            "tag_ids.array" => "Тэги должны быть массивом",

            "tag_ids.*.integer" => "ID каждого тэга должно быть числом",
            "tag_ids.*.exists" => "Выбранного тэга не существует"
        ];
    }
}
