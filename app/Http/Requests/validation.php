<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() //dùng để xác định xem người dùng nào có quyền thực hiện request này.
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
            'name' => 'required|max:50',
            'sku' => 'required',
            //'alias' => 'required',
            'unitprice' => 'required',
            'qty' => 'required | integer | min:1',
            'id_cat' => 'required | integer',
            'id_sup' => 'required | integer',
            'id_bra' => 'required | integer',
            'status' => 'required | integer',
            'email' => 'required | email:rfc', // check theo dns thì thêm ,dns phía sau rfc
            'phoneNum' => 'required',
            'address' => 'required',
            'description' => 'required',
            
        ];
    }
}