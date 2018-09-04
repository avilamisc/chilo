<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function url(){
      return $this->id ? 'usuarios.update' : 'usuarios.store';
    }

    public function method(){
      return $this->id ? 'PUT' : 'POST';
    }

    public function getRoles(){
      return DB::table('role_user')->where('user_id', $this->id)->pluck('role_id');
    }

    public function getPermissionsRole($id){
      return DB::table('permission_role')->where('role_id', $id)->pluck('permission_id');
    }
}
