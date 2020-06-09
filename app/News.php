<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'tbl_news';
    protected $fillable = ['site_full','site_section','site_type','site_country','title_full','text','kategori','presensi','sentiment']; //nama table yang sudah dibuat lewat migration tadi adalah todo
}