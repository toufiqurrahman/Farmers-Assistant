<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->belongsToMany(Reply::class, 'reply');
    }
}
