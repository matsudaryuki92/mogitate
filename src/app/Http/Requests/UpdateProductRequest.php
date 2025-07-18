<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'  => 'required',
            'price'  => 'required|integer|between:0,10000',
            'image'  => 'required|mimes:jpg,png',
            'season'  => 'required',
            'description'  => 'required|max:120',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => '商品名を入力してください',
            'price.required'       => '値段を入力してください',
            'price.integer'        => '数値で入力してください',
            'price.between'        => '0~10000円以内で入力してください',
            'image.required'       => '画像を登録してください',
            'image.mimes'          => '「.png」または「.jpeg」形式でアップロードしてください',
            'season.required'      => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max'      => '120文字以内で入力してください',
        ];
    }
}
