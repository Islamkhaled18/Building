<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
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
            'bu_name'       => 'required|min:5|max:255',
            'bu_rooms'      => 'required|integer',
            'bu_price'      => 'required',
            'bu_rent'       => 'required|integer',
            'bu_square'     => 'required|max:255',
            'bu_type'       => 'required|integer',
            //'bu_status'     => 'required|integer',
            'bu_meta'       => 'required|min:5|max:255',
            //'bu_small_disc' => 'required|min:5|max:255',
            'bu_langtuide'  => 'required',
            'bu_latitude'   => 'required',
            'bu_large_disc' => 'required|min:5',
            'bu_image'   => 'required|mimes:png,jpg,jpeg',
        ];
    }
}
