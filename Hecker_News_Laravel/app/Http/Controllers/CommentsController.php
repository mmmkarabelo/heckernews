<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Story;
use App\User;
use DB;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = DB::table('comments')
        ->join('users', 'comments.user_id', 'users.id')
        ->paginate(10);

       
     return view('comments.index')->with('comments', $comments);

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

     public function newsUpdate()
     {
        $jsonString = file_get_contents(base_path('resources/news.json'));

        $news = json_decode($jsonString, True);
 
        
    
 
        //return view('comments.index')->with('news', $news);
        
        //var_dump($news['title']);
 
        $comment = new Comment();
 
        foreach ( $news as $item)
         {
             // var_dump($item['title']);
             // var_dump($item['type']);
 
             
             //$comment->user_id           = auth()->user()->id;
             $comment->comment_by        = $item['by'];
             $comment->text              = $item['text'];
             $comment->type              = $item['type'];
             $comment->comment_parent    = $item['parent'];
             $comment->commentable_id    = $item['parent'];
             $comment->commentable_type  = $item['type'];
           
         
            
             $comment->save();

             
     
         }
 
         return redirect('/v0/comments')->with('success', 'Story Comment updated');
     }


    public function store(Request $request)
    {
       //
       $this->validate($request, [
        'title' => 'required',
        'body' => 'required',
        'type' => 'required'
    ]);
    
    $comment = new Comment;
    $comment->title = $request->input('title');
    $comment->text = $request->input('body');
    $comment->url = $request->input('url');
    $story->user_id = auth()->user()->id;
    $comment->type = $request->input('type');

    $comment->save();

    return redirect('/v0/comments')->with('success', 'Comment Created');
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
        $comment =  Comment::find($id);
        return view('comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
