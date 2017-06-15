<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['user_id', 'post_id', 'comment_id', 'body'];


    public function comment()
    {
    	return $this->belongsTo(Comment::class);
    }
}
