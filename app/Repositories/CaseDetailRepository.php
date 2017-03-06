<?php

namespace App\Repositories;

use App\Models\CaseDetail;
use InfyOm\Generator\Common\BaseRepository;

class CaseDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return CaseDetail::class;
    }
}
