<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Multiimg;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->get();
        $special_offers = Product::where('special_offer',1)->orderBy('id','DESC')->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();

        return view('frontend.index', compact('categories','sliders','products','featured','hot_deals','special_offers','skip_product_0','skip_category_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1'));
    }

    public function UserLogout(){
        Auth::logout();
        $notification = array(
            'message' => 'User logout successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('login')->with($notification);
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        
        return view('frontend.profile.change_password', compact('user'));
    }

    public function UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $admin = User::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
            
        }
    }

    public function ProductDetails($id,$slug){
        $product = Product::findOrFail($id);
        $multiImag = Multiimg::where('product_id' ,$id)->get();
        return view('frontend.product.product_details', compact('product','multiImag'));
    }
}
