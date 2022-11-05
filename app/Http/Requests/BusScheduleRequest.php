<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusScheduleRequest extends FormRequest
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
            'bus_id'=> 'required|max:255',
            'take_off_time'=> 'required|max:255',
            'drop_off_time'=> 'required|max:255',
            'take_off'=> 'required|max:255',
            'destination'=> 'required|max:255',
            'ticket_price'=> 'required',
        ];
    }
}
