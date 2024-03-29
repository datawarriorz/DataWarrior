<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';
    protected $primaryKey = 'project_id';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id', 'project_name', 'project_description', 'project_domain', 'project_price', 'project_link', 'project_image', 'creator_id', 'creator_flag', 'project_status', 'created_at', 'updated_at'];

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
