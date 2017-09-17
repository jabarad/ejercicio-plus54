<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

use App\Rules\PriceRange;

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

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $request->validate([
            'min_price' => 'nullable|numeric|between:0,100',
            'max_price' => ['nullable', 'numeric', 'between:0,100', new PriceRange($request->min_price,$request->max_price)],
        ]);
        
        $query = Product::orderBy('id','desc');

        if ($request->min_price) {
            $query = $query->where('price','>=',$request->min_price);
        }
        if ($request->max_price) {
            $query = $query->where('price','<=',$request->max_price);
        }

        $products = $query->paginate(5);
        return view('product.list',compact('products'))
        ->with('i', (request()->input('page', 1) - 1)* 5);
    }
 }
