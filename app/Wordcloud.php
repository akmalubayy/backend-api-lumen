<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wordcloud extends Model
{
    protected $table = 'wordcount';
    protected $fillable = ['keyword_id','word','total']; //nama table yang sudah dibuat lewat migration tadi adalah todo
}