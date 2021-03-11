<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;
class Game extends Model
{
     
    public $timestamps= false; 
    protected $table = "game";
    protected $primaryKey = 'id_game';
    protected $fillable = [
          'id_game',
          'state', 
          'date',
          'spot',
          'level',
          'fkid_league'    
      ];

    public function team()
    {
        return $this->belongsToMany(Team::class, 'detail_league', 'fkid_game', 'fkid_team');
    }
    public function league()
    {
        return $this->belongsTo(League::class, 'fkid_league','id_league');
    }
   
}
