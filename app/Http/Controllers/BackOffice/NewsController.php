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

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('News')
                        ->select('News.id','News.title','News.image','News.detail','News.view','News.vdo','News.type','type.type_name')
                        ->join('type', 'News.type', '=', 'type.type')
                        ->where('News.type', '=', 1)
                        ->orWhere('News.type', '=', 2)
                        ->get();
        $data['news'] = $news;
        return view('BackOffice.news.news', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = News::all();
        $tags = Tag::all();
        return view('BackOffice.news.Createnews')->withTags($tags);
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
            $news = new News;
            $news->fill($request->all());
            $news->view = 0;
            $news->save();

            foreach ($request->tags as $tag) {
                $post_tag = new Post;
                $post_tag->post_id = $news->id;
                $post_tag->tag_id = $tag;
                $post_tag->save();
            }            
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('success', 'The content was created!');
        return redirect()->route('news.index');
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
        $data['news'] = News::find($id);        
        $data['tags2'] = DB::table('post_tag')
                        ->select('tags.*')
                        ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
                        ->where('post_tag.post_id' , $id)
                        ->get()->toArray();
        return view('BackOffice.news.Editnews', $data);
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
            $news = News::find($id);
            if (!empty($request->image)) {
                $news->image = $request->image;
            }
            $news->type = $request->type;
            $news->title = $request->title;
            $news->detail = $request->detail;
            $news->detail = $request->detail;
            $news->updated_at = now();
            $news->save();

            $post_tag = Post::where('post_id', $id)->delete();
            foreach ($request->tags as $tag) {
                $post_tag = new Post; //Add new tag                    
                $post_tag->post_id = $news->id;
                $post_tag->tag_id = $tag;
                $post_tag->save();
            }
        } catch(\exception $e){
            die($e->getMessage());
        }
        Session::flash('warning', 'The content was successfully save!');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        Session::flash('delete', 'The post was successfully deleted.');
        return redirect()->route('news.index');
    }
}
