<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobexperience extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobexperience';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['jobid', 'user_id', 'profile', 'oragnisation', 'location', 'startdate', 'enddate','description', 'currentjob', 'created_at', 'updated_at'];

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
    protected $dates = ['startdate', 'enddate', 'created_at', 'updated_at'];

}
