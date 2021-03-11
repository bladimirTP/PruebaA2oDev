<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;
class Origin extends Model
{
    public $timestamps= false; 

    protected $primaryKey = 'id_origin';
    protected $table = 'origin';
    protected $fillable = [
          'id_origin',
          'city',
          'country',
          
      ];

      public function team(){
          return $this->hasMany(Team::class,'fkid_origin','id_origin');
      }
}
