<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Nopol
 * @package App\Models
 * @version March 3, 2017, 12:35 pm UTC
 */
class Nopol extends Model
{
    use SoftDeletes;

    public $table = 'nopols';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'no_polisi',
        'wilayah_id',
        'daerah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no_polisi' => 'string',
        'wilayah_id' => 'integer',
        'daerah' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function wilayah()
    {
        return $this->belongsTo(\App\Models\Wilayah::class, 'wilayah_id', 'id');
    }
}
