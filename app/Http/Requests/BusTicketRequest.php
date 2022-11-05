<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id'=> 'required|max:255',
            'busSchedule_id'=> 'required|max:255',
            'status'=> 'required|max:255',
            'price'=> 'required',
        ];
    }
}
