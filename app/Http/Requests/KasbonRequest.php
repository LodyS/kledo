<?php

namespace App\Http\Requests;
use App\Models\Kasbon;
use Illuminate\Foundation\Http\FormRequest;

class KasbonRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {



        return [
            'pegawai_id'=>'required|exists:pegawai,id',
            'total_kasbon'=>'required|int'
        ];
    }

    public function masaKerja ()
    {

    }
}
