<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;

class Category extends Model
{
   // use SoftDeletes;

    public $timestamps= false; 
    protected $table = "category";
    protected $primaryKey = 'id_category';
    protected $fillable = [
          'id_category',
          'name',    
      ];
 
  //protected $hidden = ['updated_at', 'deleted_at'];
    public function team(){
        return $this->hasMany(Team::class,'fkid_category','id_category');
    }
}
