<?php

namespace App\Repositories;

use App\Models\Tipe;
use InfyOm\Generator\Common\BaseRepository;

class TipeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_tipe',
        'jenis',
        'merek_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tipe::class;
    }
}
