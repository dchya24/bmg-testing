<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreArticleRequest extends FormRequest
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
            "judul_artikel" => ["required"],
            "isi_artikel" => ["required"],
            "thumbnail_artikel" => ["required", "image", "mimes:jpg,png,jpeg"],
            "tag_artikel" => ["required"],
            "kategori_artikel" => ["required"]
        ];
    }

    public function message(): array {
        return [
            "judul_artikel.required" => "Judul artikel tidak boleh kosong!",
            "isi_artikel.required" => "Isi artikel tidak boleh kosong!",
            "tag_artikel.required" => "Tag artikel tidak boleh kosong!",
            "tag_artikel.required" => "Tag artikel tidak boleh kosong!",
            "kategori_artikel.required" => "Kategori artikel tidak boleh kosong!",
            "kategori_artikel.image" => "File yang diupload harus berupa gambar!",
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'success' => false,
        ], 422));
    }
}
