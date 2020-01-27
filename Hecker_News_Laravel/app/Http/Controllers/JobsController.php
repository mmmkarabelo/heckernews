<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use DB;

class JobsController extends Controller
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
       
        // $jobs = job::orderBy('created_at','asc')->paginate(10);
        // return view('jobs.index')->with('jobs', $jobs);



        $jobs = DB::table('jobs')
        ->join('users', 'jobs.user_id', 'users.id')
        ->where('type', 'Job')
        ->paginate(10);

    //    return $jobs;

        return view('jobs.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jobs.create');
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
        
        $job = new Job;
        $job->title = $request->input('title');
        $job->text = $request->input('body');
        $job->descendants = $request->input('descendants');
        $job->score = $request->input('score');
        $job->url = $request->input('url');
        $job->user_id = auth()->user()->id;
        $job->save();

        return redirect('/v0/jobs')->with('success', 'job Comment Created');
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
        $job =  Job::find($id);
        return view('jobs.show')->with('job', $job);
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
        $job =  Job::find($id);

        //check for correct user
        if(auth()-> user()->id !== $job ->user_id)
        {
            return redirect('/v0/jobs')->with('error', 'Unauthorized Page');
        }
        return view('jobs.edit')->with('job', $job);
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
        
        $job = Job::find($id);
        $job->title = $request->input('title');
        $job->text = $request->input('body');
        $job->save();

        return redirect('/v0/jobs')->with('success', 'job Comment Updated');
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
        $job = Job::find($id);

        if(auth()-> user()->id !== $job ->user_id)
        {
            return redirect('/v0/jobs')->with('error', 'Unauthorized Page');
        }
        
        $job->delete();
        return redirect('/v0/jobs')->with('success', 'job Comment Removed');
    }
}
