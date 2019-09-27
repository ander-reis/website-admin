<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroUpdateRequest extends FormRequest
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
            'ds_imagem_desktop' => 'required_with:ds_imagem_mobile|image|max:1024',
            'ds_imagem_mobile'  => 'required_with:ds_imagem_desktop|image|max:1024',
            'ds_titulo'         => 'required|max:50',
            'ds_link'           => 'required|url|max:60',
            'dt_de'             => 'required',
            'dt_ate'            => 'required|after:dt_de'
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['ds_titulo'] = mb_strtoupper(trim(filter_var($input['ds_titulo'], FILTER_SANITIZE_STRING)));
        $input['ds_link'] = mb_strtolower(trim(filter_var($input['ds_link'], FILTER_SANITIZE_STRING)));
        $this->replace($input);
    }
}
