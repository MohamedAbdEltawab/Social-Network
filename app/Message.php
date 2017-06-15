<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_from', 'user_to', 'conversation_id', 'message'];


   
}
