<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        $product = $this->route()->parameter('product');//null

        $rules = [
            'name' => 'required',
            'precio' => 'required',
            'slug' => 'required|unique:products',
            'status' => 'required|in:1,2',
            'category_id' => 'required',
            'file' => 'image'
        ];
        if ($product) {
            $rules['slug'] = 'required|unique:product,slug' . $product->id;
        }
        
        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id' => 'required',
            ]);
        }
         
        return $rules;
    }
    
}

 