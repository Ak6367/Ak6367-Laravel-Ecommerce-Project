<?php 

use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth; 
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\SubCategory;

    function categories(){
        $categoriesWithProducts = Category::join('products', 'categories.id', '=', 'products.category_id')
            ->distinct('category_id')
            ->select('categories.*', 'products.category_id')
            ->get();
            return $categoriesWithProducts;
    }
    function subcategories(){
        $subcategoriesWithProducts = SubCategory::join('products', 'sub_categories.id', '=', 'products.subcategory_id')
            ->distinct('subcategory_id')
            ->select('sub_categories.*', 'products.subcategory_id')
            ->get();
            return $subcategoriesWithProducts;
    }
    function currencysym($data){
        return '₹'.$data;
    }
    function totalqty(){
        if(auth::user()){
            $userid = auth::User()->id;
            $tq = Cart::where('user_id',$userid)->sum('qty');
        echo $tq;
        }
    }
    function cartitem(){
        if(auth::user()){
            $userid = auth::User()->id;
            //echo($userid);
                $cartitems = Cart::
                join('products', 'carts.product_id', '=', 'products.id')
                ->select('carts.*', 'products.name', 'products.image', 'products.price')
                ->where(['user_id'=>$userid])
                ->get();
            return $cartitems;

        }
        
    }
    function user_id(){
        if(auth::user()){
            $userid = auth::User()->id;
            return $userid;
        }
    }
    function shipstatus($status){
        if($status == 0){
            echo 'Pending';
        }
        if($status == 1){
            echo 'Confirmed';
        }
        if($status == 2){
            echo 'Delievered';
        }
    }
    function orderstatus($status){
        if($status == 0){
            echo 'Pending';
        }
        if($status == 1){
            echo 'Confirmed';
        }
        if($status == 2){
            echo 'Delievered';
        }
    }