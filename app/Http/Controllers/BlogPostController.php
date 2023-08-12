<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogPosts = BlogPost::all();
        return View('blog.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!$request->input('blogDetails')){
            return redirect()->back()->with('failed', 'Blog post Details Required!');
        }
        $blogPost = new BlogPost();
        $blogPost->title = $request->input('blogTitle');
        $blogPost->details = $request->input('blogDetails');
        $blogPost->category_id = $request->input('category');
        $blogPost->user_id = 0;
        $photo = $request->file('featuredPhoto');
        if ($photo != null) {
            $ext = $photo->getClientOriginalExtension();
            $filename = rand(10000, 50000) . '.' . $ext;
            if($photo->move(public_path('blog_post_featured_image'), $filename)){
                $blogPost->featured_image_url = url('/blog_post_featured_image') . '/' . $filename;
            }
        }
        if($blogPost->save()){
            return redirect()->back()->with('success', 'Blog post information saved successfully!');
        }
        return redirect()->back()->with('failed', 'Blog post information Could not save!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $blogPost = BlogPost::find($id);
        return view('blog.edit', compact('blogPost', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(!$request->input('blogDetails')){
            return redirect()->back()->with('failed', 'Blog post Details Required!');
        }
        $blogPost = BlogPost::find($id);
        $blogPost->title = $request->input('blogTitle');
        $blogPost->details = $request->input('blogDetails');
        $blogPost->category_id = $request->input('category');
        $blogPost->user_id = 0;
        $photo = $request->file('featuredPhoto');
        if ($photo != null) {
            $ext = $photo->getClientOriginalExtension();
            $filename = rand(10000, 50000) . '.' . $ext;
            if($photo->move(public_path('blog_post_featured_image'), $filename)){
                $blogPost->featured_image_url = url('/blog_post_featured_image') . '/' . $filename;
            }
        }
        if($blogPost->save()){
            return redirect()->back()->with('success', 'Blog post information updated successfully!');
        }
        return redirect()->back()->with('failed', 'Blog post information Could not update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(BlogPost::destroy($id)){
            return redirect()->back()->with('success', 'Blog post information deleted duccessfully!');
        }
        return redirect()->back()->with('failed', 'Blog post information could not delete!');
    }
}
