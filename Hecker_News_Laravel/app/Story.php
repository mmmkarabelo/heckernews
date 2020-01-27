<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    
    protected $guarded=[];
    //Table name
    protected $table = 'stories';

    //Primary key
    public $primaryKey = 'story_id';

    public $timestamps = true;


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
       return $this->morphOne('App\Comment');
    }

}
