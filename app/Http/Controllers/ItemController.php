<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ItemUpdateRequest;

class ItemController extends Controller
{
    public function show(){
       $lists = Item::select('items.*','categories.name as category_name' )->leftJoin('categories','items.category_id','categories.id')->paginate(3);
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
    public function updatePage($id){
        $categories = Category::get();
        $data = Item::where('id', $id)->first();
        return view('item.update',compact('data','categories'));
    }
    public function edit(ItemUpdateRequest $request,$id){
        $data = $this->getDataItem($request);
        if($request->hasFile('image')){
            $oldImage = Item::where('id',$id)->first();
            $oldImage = $oldImage->image;
            if($oldImage != null){
             Storage::delete('public/'.$oldImage);
            }
            $fileName = uniqid().$request->image->getClientOriginalName();
            $request->image->storeAs('public/',$fileName);
            $data['image']=$fileName;
         }else{
           $getData = Item::where('id', $id)->first();
           $data['image']=$getData->image;
         }
         Item::where('id',$id)->update($data);
        return redirect()->route('item#index')->with('updateMessage','Update Successfully...');
    }
    public function destroy($id){
        Item::findOrFail($id)->delete();
        return redirect()->route('item#index')->with(['deleteSuccess'=>'Delete Success...']);
    }
    private function getDataItem($request){
        return [
            'name' => $request->name,
            'image'=>$request->image,
            'category_id' => $request->category_id,
            'status' => $request->itemCheck == "done" ? true : false,
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
