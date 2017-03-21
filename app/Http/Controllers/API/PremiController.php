<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PremiController extends Controller
{
  public static function cekCharge($umur,$harga){
    $charge = 0;
    if($umur>5){
      $charge= (0.05 + (($umur-5)/100))*$harga;
      return $charge;
    }else {
      $charge=0;
      return $charge;
    }
  }

  public static function cekBasicRateTlo($jenis,$harga,$wilayah){
    $basicrate=0;
    if($jenis==1){
      if($wilayah==1){
        if($harga<=125000000){
          $basicrate = $harga * (0.47/100);
        }elseif ($harga> 125000000 && $harga<= 200000000) {
          $basicrate = $harga * (0.44/100);
        }elseif ($harga> 200000000 && $harga<= 400000000) {
          $basicrate = $harga * (0.29/100);
        }elseif ($harga > 400000000 && $harga<= 800000000) {
          $basicrate = $harga * (0.25/100);
        }elseif ($harga >800000000) {
          $basicrate = $harga * (0.20/100);
        }
      }
      if($wilayah==2){
        if($harga<=125000000){
          $basicrate = $harga * (0.65/100);
        }elseif ($harga> 125000000 && $harga<= 200000000) {
          $basicrate = $harga * (0.44/100);
        }elseif ($harga> 200000000 && $harga<= 400000000) {
          $basicrate = $harga * (0.29/100);
        }elseif ($harga > 400000000 && $harga<= 800000000) {
          $basicrate = $harga * (0.25/100);
        }elseif ($harga >800000000) {
          $basicrate = $harga * (0.20/100);
        }
      }
      if($wilayah==3){
        if($harga<=125000000){
          $basicrate = $harga * (0.36/100);
        }elseif ($harga> 125000000 && $harga<= 200000000) {
          $basicrate = $harga * (0.31/100);
        }elseif ($harga> 200000000 && $harga<= 400000000) {
          $basicrate = $harga * (0.29/100);
        }elseif ($harga > 400000000 && $harga<= 800000000) {
          $basicrate = $harga * (0.25/100);
        }elseif ($harga >800000000) {
          $basicrate = $harga * (0.20/100);
        }
      }
    }
    elseif ($jenis==2) {
      if($wilayah==1){
        $basicrate = $harga * (0.53/100);
      }elseif ($wilayah==2) {
        $basicrate = $harga * (1.05/100);
      }elseif ($wilayah==3) {
        $basicrate = $harga * (0.49/100);
      }
    }elseif ($jenis==3) {
      $basicrate = $harga * (0.18/100);
    }
    return $basicrate;
  }

  public static function cekBasicRateCompre($jenis,$harga,$wilayah){
    $basicrate=0;
    if($jenis==1){
      if($wilayah==1){
        if($harga<=125000000){
          $basicrate = $harga * (3.82/100);
          return $basicrate;
        }elseif ($harga> 125000000 && $harga<= 200000000) {
          $basicrate = $harga * (2.67/100);
          return $basicrate;
        }elseif ($harga> 200000000 && $harga<= 400000000) {
          $basicrate = $harga * (1.71/100);
          return $basicrate;
        }elseif ($harga > 400000000 && $harga<= 800000000) {
          $basicrate = $harga * (1.20/100);
          return $basicrate;
        }elseif ($harga >800000000) {
          $basicrate = $harga * (1.05/100);
          return $basicrate;
        }
      }
      if($wilayah==2){
        if($harga<=125000000){
          $basicrate = $harga * (3.44/100);
          return $basicrate;
        }elseif ($harga> 125000000 && $harga<= 200000000) {
          $basicrate = $harga * (2.47/100);
          return $basicrate;
        }elseif ($harga> 200000000 && $harga<= 400000000) {
          $basicrate = $harga * (1.71/100);
          return $basicrate;
        }elseif ($harga > 400000000 && $harga<= 800000000) {
          $basicrate = $harga * (1.20/100);
          return $basicrate;
        }elseif ($harga >800000000) {
          $basicrate = $harga * (1.05/100);
          return $basicrate;
        }
      }
      if($wilayah==3){
        if($harga<=125000000){
          $basicrate = $harga * (2.53/100);
          return $basicrate;
        }elseif ($harga> 125000000 && $harga<= 200000000) {
          $basicrate = $harga * (2.07/100);
          return $basicrate;
        }elseif ($harga> 200000000 && $harga<= 400000000) {
          $basicrate = $harga * (1.40/100);
          return $basicrate;
        }elseif ($harga > 400000000 && $harga<= 800000000) {
          $basicrate = $harga * (1.20/100);
          return $basicrate;
        }elseif ($harga >800000000) {
          $basicrate = $harga * (1.05/100);
          return $basicrate;
        }
      }
    }
    elseif ($jenis==2) {
      $basicrate = $harga * (1.33/100);
      return $basicrate;
    }elseif ($jenis==3) {
      $basicrate = $harga * (0.71/100);
      return $basicrate;
    }
  }

  public static function hitungTpl($up){
    $tpl;
    if($up<=25000000){
      $tpl = (1.50/100) * $up;
    }elseif ($up>25000000 && $up<=50000000) {
      $tpl = (1.125/100) * $up;
    }elseif ($up>5000000 && $up<=100000000) {
      $tpl = (0.75/100) * $up;
    }
    return $tpl;
  }

  public function hitungTlo(Request $request){
    $harga = $request->input('harga');
    $wilayah = $request->input('wilayah');
    $jenis = $request->input('jenis');
    $umur = $request->input('umur');
    $up = $request->input('up');
    //7500000
    //PremiController::cekBasicRate($jenis,$harga,$wilayah);
    return response()->json([
      'harga' => $harga,
      'basicrate' => (int)PremiController::cekBasicRateTlo($jenis,$harga,$wilayah),
      'charge' =>  (int)PremiController::cekCharge($umur,$harga),
      'tpl' => (int)PremiController::hitungTpl($up),
      'rate' => (int)((int)PremiController::cekBasicRateTlo($jenis,$harga,$wilayah) + (int)PremiController::cekCharge($umur,$harga)),
    ]);
  }

  public function hitungCompre(Request $request){
    $harga = $request->input('harga');
    $wilayah = $request->input('wilayah');
    $jenis = $request->input('jenis');
    $umur = $request->input('umur');
    $up = $request->input('up');
    //7500000
    //PremiController::cekBasicRate($jenis,$harga,$wilayah);
    return response()->json([
      'harga' => $harga,
      'basicrate' => (int)PremiController::cekBasicRateCompre($jenis,$harga,$wilayah),
      'charge' => (int)PremiController::cekCharge($umur,$harga),
      'tpl' => (int)PremiController::hitungTpl($up),
      'rate' => (int)((int)PremiController::cekBasicRateCompre($jenis,$harga,$wilayah) + (int)PremiController::cekCharge($umur,$harga)),
    ]);
  }
}
