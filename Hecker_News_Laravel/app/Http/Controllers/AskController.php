<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ask;
use App\User;
use DB;


class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $asks = DB::table('comments')
        ->join('users', 'comments.user_id', 'users.id')
        ->where('type', 'Question')
        ->paginate(10);

       
     return view('asks.index')->with('asks', $asks);

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
 
        //return view('asks.index')->with('news', $news);
        
        //var_dump($news['title']);
 
        $ask = new Ask();
 
        foreach ( $news as $item)
         {
             // var_dump($item['title']);
             // var_dump($item['type']);
 
             
             //$ask->user_id           = auth()->user()->id;
             $ask->ask_by        = $item['by'];
             $ask->text          = $item['text'];
             $ask->type          = $item['type'];
             $ask->ask_parent    = $item['parent'];
             $ask->askable_id    = $item['parent'];
             $ask->askable_type  = $item['type'];
           
         
            
             $ask->save();

             
     
         }
 
         return redirect('/v0/asks')->with('success', 'Questions updated');
     }


    public function store(Request $request, $ask_id)
    {
        //
        $this->validate($request , array(
            'name' => 'required|max:255',
            'ask' => 'required|min:5|max:1800'
        ));

        $ask = Ask::find($ask_id);

        $ask =              new ask();
        $ask->user_id      = auth()->user()->id;
        $ask->ask_by   = $request->name;
        $ask->text         = $request->ask;
        $ask->approved     = true;

        $ask->associate($ask);

        $ask->save();

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
        $ask =  Ask::find($id);
        return view('asks.show')->with('ask', $ask);
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
