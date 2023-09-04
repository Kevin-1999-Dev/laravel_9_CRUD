<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function show(){
        $lists = Category::paginate(3);
        return view('category.index',compact('lists'));
    }
    public function createPage(){
        return view('category.create');
    }
    public function store(CategoryRequest $request){
        $data = $this->getCategoryData($request);
        $fileName = uniqid().$request->image->getClientOriginalName();
        $request->image->storeAs('public/',$fileName);
        $data['image']=$fileName;
        Category::create($data);
        return redirect()->route('category#index')->with('message', 'Create Successfully...');
    }
    public function updatePage($id){
        $data = Category::where('id', $id)->first();
        return view('category.update',compact('data'));
    }
    public function edit(CategoryUpdateRequest $request,$id){
        $data = $this->getCategoryData($request);

        if($request->hasFile('image')){
            $oldImage = Category::where('id',$id)->first();
            $oldImage = $oldImage->image;
            if($oldImage != null){
             Storage::delete('public/'.$oldImage);
            }
            $fileName = uniqid().$request->image->getClientOriginalName();
            $request->image->storeAs('public/',$fileName);
            $data['image']=$fileName;
         }else{
           $getData = Category::where('id', $id)->first();
           $data['image']=$getData->image;
         }
        Category::where('id',$id)->update($data);
        return redirect()->route('category#index')->with('updateMessage','Update Successfully...');
    }
    public function destroy($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('category#index')->with(['deleteSuccess'=>'Delete Success...']);
    }
    public function change($id){
       $data = Category::where('id', $id)->first();
       $result = [
        'status' => $data['status']
    ];
        if($data['status'] == 1){
            $result['status'] = 0;
        }elseif($data['status'] == 0){
            $result['status'] = 1;
        }else{
            dd('error');
        }

        Category::where('id', $id)->update($result);
        return back();
    }
    private function getCategoryData($request){
        return [
            'name' => $request->name,
            'image'=>$request->image,
            'status' => $request->categoryCheck == "done" ? true : false,
        ];
    }
}
