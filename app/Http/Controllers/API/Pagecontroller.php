<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nopol as Nopol;
class Pagecontroller extends Controller
{
    public function showplat($no){
      $nopol = Nopol::where('no_polisi', $no)->first();
      return $nopol;
    }
}
