<?php

namespace App\Repositories;

use App\Models\Agency;
use InfyOm\Generator\Common\BaseRepository;

class AgencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_agency',
        'alamat',
        'email',
        'no_telpon',
        'pic',
        'status',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agency::class;
    }
}
