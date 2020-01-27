<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Comment;
use DB;

class StoryController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $stories = DB::table('stories')
        ->join('users', 'stories.user_id', 'users.id')
        ->where('type', 'Story')
        ->paginate(10);

    //    return $stories;

        return view('stories.index')->with('stories', $stories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $story = new Comment;
        $story->title = $request->input('title');
        $story->text = $request->input('body');
        $story->type = $request->input('type');
        $story->user_id = auth()->user()->id;
        $story->save();

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
        $story =  Story::find($id);
        return view('stories.show')->with('story', $story);
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
        $story =  Story::find($id);

        //check for correct user
        if(auth()-> user()->id !== $story ->user_id)
        {
            return redirect('/v0/stories')->with('error', 'Unauthorized Page');
        }
        return view('stories.edit')->with('story', $story);
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
         $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $story = Story::find($id);
        $story->title = $request->input('title');
        $story->text = $request->input('body');
        $story->save();

        return redirect('/v0/stories')->with('success', 'Story Comment Updated');
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
        $story = Story::find($id);

        if(auth()-> user()->id !== $story ->user_id)
        {
            return redirect('/v0/stories')->with('error', 'Unauthorized Page');
        }
        
        $story->delete();
        return redirect('/v0/stories')->with('success', 'Story Comment Removed');
    }
}
