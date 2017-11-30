<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = 'interest';

    public function users(){
        return $this-> belongsToMany(User::class, 'interest_user');
    }
}
