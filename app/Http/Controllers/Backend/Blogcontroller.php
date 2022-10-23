<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPost;
use Carbon\Carbon;
use Image;

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


    /////////////////////// Blog Post All Methods //////////////////////////

    public function ListBlogPost(){
        $blogpost = BlogPost::with('CategoryId')->latest()->get();
        return view('backend.blog.post.post_list', compact('blogpost'));
    }
    
    public function AddBlogPost(){
        $blogCategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_add', compact('blogpost','blogCategory'));
    }

    public function BlogPostStore(Request $request){
        $request->validate([
            'post_title_en' => 'required',
            'post_title_hin' => 'required',
            'post_image' => 'required',
        ],[
            'post_title_en.required' => 'Input Post Title english',
            'post_title_hin.required' => 'Input Post Title Hindi',
        ]);
        
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
        $save_url = 'upload/post/'.$name_gen;
        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_hin' => $request->post_title_hin,
            'post_slug_en' => strtolower(str_replace(' ','-',$request->post_title_en)),
            'post_slug_hin' => str_replace(' ','-',$request->post_title_hin),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_hin' => $request->post_details_hin,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Blog Post Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('list.post')->with($notification);
    }
    
}
