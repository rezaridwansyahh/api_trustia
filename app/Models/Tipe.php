<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tipe
 * @package App\Models
 * @version March 3, 2017, 12:23 pm UTC
 */
class Tipe extends Model
{
    use SoftDeletes;

    public $table = 'tipes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_tipe',
        'jenis',
        'merek_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_tipe' => 'string',
        'jenis' => 'string',
        'merek_id' => 'integer'
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
    public function merek()
    {
        return $this->belongsTo(\App\Models\Merek::class, 'merek_id', 'id');
    }
}
