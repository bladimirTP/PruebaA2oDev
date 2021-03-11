<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Game;
use App\Detail_league;
use DB;

class GameController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $game = Game::with('league')->orderBy('id_game', 'desc')->get();
        return $this->showAll($game);

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
        $game = new Game();
        $game->spot = $request->get('spot');
        $game->date = $request->get('date');
        $game->level = $request->get('level');
        $game->state = $request->get('state');
        $game->fkid_league = $request->get('id_league');
        $game->save();

        $team = $request->get('team');
        foreach ($team as $tem) {
            $detail_game = new Detail_league();
            $detail_game->fkid_game = $game->id_game;
            $detail_game->fkid_team = $tem['id_team'];
            $detail_game->status = $tem['status'];
            $detail_game->save();
        }
        DB::commit();
        return $this->showOne($game);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
