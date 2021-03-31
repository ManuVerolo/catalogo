<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('status', 1)->latest('id')->paginate(9);
        return view('products.index', compact('products'));
    }
    public function show(Product $product){

        $similares = Product::where('category_id', $product->category_id)
                            ->where('status',1)
                            ->where('id', '!=', $product->id)
                            ->latest('id')
                            ->take(3)
                            ->get();

        return view('products.show', compact('product','similares'));
    }
    public function category(Category $category){
        $products = Product::where('category_id', $category->id)
                           ->where('status', 1)
                           ->latest('id')
                           ->paginate(9);
        return view('products.category', compact('products','category'));
    }
}
