<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest("id")->paginate(5);
        return view('admin.product.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1)* 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|max:100',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|between:0,100',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $data["user_id"] = Auth::user()->id;
        $data['photo'] = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('uploads/product'), $data['photo']);

        Product::create($data);
        return redirect()->route('admin.product.index')
                        ->with('success','Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.product.edit',compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            'name' => 'required|max:100',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|between:0,100',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $data["user_id"] = Auth::user()->id;

        if (isset($request->photo)) {
            $photoPath = public_path('uploads/product') . "/" . $product->photo;
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
    
            $data['photo'] = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('uploads/product'), $data['photo']);
        }
        else {
            $data['photo'] = $product->photo;
        }

        $product->update($data);
        return redirect()->route('admin.product.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $photoPath = public_path('uploads/product') . "/" . $product->photo;
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
        
        Product::destroy($product->id);
        return redirect()->route('admin.product.index')
                        ->with('success','Product deleted successfully');
    }
}
