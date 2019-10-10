<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoletimCadastroCreateRequest extends FormRequest
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
            'id_boletim' => 'required|numeric',
            'dt_boletim' => 'required|date_format:Y-m-d',
            'ds_destaque' => 'required|max:100',
            'ds_link' => 'required|max:100',
            'ds_tag' => 'max:100'
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['ds_destaque'] = trim(filter_var($input['ds_destaque'], FILTER_SANITIZE_STRING));
        // trata campo null não obrigatório
        $input['ds_tag'] = (is_null($input['ds_tag'])) ? "" : $input['ds_tag'];
        $this->replace($input);
    }
}
