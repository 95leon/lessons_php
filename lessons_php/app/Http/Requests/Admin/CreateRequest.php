<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'filled|not_in:0|integer',
            'title' => 'filled|alpha_dash|min:3|max:50',
            'text' => 'filled|alpha_dash|min:5|max: 500',
            'is_private' => 'sometimes|accepted',
            'category_name' => 'filled|alpha_dash|min:3|max:20'
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'категории новостей',
            'title' => 'заголовок новости',
            'text' => 'текст новости',
            'category_name' => 'заголовок категории'
        ];
    }
}
