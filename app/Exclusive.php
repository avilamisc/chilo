<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ExclusiveType;
use App\ExAmountType;

class Exclusive extends Model
{
    //
    public $fillable = ['name', 'category', 'description','status','start','end','amount','amount_type','availability', 'created_by','mod_by','mod_at'];

    public function url(){
      return $this->id ? 'exclusivos.update' : 'exclusivos.store';
    }

    public function method(){
      return $this->id ? 'PUT' : 'POST';
    }

    public function exTypes()
    {
      return ExclusiveType::pluck('name', 'id')->toArray();
    }

    public function exaTypes()
    {
      return ExAmountType::pluck('name', 'id')->toArray();
    }

}
