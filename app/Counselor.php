<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'counselor';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['co_id', 'co_firstname', 'co_lastname', 'email', 'password',
     'created_at', 'updated_at'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
