<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\News;
use App\Tag;
use App\Type;
use Session;
use DB;

class VdoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vdo = DB::table('News')
                        ->select('News.id','News.title','News.image','News.detail','News.view','News.vdo','News.type','type.type_name')
                        ->join('type', 'News.type', '=', 'type.type')
                        ->where('News.type', '=', 4)
                        ->orWhere('News.type', '=', 5)
                        ->get();
        return view('BackOffice.vdo.vdo',compact('vdo'));
        return view('BackOffice.vdo.vdo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vdo = News::all();
        $tags = Tag::all();
        return view('BackOffice.vdo.Createvdo')->withTags($tags);
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
                'title' => 'required|max:255',
                'image' => 'required',
                'detail' => 'required',
            ));     
            // store in the database
            $vdo = new News;
            $vdo->fill($request->all());
            $vdo->vdo = $request->vdo;
            $vdo->view = 0;
            $vdo->save();

            foreach ($request->tags as $tag) {
                $post_tag = new Post;
                $post_tag->post_id = $vdo->id;
                $post_tag->tag_id = $tag;
                $post_tag->save();
            }            
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('success', 'The content was created!');
        return redirect()->route('vdo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['tag'] = Tag::all();
        $data['vdo'] = News::find($id);        
        $data['tags2'] = DB::table('post_tag')
                        ->select('tags.*')
                        ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
                        ->where('post_tag.post_id' , $id)
                        ->get()->toArray();
        return view('BackOffice.vdo.Editvdo', $data);
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
            $vdo = News::find($id);
            if (!empty($request->image)) {
                $vdo->image = $request->image;
            }
            $vdo->type = $request->type;
            $vdo->title = $request->title;
            $vdo->detail = $request->detail;
            $vdo->detail = $request->detail;
            $vdo->vdo = $request->vdo;
            $vdo->updated_at = now();
            $vdo->save();

            $post_tag = Post::where('post_id', $id)->delete();
            foreach ($request->tags as $tag) {
                $post_tag = new Post; //Add new tag                    
                $post_tag->post_id = $vdo->id;
                $post_tag->tag_id = $tag;
                $post_tag->save();
            }
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('warning', 'The content was successfully save!');
        return redirect()->route('vdo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vdo = News::find($id);
        $vdo->delete();
        Session::flash('delete', 'The post was successfully deleted.');
        return redirect()->route('vdo.index');
    }
}
