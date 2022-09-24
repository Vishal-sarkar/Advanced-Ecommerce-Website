<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;


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

    ////////////////////// That for SUB->SUBCATEGORY /////////////////////
    
    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategory','categories'));
    }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
        ],[
            'category_id.required' => 'Please select any option',
            'subsubcategory_name_en.required' => 'Input Sub-SubCategory english Name',
            'subsubcategory_name_hin.required' => 'Input Sub-SubCategory Hindi Name',
        ]);
        
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ','-',$request->subsubcategory_name_hin),
        ]);
        $notification = array(
            'message' => 'Sub-SubCategory Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit', compact('subcategories','categories','subsubcategories'));
    }

    public function SubSubCategoryUpdate(Request $request){
        $subcategory_id = $request->id;
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
        ],[
            'category_id.required' => 'Please select any option',
            'subsubcategory_name_en.required' => 'Input Sub-SubCategory english Name',
            'subsubcategory_name_hin.required' => 'Input Sub-SubCategory Hindi Name',
        ]);
        
        SubSubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ','-',$request->subsubcategory_name_hin),
        ]);
        $notification = array(
            'message' => 'Sub-SubCategory Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-SubCategory Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
