<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CaseDetail",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Kase_id",
 *          description="Kase_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="foto_ktp",
 *          description="foto_ktp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="foto_stnk",
 *          description="foto_stnk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="foto_mobil",
 *          description="foto_mobil",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sisi1",
 *          description="sisi1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sisi2",
 *          description="sisi2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sisi3",
 *          description="sisi3",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sisi4",
 *          description="sisi4",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="foto_dashboard",
 *          description="foto_dashboard",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="foto_sim",
 *          description="foto_sim",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class CaseDetail extends Model
{
    use SoftDeletes;

    public $table = 'case_details';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Kase_id',
        'foto_ktp',
        'foto_stnk',
        'foto_mobil',
        'sisi1',
        'sisi2',
        'sisi3',
        'sisi4',
        'foto_dashboard',
        'foto_sim'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Kase_id' => 'integer',
        'foto_ktp' => 'string',
        'foto_stnk' => 'string',
        'foto_mobil' => 'string',
        'sisi1' => 'string',
        'sisi2' => 'string',
        'sisi3' => 'string',
        'sisi4' => 'string',
        'foto_dashboard' => 'string',
        'foto_sim' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
