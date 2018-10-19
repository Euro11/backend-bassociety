<?php

namespace App\Http\Controllers\BackOffice\Webboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Comment;
use App\Posts;
use Session;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function CreatePosts($id)
    {
        $category = Category::find($id);
        return view('BackOffice.webboard.CreatePosts', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            // validate the data
            $this->validate($request, array(
                'post_title' => 'required|max:255',
                'post_description' => 'required|max:255',
            ));     
            // store in the database
            $posts = new Posts;
            $posts->post_title = $request->post_title;
            $posts->post_description = $request->post_description;
            $posts->category_id = $request->category_id;
            $posts->view = 0;
            $posts->count_comment = 0;
            $posts->save();
            
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('success', 'Posts was created!');
        return redirect()->route('category.show', $posts->category_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);
        $comment = Comment::where('posts_id','=', $id)->get();
        return view('BackOffice.webboard.comment', compact('comment', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Posts::find($id);
        return view('BackOffice.webboard.EditPosts', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            // store in the database
            $posts = Posts::find($id);
            $posts->post_title = $request->post_title;
            $posts->post_description = $request->post_description;
            $idRef = $posts->category_id;
            $posts->save();
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('warning', 'Category was successfully editing!');
        return redirect()->route('category.show',compact('idRef'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::find($id);
        $idRef = $posts->category_id;
        $posts->delete();
        Session::flash('delete', 'posts was successfully deleted.');
        return redirect()->route('category.show',compact('idRef'));
    }
}
