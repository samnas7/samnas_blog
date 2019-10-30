<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    //
    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
