<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User as User;
use App\Models\Agency as Agency;
use App\Models\Agent as Agent;
use App\Http\Controllers\AppBaseController;

class Register extends AppBaseController
{
    public function storeagency(Request $request){
      $input = $request->all();
      $input['password'] = bcrypt($input['password']);
      $user = User::create($input);
      $agency = new Agency;
      $agency->nama_agency = $request->input('nama_agency');
      $agency->alamat = $request->input('alamat');
      $agency->no_telpon = $request->input('no_telpon');
      $agency->pic = $request->input('pic');
      $agency->status = $request->input('status');
      $agency->email = $request->input('email');
      $user->agency()->save($agency);
      return response()->json(['result'=>'sukses_memasukan_data_agency']);
      //return "data sukses di input";
    }

    public function storeagent(Request $request){
      //$uzer = new User;
      $user = new User;
      $user->email = $request->email;
      $user->password =  bcrypt($request->password);
      $user->name = $request->name;
      $user->status = $request->status;
      $user->save();
      //$input = $request->all();
      //return $input;
      // $input['password'] = bcrypt($input['password']);
      // $user = User::create($input);
      $agent = new Agent;
      $agent->nama_agent = $request->name;
      $agent->alamat = $request->alamat;
      $agent->email = $request->email;
      $agent->no_telepon = $request->no_telepon;
      $agent->agency_id = '1';
      $user->agent()->save($agent);
      return response()->json(['result'=>'sukses_memasukan_data_agent']);
    }
}
