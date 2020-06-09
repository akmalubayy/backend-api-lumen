<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentiment extends Model
{
    protected $table = 'tbl_sentiment';
    protected $fillable = ['sentiment','jumlah']; //nama table yang sudah dibuat lewat migration tadi adalah todo
}