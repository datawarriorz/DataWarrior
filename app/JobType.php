<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model  
{

    protected $primaryKey = 'job_type_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_type';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['job_type_id', 'job_type', 'created_at', 'updated_at'];

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
