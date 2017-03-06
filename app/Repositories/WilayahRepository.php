<?php

namespace App\Repositories;

use App\Models\Wilayah;
use InfyOm\Generator\Common\BaseRepository;

class WilayahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_wilayah',
        'cakupan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Wilayah::class;
    }
}
