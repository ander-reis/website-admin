<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiPaginasPrincipaisRequest extends FormRequest
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
        $this->sanitize();

        return [
            'tp_busca' => 'required|integer',
            'txt_titulo_busca' => 'required|max:75',
            'txt_titulo' => 'required|max:75',
            'ds_texto' => 'required',
            'ds_palavra_chave' => 'max:150',
            'fl_status' => 'required|integer'
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
        $input['ds_texto'] = trim(filter_var($input['ds_texto'], FILTER_SANITIZE_STRING));
        $input['ds_palavra_chave'] = trim(filter_var($input['ds_palavra_chave'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
