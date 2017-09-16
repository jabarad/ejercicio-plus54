<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = Category::latest("id")->paginate(5);
        return view('category.list',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1)* 5);
    }
}
