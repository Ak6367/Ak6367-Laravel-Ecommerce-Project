<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Banner;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Site_setting;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Support\Facades\URL;
use Razorpay\Api\Api;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = Banner::select('image','button_text')->get();
        $letestPro = Product::where(['is_latest'=>1,'status'=>1,'dstatus'=>0])->get();
        $featuredPro = Product::where(['is_featured'=>1, 'status'=>1,'dstatus'=>0])->get();
         
        return view('home',compact('banner','letestPro','featuredPro'));
    }
    public function category(Request $res)
    {
        $id = $res->id;
        $type = $res->type;
        $catid = base64_decode($id);
        // $curruntUrl = url()->full();
        $curruntUrl = URL::full();
        try{
            if(is_null($type) || empty($id)){
                return redirect('home');
            }else{
                if($type == 'category'){
                    $products = Product::where(['category_id'=>$catid,'status'=>1,'dstatus'=>0])->get();
                    $subcat = SubCategory::join('products', 'sub_categories.id', '=', 'products.subcategory_id')
                    ->distinct('subcategory_id')
                    ->select('sub_categories.*', 'products.subcategory_id')
                    ->where(['sub_categories.category_id'=>$catid,'sub_categories.status'=>1,'sub_categories.dstatus'=>0])
                    ->get();


                    $type = 'category';
                    return view('category',compact('products','subcat','type','curruntUrl'));
                }else{
                    $products = Product::where(['subcategory_id'=>$catid,'status'=>1,'dstatus'=>0])->get();
                    $category = Category::where(['status'=>1,'dstatus'=>0])->get();
                    $type = 'subcategory';
                    return view('category',compact('products','category','type','curruntUrl'));
                }
            }
        }catch(\Exeception $e){
            return response()->json([
                'message'=>'Somthing goes wrong while processing request',
            ],500);
        }
    }   
    public function products($id){
        $refid = base64_decode($id);
        $products = Product::where(['id'=>$refid,'status'=>1,'dstatus'=>0])->get()->first();
        $product_images = ProductImage::where(['product_id'=>$refid,'status'=>1,'dstatus'=>0])->get();
        $category = Category::where(['id'=>$products->category_id,'status'=>1,'dstatus'=>0])->first();
        $related_pro =  Product::where('id','<>',$refid)->where(['subcategory_id'=>$products->subcategory_id])->get();
        $url = Session::put('previous_url', url()->previous());
        //dd($url);
        return view('product',compact('products','product_images','category','related_pro','url'));
    }
    public function add_to_cart(Request $res){
        //dd(auth::User()->id);
        $status = 0;
       if(!empty($res->productid)){
        $user_id = auth::User()->id;
        $product_id = $res->productid;
        $cart = Cart::where(['user_id' => $user_id, 'product_id' =>$product_id])->first();
       
        if(!$cart){
            $add_cart = new Cart();
            $add_cart->user_id = $user_id;
            $add_cart->product_id = $product_id;
            $add_cart->qty = '1';
            $add_cart->save();
            $status = 1;
        }else{
            $add_cart = Cart::find($cart->id);
            $add_cart->qty =  $cart->qty+1;
            $add_cart->save();
            // $qty = $cart[0]['qty']; 
            // Cart::where(['user_id' => $user_id, 'product_id' =>$product_id])->update(['qty'=>$qty+1]);
            $status = 1;
        }
       }else{
        $status = 0;
       }
       $cartsum  = Cart::where(['user_id'=>$user_id])->sum('qty');
       echo json_encode(['status'=>$status,'totalqty'=>$cartsum]);   
    }
    public function cart(){
        $userid = auth::User()->id;
        $cartitems = Cart::
        join('products', 'carts.product_id', '=', 'products.id')
        ->select('carts.*', 'products.name', 'products.image', 'products.price')
        ->where(['user_id'=>$userid])
        ->get();
        if($cartitems->count() > 0){
            return view('cart',compact('cartitems'));
        }else{
            return redirect('/home');
        }
    
        
    }
    public function updateqty(Request $res){
        if(isset($res->qty) && count($res->qty) > 0){
            foreach ($res->qty as $cartid=>$cartqty ) {
               Cart::findorfail($cartid)->update(['qty'=>$cartqty]);
            }
            return back()->with(['success_msg' => 'Quantity Updated Successfuly']);
        }else{
            return redirect('/yourcart')->with(['error_msg' => 'Somthing went gone wrong']);
        }
    }
    public function ajaxcartdel(Request $request){
        $status = 1;
        if(!empty($request->cart)){
            Cart::where('id',$request->cart)->delete();
            $status = 1;
        }else{
            $status = 0;
        }
        echo $status;exit;
    }
    public function checkout(){
        $userid = auth::User()->id;
        $productItem = Product::join('carts','products.id', '=', 'carts.product_id')
        ->where('carts.user_id',$userid)
        ->get();
        $user_address = Order::where(['user_id' => $userid ])
        ->orderBy('id','desc')
        ->get()
        ->first();
        // dd($user_address->toarray());
        return view('checkout',compact('productItem','user_address'));
    }
    public function shippingaddress(Request $res){
       
        // dd($res->all());
        $res->validate([
            'fullname' => 'required|string',
            'country' => 'required',
            'state' => 'required',
            'city' =>'required',
            's_address' => 'required',
            'town' => 'required',
            'pincode' => 'required',
            'mobile' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required',
        ]);
        // dd($res->subtotal_amount);
        $order = new Order;
        $user_id = user_id();
        $orderno = 'Vinaika-Jaipur-'.rand(11111,999999).'-'.$user_id ;

        if($res->paymenttype == 1){   
            $order->user_id = $user_id;
            $order->order_no = $orderno;
            $order->name = $res->fullname;
            $order->country = $res->country;
            $order->state = $res->state;
            $order->city = $res->city;
            $order->address1 = $res->s_address;
            $order->address2 = $res->town;
            $order->pincode = $res->pincode;
            $order->mobile_no = $res->mobile;
            $order->email = $res->email;
            $order->payment_type = $res->paymenttype;
            $order->order_amount = $res->subtotal_amount;
            $order->shipping_amount = $res->shippingcharege;
            $order->total_amount = $res->total_amount;
                
        }else{
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_KEY_SECRET'));
            // dd(env('RAZORPAY_KEY'));
            $orders = $api->order->create([
                'receipt' => $orderno,
                'amount' => $res->subtotal_amount,
                'currency' => 'INR',
            ]);
    
            // You may want to store the Razorpay Order ID in your database
            // $order->order_id = $order['id'];
                // dd($orders['id']);
        }
        // if($order->save()){
        //     $orderid = $order->id;
        //     $cartQuery = cartitem();
        //     //dd($producQuery->toArray());
        //     $orderNo =  $order->order_no;
        //     foreach($cartQuery as $cartitem){
        //         $order_detail = new OrderDetail;
        //         $order_detail->order_id =  $orderid;             
        //         $order_detail->product_id = $cartitem->product_id;             
        //         $order_detail->price = $cartitem->price;             
        //         $order_detail->qty =  $cartitem->qty;
        //         if($order_detail->save()){
        //             $EmptyCart = Cart::where('user_id',$user_id)->delete();
        //         }            
        //     }
        // }
        // return redirect('/ordersuccess?order_no=' . $orderNo);
        
    }
    public function ordersuccess(Request $res){
        //dd($res->toArray());
        $order_detail = Order::where('order_no',$res->order_no)->get()->first();
        $products = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
        ->select('order_details.qty', 'products.*')
        ->where(['order_details.order_id'=>$order_detail->id])
        ->get();
        // dd($products);
        return view('ordersuccess',compact('order_detail','products'));
    }
}
