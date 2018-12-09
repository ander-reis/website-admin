<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginasPrincipaisCreateRequest extends FormRequest
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
            'tp_busca' => 'required',
            'txt_titulo_busca' => 'required|max:75',
            'txt_titulo' => 'required|max:75',
            'ds_texto' => 'required',
            'ds_palavra_chave' => 'max:150',
            'fl_status' => 'required'
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['txt_titulo_busca'] = trim(filter_var($input['txt_titulo_busca'], FILTER_SANITIZE_STRING));
        $input['txt_titulo'] = trim(filter_var($input['txt_titulo'], FILTER_SANITIZE_STRING));
        $input['ds_palavra_chave'] = trim(filter_var($input[''], ds_palavra_chaveFILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
