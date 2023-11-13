<?php

namespace App\Http\Requests;

use App\Models\{
    PersonalData,
    User,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurriculoUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        switch ($this->method()) {

            case 'POST': {
                    return [
                        'aboutMe' => ['string', 'required', 'max:180'],
                        'skills' => ['array', 'required', 'min:3', 'max:5'],
                        'schooling' => ['string', 'required'],
                        'institution' => ['string', 'required', 'max:255'],

                        'jobTitle' => ['string', 'required',],
                        'company' => ['string', 'required', 'max:255'],
                        'companyEmail' => ['string', 'required', 'email', 'max:255'],
                        'companyContact' => ['string', 'required', 'CelularComDdd'],
                        'xp' => ['string', 'required',],
                        'assignments'  => ['string', 'required', 'max:255'],
                    ];
                    break;
                };


            case 'PATCH': {
                    return [
                        'name' => ['string', 'max:255', 'min:3'],
                        'cpf' => ['string', 'max:11', 'Cpf', Rule::unique(User::class)],
                        'age' => ['integer', 'max:99'],
                        'sexo' => ['string', 'max:255'],
                        'pcd' => ['string'],

                        'aboutMe' => ['string', 'max:180'],
                        'skills' => ['array', 'min:3', 'max:5'],
                        'schooling' => ['string'],
                        'institution' => ['string', 'max:255'],

                        'jobTitle' => ['string',],
                        'company' => ['string', 'max:255'],
                        'companyEmail' => ['string', 'email', 'max:255'],
                        'companyContact' => ['string', 'CelularComDdd'],
                        'xp' => ['string',],
                        'assignments'  => ['string', 'max:255'],
                    ];
                    break;
                }
        }
    }
}
