<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequirements extends Model
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_requirements';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['userreq_id', 'reqtype_id', 'no_of_req', 'skill_id', 'experience', 'start_date', 'salary', 'certtype_id', 'user_id', 'qualtype_id', 'created_at', 'updated_at'];

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
    protected $dates = ['start_date', 'created_at', 'updated_at'];
}
