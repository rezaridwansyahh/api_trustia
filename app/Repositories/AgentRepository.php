<?php

namespace App\Repositories;

use App\Models\Agent;
use InfyOm\Generator\Common\BaseRepository;

class AgentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_agent',
        'alamat',
        'email',
        'no_telepon',
        'user_id',
        'agency_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agent::class;
    }
}
