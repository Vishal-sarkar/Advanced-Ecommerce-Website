<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPost;

class HomeBlogcontroller extends Controller
{
    public function HomeBlog(){
        $blogCategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('frontend.blog.home_blog_view', compact('blogpost','blogCategory'));
    }

    public function DetailsBlogPost($id){
        $blogCategory = BlogPostCategory::latest()->get();
        $blog = BlogPost::findOrFail($id);
        return view('frontend.blog.home_blog_details_view', compact('blog','blogCategory'));
    }

    public function HomeBlogCatPost($category_id){
        $blogCategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::where('category_id', $category_id)->orderBy('id','DESC')->get();
        return view('frontend.blog.home_blog_cat_view', compact('blogpost','blogCategory'));
    }
}
