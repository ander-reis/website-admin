<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomePageCreateRequest extends FormRequest
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
//            'ds_categoria[]' => 'required|max:50',
//            'ds_titulo[]' => 'required|max:80',

//            'ds_categoria2' => 'required|max:50',
//            'ds_titulo2' => 'required|max:80',
//
//            'ds_categoria3' => 'required|max:50',
//            'ds_titulo3' => 'required|max:80',

//            'ds_texto_noticia' => 'required|max:150',
//            'ds_link' => 'required|max:150',
        ];
    }
}
