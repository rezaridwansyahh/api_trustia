<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agency
 * @package App\Models
 * @version March 3, 2017, 1:00 pm UTC
 */
class Agency extends Model
{
    use SoftDeletes;

    public $table = 'agencies';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_agency',
        'alamat',
        'email',
        'no_telpon',
        'pic',
        'status',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_agency' => 'string',
        'alamat' => 'string',
        'email' => 'string',
        'no_telpon' => 'string',
        'pic' => 'string',
        'status' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function user()
    {
        //return $this->hasOne(\App\Models\User::class, 'user_id', 'id');
        return $this->belongsTo('App\User');
    }
}
