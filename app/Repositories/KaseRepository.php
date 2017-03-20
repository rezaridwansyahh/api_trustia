<?php

namespace App\Repositories;

use App\Models\Kase;
use InfyOm\Generator\Common\BaseRepository;

class KaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal_case',
        'no_polisi',
        'no_mesin',
        'no_rangka',
        'merek_id',
        'tipedetil',
        'tahun_anggaran',
        'warna',
        'status',
        'agent_id',
        'wilayah_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kase::class;
    }

    public static function cekselfcase($id){
        $kase = Kase::where('agent_id', $id)->get();
        return $kase;
    }
}
