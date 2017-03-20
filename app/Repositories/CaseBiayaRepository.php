<?php

namespace App\Repositories;

use App\Models\CaseBiaya;
use InfyOm\Generator\Common\BaseRepository;

class CaseBiayaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kase_id',
        'customer_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CaseBiaya::class;
    }
}
