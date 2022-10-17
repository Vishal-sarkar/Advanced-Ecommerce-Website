<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->quantity, 
                'price' => $product->selling_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ]
            ]);
            return response()->json(['success' => 'Successfully Added to your Cart']);
        } else {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->quantity, 
                'price' => $product->discount_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ]
            ]);
            return response()->json(['success' => 'Successfully Added to your Cart']);
            
        } 
    }

    public function AddMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round((int)$cartTotal),
        ));
    }

    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product remove from Cart']);

    }

    public function CouponApply(Request $request){
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);
            return response()->json(['success' => 'Coupon Applied Successfully']);

        } else {
            return response()->json(['error' => 'Invalid coupon']);
        }
        
    }

    public function CouponCalculation(){

        if (Session::has('coupon')) {
            return response()->json([
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ]);
        } else {
            return response()->json([
                'total' => Cart::total(),
            ]);
            
        }


    }//end method

    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Removed Successfully']);
        
    }//end method

    public function CheckoutCreate(){
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $divisions = ShipDivision::orderBy('division_name', 'DESC')->get();
                $districts = ShipDistrict::orderBy('district_name', 'DESC')->get();
                $states = ShipState::with('division','district')->orderBy('id', 'DESC')->get();
                return view('frontend.checkout.checkout_view', compact('carts','cartQty','cartTotal','divisions','districts'));
            } else {
                $notification = array(
                    'message' => 'Add at least one product',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }
            
        } else {
            $notification = array(
                'message' => 'You need to Login first',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
        
    }
    

}