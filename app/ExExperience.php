<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExExperience extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ex_experience';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['exp_id', 'exp_profile', 'exp_organisation', 'exp_location', 'exp_description', 'exp_currentjob', 'exp_startdate', 'exp_enddate', 'ex_id', 'created_at', 'updated_at'];

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
    protected $dates = ['exp_startdate', 'exp_enddate', 'created_at', 'updated_at'];

}
