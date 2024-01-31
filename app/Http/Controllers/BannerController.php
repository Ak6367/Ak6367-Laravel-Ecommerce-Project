<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Category;

use Illuminate\Http\Request;

class BannerController extends Controller
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
        $banner = Banner::where('dstatus',0)->paginate(env('PAGINATION'));
        $serialNumberStart = ($banner->currentPage() - 1) * $banner->perPage() + 1;
        return view('admin.banner.index',compact('banner','serialNumberStart'));
    }
    public function add(){
        $categorydata = Category::where(['status'=>1,'dstatus'=>0])->select('id','name')->get();
        return view('admin.banner.add', compact('categorydata'));
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'button_text' => 'required',
            'image' =>'required|mimes:jpg,jpeg,png,webp,gif',
            'status' => 'required',
        ]);
        //dd($request->all());
       $imagename = 'Banner_Img'.time().'_'.rand(1000,1000000).'.'.$request->image->extension();
        $request->image->move(public_path('uploads/banners'), $imagename);

        $banners = new Banner;
        $banners->title = $request->title;
        $banners->sub_title = $request->sub_title;
        $banners->link = $request->link;
        $banners->button_text = $request->button_text;
        $banners->image = $imagename;
        $banners->status = $request->status;
        $banners->save();
        return redirect('admin/banner');
    }
    public function edit($id){
        $categorydata = Category::where(['status'=>1,'dstatus'=>0])->select('id','name')->get();
        $banners = Banner::findorFail($id);
        return view('admin.banner.edit',['bannersdata' => $banners,'categorydata'=>$categorydata]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'link' => 'required',
            'button_text' => 'required',
            'category' =>'required',
            'image' =>'mimes:jpg,jpeg,png,webp,gif',
            'status' => 'required',
        ]);
        $banners = Banner::where('id',$id)->first();
        if(isset($request->image)){
            $imagename = 'Banner_Img'.time().'_'.rand(1000,1000000).'.'.$request->image->extension();
            $request->image->move(public_path('uploads/banners'), $imagename);  
            $banners->image = $imagename;
            $oldpicpath = 'banners/'.$request->old_pic;
            unlink($oldpicpath);
        }
        //dd($request->all());
        $banners->title = $request->title;
        $banners->sub_title = $request->sub_title;
        $banners->description = $request->description;
        $banners->link = $request->link;
        $banners->button_text = $request->button_text;
        $banners->status = $request->status;
        $banners->save();
        return back(); 
    }
    public function delete($id){
        $banners= Banner::find($id);
        $banners->dstatus = '1';
        $banners->save();
        return back();
    }
}
