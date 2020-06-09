<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';
    protected $fillable = ['activity','description']; //nama table yang sudah dibuat lewat migration tadi adalah todo
}