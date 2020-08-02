<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Expert extends Authenticatable
{
    //
    use Notifiable;
    protected $primaryKey = 'ex_id';
    // The authentication guard for admin
    protected $guard = 'expert';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ex_id','ex_firstname','ex_lastname','ex_dateofbirth','ex_aboutme','ex_description','email', 'password','ex_contactcode',
        'ex_contactno'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
