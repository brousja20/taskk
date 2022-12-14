<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'blog' => $blog,
            // 'comments' => Comment::where('blog_id', '=', $blog->id)->get()
            'comments' => $blog->comments()->get()
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
        // check if logged user is owner or admin
        if ($blog->user_id == auth()->id() or Auth::user()->role == '1') {

            $formFields = $request->validate([
                'name' => 'required',
                'text' => 'required',
                'author' => 'required'
            ]);
    
            $blog->update($formFields);
            
            return back();

        } else {
            abort(403, 'you are not authorized for this action');
        }
    }

    //delete blog
    public function destroy(Blog $blog) {
        // check if logged user is owner or admin
        if ($blog->user_id == auth()->id() || Auth::user()->role == '1') {
            $blog->delete();
            return redirect('/');
        } else {
            abort(403, 'you are not authorized for this action');
        }
    }

    //manage blogs
    public function manage(){
        return view('blogs.manage', ['blogs' => auth()->user()->blogs()->get()]);
        // return view('blogs.manage', ['blogs' => User::find(Auth::id())->user()->blogs()->get()]);

    }

    //api route for react json
    public function rtrnAll(){
        $id = Auth::id();
        $user = User::find(intval($id));
        $allpost = $user->blogs()->get();

        return $allpost;
    }

}
