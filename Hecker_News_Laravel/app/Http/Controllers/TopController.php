<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use DB;

class TopController extends Controller
{
    
    public function index()
    {
       
        $topstories = DB::table('stories')
        ->take(50)
        ->join('users', 'stories.user_id', 'users.id')
        ->where('type', 'Story')
        ->paginate(10);

    //    return $stories;

        return view('topstory.index')->with('topstories', $topstories);
    }
}
