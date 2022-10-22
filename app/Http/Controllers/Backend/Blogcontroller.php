<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;


class Blogcontroller extends Controller
{
    public function BlogCategory(){
        $blogCategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view', compact('blogCategory'));
    }

    public function BlogCategoryStore(Request $request){
        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_hin' => 'required',
        ],[
            'blog_category_name_en.required' => 'Type Blog Category english Name',
            'blog_category_name_hin.required' => 'Type Blog Category Hindi Name',
        ]);
        
        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' => strtolower(str_replace(' ','-',$request->blog_category_name_en)),
            'blog_category_slug_hin' => str_replace(' ','-',$request->blog_category_name_hin),
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Blog Category Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BlogCategoryEdit($id){
        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit', compact('blogcategory'));
    }

    public function BlogCategoryUpdate(Request $request){
        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_hin' => 'required',
        ],[
            'blog_category_name_en.required' => 'Type Blog Category english Name',
            'blog_category_name_hin.required' => 'Type Blog Category Hindi Name',
        ]);
        $blogcat_id = $request->id;
        BlogPostCategory::findOrFail($blogcat_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' => strtolower(str_replace(' ','-',$request->blog_category_name_en)),
            'blog_category_slug_hin' => str_replace(' ','-',$request->blog_category_name_hin),
            'updated_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Blog Category updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('blog.category')->with($notification);
    }

    public function BlogCategoryDelete($id){
        BlogPostCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Category Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
