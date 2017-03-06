<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Merek
 * @package App\Models
 * @version March 3, 2017, 10:45 am UTC
 */
class Merek extends Model
{
    use SoftDeletes;

    public $table = 'mereks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_merek'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_merek' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
