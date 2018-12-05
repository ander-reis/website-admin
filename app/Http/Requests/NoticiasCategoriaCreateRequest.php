<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiasCategoriaCreateRequest extends FormRequest
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
            'ds_categoria' => 'required|max:50'
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['ds_categoria'] = trim(filter_var($input['ds_categoria'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
