<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Multiimg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }
    public function ProductDetailView($id){
        $multiImgs = Multiimg::where('product_id', $id)->get();
        $products = Product::findOrFail($id);
        $brands = Brand::latest()->get();
        $subcategory = Subcategory::latest()->get();
        $subsubcategory = SubSubcategory::latest()->get();
        $categories = Category::latest()->get();

        return view('backend.product.product_details_view', compact('products','brands','subcategory','subsubcategory','categories','multiImgs'));
    }

    public function StoreProduct(Request $request){

        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        ]);

        if($file = $request->file('file')){
            $destinationPath = 'upload/pdf';
            $digitalItem = date('YmdHis').".".$file->getClientOriginalExtension();
            $file->move($destinationPath,$digitalItem);
        }

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_hin' => str_replace(' ','-',$request->product_name_hin),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            'digital_file' => $digitalItem,

            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        ////////// Multi Image Upload Start ///////////
        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadpath = 'upload/products/multi-image/'.$make_name;

            Multiimg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadpath,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-product')->with($notification);

    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function EditProduct($id){
        $multiImgs = Multiimg::where('product_id', $id)->get();
        $products = Product::findOrFail($id);
        $brands = Brand::latest()->get();
        $subcategory = Subcategory::latest()->get();
        $subsubcategory = SubSubcategory::latest()->get();
        $categories = Category::latest()->get();

        return view('backend.product.product_edit', compact('products','brands','subcategory','subsubcategory','categories','multiImgs'));
    }

    public function ProductDataUpdate(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_hin' => str_replace(' ','-',$request->product_name_hin),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        ////////// Multi Image Upload Start ///////////
        $notification = array(
            'message' => 'Product Updated without image successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-product')->with($notification);

    }

    public function MultiImageUpdate(Request $request){
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $imgDel = Multiimg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadpath = 'upload/products/multi-image/'.$make_name;
            Multiimg::where('id',$id)->update([
                'photo_name' => $uploadpath,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Image Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //// Product Main Thambnail Upadate /////
    public function ThambnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;
        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Thambnail Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function MultiImageDelete($id){
        $oldimg = Multiimg::findOrFail($id);
        unlink($oldimg->photo_name);
        $oldimg->delete();
        $notification = array(
            'message' => 'Product Thambnail Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();
        $images = Multiimg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            Multiimg::where('product_id',$id)->delete();
        }
        $notification = array(
            'message' => 'Product deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductStock(){
        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }

}