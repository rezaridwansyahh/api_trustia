<?php

namespace App\Repositories;

use App\Models\Merek;
use InfyOm\Generator\Common\BaseRepository;

class MerekRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_merek'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Merek::class;
    }
}
