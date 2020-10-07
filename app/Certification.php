<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'certification';
    protected $primaryKey = 'cert_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cert_id', 'cert_title', 'cert_price', 'cert_description','cert_image','cert_provider','cert_domain','cert_validationperiod', 'cer_prerequisites', 'cert_status','creator_id','creator_flag', 'created_at', 'updated_at'];

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
