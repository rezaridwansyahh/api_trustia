<?php

namespace App\Repositories;

use App\Models\Nopol;
use InfyOm\Generator\Common\BaseRepository;

class NopolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_polisi',
        'wilayah_id',
        'daerah'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nopol::class;
    }

    public static function cekplat($no){
        $nopol = Nopol::where('no_polisi', $no)->first();
        return $nopol;
    }
}
