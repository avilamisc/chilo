<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $fillable = ['poll_id', 'name', 'email','birthdate','ticket'];

}
