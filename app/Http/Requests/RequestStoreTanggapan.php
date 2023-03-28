<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreTanggapan extends FormRequest
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
            'status' => 'required',
            'tanggapan' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'status' => 'Status Pengaduan',
            'tanggapan' => 'isi Pengaduan',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attribute harus diisi.'
        ];
    }
}
