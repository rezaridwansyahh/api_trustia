<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agent
 * @package App\Models
 * @version March 3, 2017, 1:05 pm UTC
 */
class Agent extends Model
{
    use SoftDeletes;

    public $table = 'agents';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_agent',
        'alamat',
        'email',
        'no_telepon',
        'user_id',
        'agency_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_agent' => 'string',
        'alamat' => 'string',
        'email' => 'string',
        'no_telepon' => 'string',
        'user_id' => 'integer',
        'agency_id' => 'integer'
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
    public function users()
    {
        return $this->hasOne(\App\Models\Users::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function agency()
    {
        return $this->belongsTo(\App\Models\Agency::class, 'agency_id', 'id');
    }
}
