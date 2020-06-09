<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = 'tbl_keyword';
    protected $fillable = ['user_id','keyword','status'];
}