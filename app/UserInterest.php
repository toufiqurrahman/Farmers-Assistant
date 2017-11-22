<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserInterest extends Pivot
{
    protected $table = 'interest_user';

//    protected $fillable = [
//        'name', 'email', 'phone', 'interests[]',
//    ];

}
