<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // show all blogs
    public function index() {
        return view('blogs.index', [
            // shows max 1O posts filtered by author and displays the newest one first
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

        $formFields['user_id'] = auth()->id();

        Blog::create($formFields);
        
        return redirect('/');
    }

    // show edit blog form
    public function edit(Blog $blog) {
        return view('blogs.edit', ['blog' => $blog]);
    }

    // update blog data
    public function update(Request $request, Blog $blog) {
        // check if logged user is owner (or admin(not added yet))
        if ($blog->user_id != auth()->id()) {
            abort(403, 'you are not authorized for this action');
        }

        $formFields = $request->validate([
            'name' => 'required',
            'text' => 'required',
            'author' => 'required'
        ]);

        $blog->update($formFields);
        
        return back();
    }

    //delete blog
    public function destroy(Blog $blog) {
        // check if logged user is owner (or admin(not added yet))
        if ($blog->user_id != auth()->id()) {
            abort(403, 'you are not authorized for this action');
        }
        
        $blog->delete();
        return redirect('/');
    }

    //manage blogs
    public function manage(){
        return view('blogs.manage', ['blogs' => auth()->user()->blogs()->get()]);
    }

}
