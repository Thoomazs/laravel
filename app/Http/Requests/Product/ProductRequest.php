<?php namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [ 'name'       => 'required|min:2',
                 'price'      => 'required|numeric',
                 'stock'      => 'required|integer',
                 'image'      => 'image',
                 'categories' => 'array' ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
