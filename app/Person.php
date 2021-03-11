<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;
class Person extends Model
{
    public $timestamps= false; 
    protected $primaryKey = 'id_person';
    protected $table = 'person';
    protected $fillable = [
          'id_person',
          'name',
          'surname',
          'date_birth',
          
      ];

      public function team()
      {
          return $this->belongsToMany(Team::class, 'detail_team', 'fkid_person', 'fkid_team');
      }
}
