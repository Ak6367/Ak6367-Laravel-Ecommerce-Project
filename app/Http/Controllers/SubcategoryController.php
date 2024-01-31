<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;

class SubcategoryController extends Controller
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
        $subcategory = SubCategory::where(['dstatus'=>0,])->paginate(env('PAGINATION'));
        $serialNumberStart = ($subcategory->currentPage() - 1) * $subcategory->perPage() + 1;
        $catedata = Category::where('status',1)->select('id','name')->get();
        return view('admin.subcategory.index',compact('subcategory','catedata', 'serialNumberStart'));
    }
    public function add(){
        $categorydata = Category::where('status',1)->select('id','name')->get();
        return view('admin.subcategory.add', compact('categorydata'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'category' =>'required',
            'image' =>'required|mimes:jpg,jpeg,png,webp,gif',
            'status' => 'required',
        ]);
        //dd($request->all());
        $imagename = 'Subcategory_img_'.time().'_'.rand(1000,1000000).'.'.$request->image->extension();
        $request->image->move(public_path('uploads/subcategory'), $imagename);

        $subcategory = new SubCategory;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->image = $imagename;
        $subcategory->status = $request->status;
        $subcategory->save();
        return redirect(route('admin.subcategory')); 
    }
    public function edit($id){
        $categorydata = Category::where('status',1)->select('id','name')->get();
        $subcategory = SubCategory::where('id',$id)->first();
        return view('admin.subcategory.edit',['subcategory' => $subcategory,'categorydata'=>$categorydata,]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'category' =>'required',
            'image' =>'nullable|mimes:jpg,jpeg,png,webp,gif',
            'status' => 'required',
        ]);
        $subcategory = SubCategory::where('id',$id)->first();
        if(isset($request->image)){
            $imagename = 'SubCategory_img_'.time().'_'.rand(1000,1000000).'.'.$request->image->extension();
            $request->image->move(public_path('uploads/subcategory'), $imagename);  
            $subcategory->image = $imagename;
            $oldpicpath = 'uploads/subcategory/'.$request->old_pic;
            unlink($oldpicpath);
        }
        //dd($request->all());
            $subcategory->name = $request->name;
            $subcategory->category_id = $request->category;
            $subcategory->status = $request->status;
            $subcategory->save();
            return redirect(route('admin.subcategory'));
    }
    public function delete($id){
        $subcat_del = SubCategory::where('id',$id)->first();
        //$subcategory = new SubCategory;
        $subcat_del->delete();
        return redirect(route('admin.subcategory'));
      }
}
