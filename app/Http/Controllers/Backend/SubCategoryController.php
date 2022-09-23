<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory','categories'));
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
        ],[
            'category_id.required' => 'Please select any option',
            'subcategory_name_en.required' => 'SubCategory Brand english Name',
            'subcategory_name_hin.required' => 'SubCategory Brand Hindi Name',
        ]);
        
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ','-',$request->subcategory_name_hin),
        ]);
        $notification = array(
            'message' => 'Sub-Category Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory','categories'));
    }

    public function SubCategoryUpdate(Request $request){
        $subcategory_id = $request->id;
        
        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ','-',$request->subcategory_name_hin),
        ]);
        $notification = array(
            'message' => 'Sub-Category Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);

    }

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-Category Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
