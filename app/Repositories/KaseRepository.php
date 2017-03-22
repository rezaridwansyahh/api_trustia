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

    public static function cekAgentSubmit($id){
      $kase = Kase::where('agent_id', $id)->where('status',"1")->get();
      return $kase;
    }

    public static function cekAgentOutStanding($id){
      $kase = Kase::where('agent_id', $id)->where('status',"2")->get();
      return $kase;
    }

    public static function cekAgentPending($id){
      $kase = Kase::where('agent_id', $id)->where('status',"3")->get();
      return $kase;
    }

    public static function cekAgentApprove($id){
      $kase = Kase::where('agent_id', $id)->where('status',"4")->get();
      return $kase;
    }

    public static function cekAgentDecline($id){
      $kase = Kase::where('agent_id', $id)->where('status',"5")->get();
      return $kase;
    }

    public static function submit(){
        $kase = Kase::where('status', "1")->get();
        return $kase;
    }

    public static function outstanding(){
        $kase = Kase::where('status', "2")->get();
        return $kase;
    }

    public static function pending(){
        $kase = Kase::where('status', "3")->get();
        return $kase;
    }

    public static function approve(){
        $kase = Kase::where('status', "4")->get();
        return $kase;
    }

    public static function decline(){
        $kase = Kase::where('status', "5")->get();
        return $kase;
    }



}
