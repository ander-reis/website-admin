<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvencoesCreateRequest extends FormRequest
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
            'fl_entidade' => 'required',
            'ds_titulo' => 'required|max:100',
            'dt_validade' => 'required|max:9',
            'url_arquivo' => 'required|file|mimetypes:application/pdf|max:2048',
            'ds_titulo_aditamento' => 'max:100',
            'url_aditamento' => 'mimes:pdf|max:2048',
            'fl_app' => 'required',
            'fl_ativo' => 'required'
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['ds_titulo'] = trim(filter_var($input['ds_titulo'], FILTER_SANITIZE_STRING));
        $input['ds_titulo_aditamento'] = trim(filter_var($input['ds_titulo_aditamento'], FILTER_SANITIZE_STRING));
        $input['dt_validade'] = preg_replace("/[^A-Za-z0-9-]/", '/', $this->dt_validade);
        $this->replace($input);
    }
}
