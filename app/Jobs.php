<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['job_id', 'job_title', 'job_description', 'job_status', 'job_company', 'job_domain', 'job_shift', 'job_location', 'job_designation', 'job_type_id', 'job_skills_required', 'job_duration', 'job_salary', 'job_starttime', 'job_apply_by', 'job_openings', 'creator_id', 'creator_flag', 'created_at', 'updated_at'];

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
    protected $dates = ['job_apply_by', 'created_at', 'updated_at'];

}
