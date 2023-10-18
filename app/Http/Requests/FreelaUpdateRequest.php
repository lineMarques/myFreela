<?php

namespace App\Http\Requests;

use App\Models\Freela;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class FreelaUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $today = Carbon::today();
        $inicial = date_format(Carbon::now()->addHours(1), "H:i");
        $final = date_format(Carbon::now()->addHours(4), "H:i");

        return [
            'dataFreela' => ['date'],
            'horaInicio' => ['string'],
            'horaFinal' => ['string'],
            'cargo' => ['string'],
            'observacao' => ['string'],
            'valorFreela' => ['string'],
            'status' => ['boolean'],
        ];
    }
}
