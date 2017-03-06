<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wilayah
 * @package App\Models
 * @version March 3, 2017, 12:32 pm UTC
 */
class Wilayah extends Model
{
    use SoftDeletes;

    public $table = 'wilayahs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_wilayah',
        'cakupan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_wilayah' => 'string',
        'cakupan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
