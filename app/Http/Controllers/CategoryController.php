<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function show(){
        $lists = Category::get();
        return view('category.index',compact('lists'));
    }
    public function createPage(){
        return view('category.create');
    }
    public function store(CategoryRequest $request){
        $data = [
            'name' => $request->name,
            'image'=>$request->image,
            'status' => $request->categoryCheck == "done" ? true : false,
        ];
        $fileName = $request->image->getClientOriginalName();
        $request->image->storeAs('public/',$fileName);
        $data['image']=$fileName;
        Category::create($data);
        return redirect()->route('category#index')->with('message', 'Create Successfully...');
    }
}
