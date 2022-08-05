<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // show all blogs
    public function index() {
        return view('blogs.index', [
            'blogs' => Blog::latest()->filter(request(['author']))->paginate(10)
        ]);
    }

    // show single blog
    public function show(Blog $blog) {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }

    //show add post form
    public function create() {
        return view('blogs.create');
    }

    // store blog data
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'text' => 'required',
            'author' => 'required'
        ]);

        Blog::create($formFields);
        
        return redirect('/');
    }

}
