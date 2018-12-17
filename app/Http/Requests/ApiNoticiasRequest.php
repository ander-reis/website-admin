<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiNoticiasRequest extends FormRequest
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
            'id_categoria' => 'required',
            'dt_expira' => 'required|date_format:Y-m-d',
            'hr_expira' => 'required|date_format:h:i',
            'ds_resumo' => 'required|max:80',
            'ds_texto' => 'required',
            'fl_exibir_destaque' => 'required',
            'fl_oculta' => 'required'
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['ds_resumo'] = trim(filter_var($input['ds_resumo'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
