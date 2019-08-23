<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderCreateRequest extends FormRequest
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
            'ds_label' => 'max:15',
            'ds_titulo' => 'max:30',
//            'ds_imagem' => 'required|image|max:1024',
            'ds_link' => 'max:255'
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['ds_label'] = trim(filter_var($input['ds_label'], FILTER_SANITIZE_STRING));
        $input['ds_titulo'] = trim(filter_var($input['ds_titulo'], FILTER_SANITIZE_STRING));
        $input['ds_link'] = trim(filter_var($input['ds_link'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
