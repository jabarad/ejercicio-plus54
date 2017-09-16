<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show',compact('product'));
    }

    /**
     * Display a listing of the resource by Category
     *
     * @return \Illuminate\Http\Response
     */
    public function listByCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $products = Product::where('category_id', $categoryId)->latest("id")->paginate(5);
        return view('product.listByCategory',compact('products', 'category'))
            ->with('i', (request()->input('page', 1) - 1)* 5);
    }
}
