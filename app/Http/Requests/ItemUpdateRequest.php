<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','min:3','max:255',Rule::unique('items')->ignore($this->id)],
            'image' => [
                File::types(['jpg', 'jpeg', 'png', 'webp'])
                    ->max(100 * 1024),
            ],
            'price' => ['integer','required','min:3000'],
            'description' => ['required','min:5','max:255'],
            'category_id' => ['required'],
            'type' => ['required'],
            'condition' => ['required'],
            'owner_name' => ['required','min:2','max:255'],
            'address' => ['required','min:4','max:255'],
            'contact_number' => ['required','min:11','max:15'],
        ];
    }
}
