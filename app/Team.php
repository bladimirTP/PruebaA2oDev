<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;
use App\Category;
use App\Origin;
        

    
class Team extends Model
{
  
    public $timestamps= false; 
    protected $table = "team";
    protected $primaryKey = 'id_team';
    protected $fillable = [
          'id_team',
          'name',
          
      ];

      public function person()
      {
          return $this->belongsToMany(Person::class, 'detail_team', 'fkid_team', 'fkid_person');
      }  
      public function category()
      {
          return $this->belongsTo(Category::class, 'fkid_category','id_category');
      }
      
      public function origin()
      {
          return $this->belongsTo(Origin::class, 'fkid_origin','id_origin');
      }
}
