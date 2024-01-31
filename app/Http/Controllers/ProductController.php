<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;

class ProductController extends Controller
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
        $product = Product::where('dstatus',0)->paginate(env('PAGINATION'));
        $serialNumberStart = ($product->currentPage() - 1) * $product->perPage() + 1;
        return view('admin.product.index',compact('product','serialNumberStart'));
    }
    public function add(){
        $categorydata = Category::where('status',1)->select('id','name')->get();
        $subcategory = SubCategory::where('status',1)->select('id','name')->get();
        return view('admin.product.add', compact('categorydata'),compact('subcategory'));
    }
    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|unique:products',
            'mrp' => 'required',
            'price' => 'required',
            'subcategory' => 'required',
            'category' =>'required',
            'image' =>'required|mimes:jpg,jpeg,png,webp,gif',
            'gallery.*' => 'required|image|mimes:jpg,jpeg,png,webp,gif',
            'featured' => 'required',
            'latest' => 'required',
            'status' => 'required',
        ]);
        $imagename = 'Product_Img'.time().'_'.rand(1000,1000000).'.'.$request->image->extension();
        $request->image->move(public_path('uploads/products'), $imagename);

        $product = new Product();
        $product->name = $request->name;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->is_featured = $request->featured;
        $product->is_latest = $request->latest;
        $product->image = $imagename;
        $product->status = $request->status;
        if($product->save()){
            $productid = $product->id;
            foreach ($request->gallery as  $galimg) {

                $productimage = new ProductImage();
                $galimgname = 'Product_gallary_img'.time().'_'.rand(1000,1000000).'.'.$galimg->getClientOriginalExtension();
                $galimg->move(public_path('uploads/products/gallary/'), $galimgname);
                $productimage->product_id = $productid;
                $productimage->image = $galimgname;

                $productimage->save();
            }
        }
        return redirect('admin/products');
    }
    public function getsubcategory(Request $request){
        $html = '<option value="">Select Subcategory</option>';
        if(!empty($request->category_id)){
            $subdata = SubCategory::where(['category_id'=>$request->category_id,'status'=>1,'dstatus'=>0])->select('id','name')->get();
            foreach($subdata as $subcate){
                $html .= '<option value="'.$subcate->id.'">'.$subcate->name.'</option>';
            }
            echo json_encode(['status'=>true,'data'=>$html]);exit;
        }
    }
    public function edit($id){
        $categorydata = Category::where(['status'=>1,'dstatus'=>0])->select('id','name')->get();
        $subcategory = SubCategory::where(['status'=>1,'dstatus'=>0])->select('id','name')->get();
        $productimage = ProductImage::where(['product_id'=>$id,'dstatus'=>0])->get();
        $prodata = Product::findorfail($id);
        return view('admin.product.edit',compact('prodata','subcategory','categorydata','productimage'));
    }
    public function ajaxgallerydelete(Request $res){
        $productimage = ProductImage::find(['product_id'=>$res->gallery_id])->first();
        $oldimagepath = 'uploads/products/gallary/'.$productimage->image;
        unlink($oldimagepath);
        $productimage->delete();
    }
    public function update(Request $request,$id){
        //dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'mrp' => 'required',
            'price' => 'required',
            'subcategory' => 'required',
            'category' =>'required',
            'featured' => 'required',
            'latest' => 'required',
            'status' => 'required',
        ]);
        $product = Product::findorfail($id);
        if(isset($request->image)){
            $imagename = 'Product_Img'.time().'_'.rand(1000,1000000).'.'.$request->image->extension();
            $request->image->move(public_path('banners'), $imagename);  
            $product->image = $imagename;
            $oldpicpath = 'uploads/products/'.$request->old_pic;
            unlink($oldpicpath);
        }
        //dd($request->all());
        $product->name = $request->name;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->is_featured = $request->featured;
        $product->is_latest = $request->latest;
        $product->status = $request->status;
        if($product->save()){
            if($request->hasFile('gallery')){
                if($product->save()){
                    $productid = $product->id;
                    foreach ($request->gallery as  $galimg) {
        
                        $productimage = new ProductImage();
                        $galimgname = 'Product_gallary_img'.time().'_'.rand(1000,1000000).'.'.$galimg->getClientOriginalExtension();
                        $galimg->move(public_path('uploads/products/gallary/'), $galimgname);
                        $productimage->product_id = $productid;
                        $productimage->image = $galimgname;
        
                        $productimage->save();
                    }
                }
            }
        }
        return redirect('admin/products'); 
    }
    public function delete($id){
        $product= Product::find($id);
        $product->dstatus = 1;
        $product->save();
        return redirect('admin/products');
    }
}
