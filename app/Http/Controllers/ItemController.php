<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    public function show(){
       $lists = Item::get();
        return view('item.index',compact('lists'));
    }
    public function createPage(){
        $categories = Category::get();
        return view('item.create',compact('categories'));
    }
    public function store(ItemRequest $request){
        $data = $this->getDataItem($request);
        $fileName = uniqid().$request->image->getClientOriginalName();
        $request->image->storeAs('public/',$fileName);
        $data['image']=$fileName;
        Item::create($data);
        return redirect()->route('item#index')->with('createSuccess','Item Create Successfully...');
    }
    private function getDataItem($request){
        return [
            'name' => $request->name,
            'image'=>$request->image,
            'category_id' => $request->category_id,
            'status' => $request->categoryCheck == "done" ? true : false,
            'price' => $request->price,
            'description' => $request->description,
            'owner_name' => $request->owner_name,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'condition' => $request->condition,
            'type' => $request->type,
        ];
    }
}
