<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Kase",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_case",
 *          description="tanggal_case",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="no_polisi",
 *          description="no_polisi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_mesin",
 *          description="no_mesin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_rangka",
 *          description="no_rangka",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="merek_id",
 *          description="merek_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tahun_anggaran",
 *          description="tahun_anggaran",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="warna",
 *          description="warna",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="agent_id",
 *          description="agent_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="wilayah_id",
 *          description="wilayah_id",
 *          type="integer",
 *          format="int32"
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
class Kase extends Model
{
    use SoftDeletes;

    public $table = 'kases';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tanggal_case',
        'no_polisi',
        'no_mesin',
        'no_rangka',
        'merek_id',
        'tahun_anggaran',
        'warna',
        'status',
        'agent_id',
        'wilayah_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_case' => 'date',
        'no_polisi' => 'string',
        'no_mesin' => 'string',
        'no_rangka' => 'string',
        'merek_id' => 'integer',
        'tahun_anggaran' => 'string',
        'warna' => 'string',
        'status' => 'string',
        'agent_id' => 'integer',
        'wilayah_id' => 'integer'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function agent()
    {
        return $this->belongsTo(\App\Models\Agent::class, 'agent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function wilayah()
    {
        return $this->belongsTo(\App\Models\Wilayah::class, 'wilayah_id', 'id');
    }
}
