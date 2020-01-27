<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use DB;

class BestController extends Controller
{
    public function index()
    {
     
        $beststories = DB::table('stories')
        ->join('users', 'stories.user_id', 'users.id')
        ->where('type', 'Story')
        ->paginate(10);

    //    return $stories;

        return view('beststory.index')->with('beststories', $beststories);
    }
}
