<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FacilityType;

class Facility extends Model
{
    //
    public $fillable = ['name', 'status', 'type','address','created_by','mod_by','mod_at'];

    public function url(){
      return $this->id ? 'sucursales.update' : 'sucursales.store';
    }

    public function method(){
      return $this->id ? 'PUT' : 'POST';
    }

    public function fTypes()
    {
      return FacilityType::pluck('name', 'id')->toArray();
    }
}
