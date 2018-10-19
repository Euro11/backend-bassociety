<?php

namespace App\Http\Controllers\BackOffice\Webboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Comment;
use App\Posts;
use Session;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('BackOffice.webboard.category', compact('category'));
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
                'category_name' => 'required|max:255',
            ));     
            // store in the database
            $category = new Category;
            $category->fill($request->all());
            $category->save();
            
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('success', 'Category was created!');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $posts = Posts::where('category_id','=', $id)->get();
        return view('BackOffice.webboard.posts', compact('posts', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('BackOffice.webboard.EditCategory', compact('category'));
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
            $category = Category::find($id);
            $category->fill($request->all());
            $category->save();
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('warning', 'Category was successfully editing!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $category = Category::find($id);
        $category->delete();
        Session::flash('delete', 'Category was successfully deleted.');
        return redirect()->route('category.index');
    }
}
