<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;
use App\Person;
class Detail_team extends Model
{
    public $timestamps= false; 
    protected $table = "detail_team";
    protected $primaryKey = 'id_detail';
    protected $fillable = [
        'id_detail',
        'fkid_team',
        'fkid_person',
        
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'fkid_team','id_team');
    }
  
    public function person()
    {
        return $this->belongsTo(Person::class, 'fkid_person','id_person');
    }
}
