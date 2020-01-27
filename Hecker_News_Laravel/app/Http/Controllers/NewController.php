<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use DB;

class NewController extends Controller
{
    public function index()
    {
        $newstories = DB::table('stories')
        ->join('users', 'stories.user_id', 'users.id')
        ->where('type', 'Story')
        ->paginate(10);

    //    return $stories;

        return view('newstories.index')->with('newstories', $newstories);
    }
}
