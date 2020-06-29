<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQualification extends Model
{
    
    protected $table = 'user_qualifications';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','user_id','qualtype_id ','course_name', 'college_name','University','start_date','end_date','percentage','grade','created_at','updated_at', 	
    ];

    protected $dates = ['start_date','end_date','created_at','updated_at'];
}
