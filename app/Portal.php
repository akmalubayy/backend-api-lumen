<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    protected $table = 'tbl_portal';
    protected $fillable = ['portal','total']; //nama table yang sudah dibuat lewat migration tadi adalah todo
}