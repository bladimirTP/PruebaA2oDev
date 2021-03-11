<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Team;

class TeanShowController extends ApiController
{
    public function show($id)
    {
        try {
            $detail = Team::find($id);
            return $this->showOne($detail);
          //return response()->json(['data'=>$detail]);
        } catch (\Throwable $th) {
            return response()->json(['data'=>$th]);
        }
    }
}
