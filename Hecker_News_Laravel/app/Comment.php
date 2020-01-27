<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $guarded =[];

    public $primaryKey = 'comment_id';

    public function commentable()
    {
        return $this->morphTo();
    } 
}
