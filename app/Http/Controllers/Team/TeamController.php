<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Message\MessageResponse;
use App\Exceptions\MessageException;
use App\Team;
use App\Detail_team;
use DB;

class TeamController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::with('category','origin')->orderBy('id_team', 'desc')->get();
        return $this->showAll($team);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            DB::beginTransaction();
            $team = new Team();
            $team->name = $request->get('name');
            $team->fkid_category = $request->get('fkid_category');
            $team->fkid_origin = $request->get('fkid_origin');
            $team->save();
            $person = $request->get('id_person');

            foreach ($person as $pers) {
                $detail_team = new Detail_team();
                $detail_team->fkid_team = $team->id_team;
                $detail_team->fkid_person = $pers['id_person'];
                $detail_team->save();
            }
            DB::commit();
            return $this->showOne($team);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $team = Team::with('category','origin')->where('id_team',$id)->orderBy('id_team', 'desc')->get();
            return response()->json(['data'=>$team]);
        } catch (\Throwable $th) {
            return response()->json(['data'=>$th]);
        }
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
