<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $category = Category::where('dstatus',0)->paginate(env('PAGINATION'));
            $serialNumberStart = ($category->currentPage() - 1) * $category->perPage() + 1;
            return view('admin.category.index',compact('category','serialNumberStart'));
    }
    public function add(){
        return view('admin.category.add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|unique:categories',
            'image' =>'required|mimes:jpg,jpeg,png,webp,gif',
            'status' => 'required',
        ]);
        //dd($request->all());
        $imagename = 'Category_img_'.time().'_'.rand(1000,1000000).'.'.$request->image->extension();
        $request->image->move(public_path('uploads/category'), $imagename);
        $category = new Category;
        $category->name = $request->name;
        $category->image = $imagename;
        $category->status = $request->status;
        $category->save();
        return redirect(route('admin.category')); 
    }
    public function edit($id){
        $category = Category::findorfail($id);
        return view('admin.category.edit',['category' => $category]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'image' =>'nullable|mimes:jpg,jpeg,png,webp,gif',
            'status' => 'required',
        ]);
        $category = Category::where('id',$id)->first();
        if(isset($request->image)){
            $imagename = 'Category_img_'.time().'_'.rand(1000,1000000).'.'.$request->image->extension();
            $request->image->move(public_path('uploads/category'), $imagename);  
            $category->image = $imagename;
            $oldpicpath = 'uploads/category/'.$request->old_pic;
            unlink($oldpicpath);
        }
        //dd($request->all());
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
            return redirect(route('admin.category')); 
    }
    public function delete($id){
      $cat_del = Category::where('id',$id)->first();
      $cat_del->dstatus = '1';
      $cat_del->save();
      return redirect(route('admin.category')); 
    }
}
