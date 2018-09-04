<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Facility;

class Table extends Model
{
    //
    public $fillable = ['capacity', 'table_number', 'location','id_facility', 'status', 'created_by','mod_by','mod_at'];

    public function url(){
      return $this->id ? 'mesas.update' : 'mesas.store';
    }

    public function method(){
      return $this->id ? 'PUT' : 'POST';
    }

    public function getFacilities(){
      return Facility::pluck('name', 'id')->toArray();
    }
}
