<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site_setting;

class SitesettingController extends Controller
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

     public function index(){
        $sitesetting = Site_setting::where('id',1)->get()->first();
        return view('admin.sitesetting.index',compact('sitesetting'));
     }
     public function store(Request $res,$id){
        //dd($res->all());
        $ss = Site_setting::findorfail($id);
        if($res->hasFile('logo')){
         $image_name = 'Site_logo_Img'.time().'_'.rand(1000,1000000).'.'.$res->logo->extension();
         $res->logo->move(public_path('uploads/sitesetting'), $image_name);  
         $ss->logo = $image_name;
         $oldpic_path = 'uploads/sitesetting/'.$res->old_logo;
         unlink($oldpic_path);
        }
        if($res->hasFile('fav')){
         $imagename = 'favicon_Img'.time().'_'.rand(1000,1000000).'.'.$res->fav->extension();
         $res->fav->move(public_path('uploads/sitesetting'), $imagename);  
         $ss->fav_image = $imagename;
         $oldpicpath = 'uploads/sitesetting/'.$res->old_fav;
         //unlink($oldpicpath);
        }
        $ss->name = $res->name;
        $ss->email = $res->email;
        $ss->contact_no = $res->contact;
        $ss->address = $res->address;
        $ss->facebook_page_link = $res->fblink;
        $ss->youtube_page_link = $res->ytlink;
        $ss->instagram_page_link = $res->twit;
        $ss->twiter_link = $res->iglink;
        $ss->save();
         return redirect('admin/sitesetting');
     }
}
