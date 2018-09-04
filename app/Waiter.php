<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Table;
use App\User;
use App\Facility;
class Waiter extends Model
{
    //

    public $fillable = ['user_id', 'table_number', 'employee_number','status', 'created_by','mod_by','mod_at'];

    public function url(){
      return $this->id ? 'meseros.update' : 'meseros.store';
    }

    public function method(){
      return $this->id ? 'PUT' : 'POST';
    }

    public function getTables(){
      return Table::pluck('table_number', 'id')->toArray();
    }

    public function getUsers(){
      return User::pluck('name', 'id')->toArray();
    }

    public function getWaiterId($userId){
      return Waiter::where('user_id',$userId)->pluck('id');
    }

    public function getTableId($userId){
      return Waiter::where('user_id',$userId)->pluck('table_number');
    }

    public function getFacilityId($tableId){
      return Table::where('id',$tableId)->pluck('id_facility');
    }
}
