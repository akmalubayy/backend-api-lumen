<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbl_user';
    protected $fillable = [
        'id','username', 'email','password','api_key',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *  
     * @var array
     */
    protected $hidden = [
        'password','api_key'
    ];
}
