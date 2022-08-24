<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PairRequest extends FormRequest
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
			'currency_id_from' => 'required', //On exige l'obligation de la saisie du champ et avec 5 caractères au minimum
			'currency_id_to'   => 'required',//On exige l'obligation de la saisie du champ avec des chaines caractères (string)
            'rate'             =>  'required|'
        ];
    }


}
