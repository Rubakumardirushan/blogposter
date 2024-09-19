<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blogpost;
use Illuminate\Support\Facades\Validator;

class Postcontroller extends Controller
{

public function index(){
    $blogpost = blogpost::all();

    return view('Blog.Blogpost',compact('blogpost'));
}
public function show($id)
{
    $post = BlogPost::findOrFail($id); 
    return view('Blog.BlogShow', compact('post')); 
}
public function mypost(){
    $blogpost = blogpost::where('user_id', auth()->user()->id)->get();
    return view('Blog.Mypost',compact('blogpost'));
}
public function destroy($id){

    $blogpost = blogpost::find($id);
    $blogpost->delete();
    $blogpost = blogpost::where('user_id', auth()->user()->id)->get();
    return view('Blog.Mypost',compact('blogpost'));
}
    







   
    public function store(Request $request){
       
        $validatedData = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required|min:50',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $blogpost = new blogpost();
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
     if($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $blogpost->image = $imageName;

    }


       
        $blogpost->title = $request->title;
        $blogpost->body = $request->body;
       
        $blogpost->user_id = auth()->user()->id;
        $blogpost->save();

        session()->flash('status', 'Blog has been added successfully');
        return redirect()->route('createblog');

}



}