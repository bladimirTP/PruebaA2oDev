<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Game;
class League extends Model
{
    public $timestamps= false; 
    protected $table = "league";
    protected $primaryKey = 'id_league';
    protected $fillable = [
          'id_league',
          'season', //temporada
          'description',
          
      ];

      public function game(){
          return $this->hasMany(Game::class,'fkid_league','id_league');
      }
   
}
