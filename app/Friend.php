<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'status'];
}
