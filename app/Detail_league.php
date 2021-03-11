<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;
use App\Game;
class Detail_league extends Model
{
    public $timestamps= false; 
    protected $table = "detail_league";
    protected $primaryKey = 'id_detail';
    protected $fillable = [
        'id_detail',
        'fkid_team',
        'fkid_game',
        'result',
     
        
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'fkid_team','id_team');
    }
  
    public function game()
    {
        return $this->belongsTo(Game::class, 'fkid_game','id_game');
    }

}
