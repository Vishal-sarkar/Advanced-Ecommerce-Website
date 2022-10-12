<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $product_id){
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id',$product_id)->first();
            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully added to your wishlist']);
            } else {
                return response()->json(['error' => 'The product is already exist in your wishlist']);
            }
            
            
        } else {
            return response()->json(['error' => 'Login To add to wishlist']);
        }
        
    } //end method
}
