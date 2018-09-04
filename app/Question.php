<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PQCategory;
use App\QControlType;
class Question extends Model
{
    //
    public $fillable = ['description', 'category', 'control','status', 'created_by','mod_by','mod_at'];

    public function url(){
      return $this->id ? 'preguntas.update' : 'preguntas.store';
    }

    public function method(){
      return $this->id ? 'PUT' : 'POST';
    }

    public function pqCategories()
    {
      return PQCategory::pluck('name', 'id')->toArray();
    }

    public function qcTypes()
    {
      return QControlType::pluck('name', 'id')->toArray();
    }
}
