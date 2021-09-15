<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        session_start();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereNull('category_id')->get();
        $chain = [];
        $chain[] = $categories;
        $_SESSION['chain'] = [];
        
        return view('categories.index',['categories'=> $categories,'chain'=>$_SESSION['chain']]);
    }

    public function map(Category $category)
    {
        $_SESSION['chain'][] = $category;
        $tmpSs= [];
        foreach($_SESSION['chain'] as $ssCat) {
            $tmpSs[] = $ssCat;
                if($ssCat->id == $category->id) {
                    break;
            }
        }
        $_SESSION['chain'] = $tmpSs;
        $categories = Category::where('category_id','=',$category->id)->get();
        // dd($category->id);
        return view('categories.index',['categories'=> $categories,'chain'=>$_SESSION['chain']]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        if($request->category_id != 0) {
            $category->category_id = $request->category_id;
        }
        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}