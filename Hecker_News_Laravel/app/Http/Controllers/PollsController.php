<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;
use DB;

class PollsController extends Controller
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
       
        // $polls = poll::orderBy('created_at','asc')->paginate(10);
        // return view('polls.index')->with('polls', $polls);



        $polls = DB::table('polls')
        ->join('users', 'polls.user_id', 'users.id')
        ->where('type', 'poll')
        ->paginate(10);

    //    return $polls;

        return view('polls.index')->with('polls', $polls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('polls.create');
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
        
        $poll = new Poll;
        $poll->title = $request->input('title');
        $poll->text = $request->input('body');
        $poll->descendants = $request->input('descendants');
        $poll->score = $request->input('score');
        $poll->url = $request->input('url');
        $poll->user_id = auth()->user()->id;
        $poll->save();

        return redirect('/v0/polls')->with('success', 'poll Comment Created');
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
        $poll =  Poll::find($id);
        return view('polls.show')->with('poll', $poll);
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
        $poll =  Poll::find($id);

        //check for correct user
        if(auth()-> user()->id !== $poll ->user_id)
        {
            return redirect('/v0/polls')->with('error', 'Unauthorized Page');
        }
        return view('polls.edit')->with('poll', $poll);
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
        
        $poll = Poll::find($id);
        $poll->title = $request->input('title');
        $poll->text = $request->input('body');
        $poll->save();

        return redirect('/v0/polls')->with('success', 'poll Comment Updated');
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
        $poll = Poll::find($id);

        if(auth()-> user()->id !== $poll ->user_id)
        {
            return redirect('/v0/polls')->with('error', 'Unauthorized Page');
        }
        
        $poll->delete();
        return redirect('/v0/polls')->with('success', 'poll Comment Removed');
    }
}
