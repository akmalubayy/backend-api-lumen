<?php

//namespace selalu di atas perhatikan
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
        $data = News::all();
        return response()->json($data);
    }

    public function show($id){
        $data = News::find($id);
        return response()->json($data);
    }

    public function store (Request $request){
        $data = new News();
        $data->site_full = $request->input('site_full');
        $data->site_section = $request->input('site_section');
        $data->site_type = $request->input('site_type');
        $data->site_country = $request->input('site_country');
        $data->title_full = $request->input('title_full');
        $data->text = $request->input('text');
        $data->kategori = $request->input('kategori');
        $data->presensi = $request->input('presensi');
        $data->sentiment = $request->input('sentiment');
        $data->save();

        return response()->json(['message' => 'News Berhasil Ditambah']);
    }

    public function getTotalNewsBySite(Request $request){
        $qry="SELECT trim(REPLACE(REPLACE(REPLACE(site_full ,'.',' '),'com',''),'www','')) site_full_vw, site_full,count(*) total from tbl_news where keyword_id=".$request['keyword']." GROUP BY site_full";
        $data= DB::select($qry);
        return response()->json($data);
    }

       public function getTotalNewsByKeyword(Request $request){
        $qry="SELECT keyword,sum(1) total  from tbl_news left join tbl_keyword on tbl_news.keyword_id = tbl_keyword.id where tbl_news.keyword_id = ".$request['keyword']."
                group by keyword_id,keyword";
        $datatotalnews= DB::select($qry);

        $qry="SELECT count(1) total_site from (SELECT site_full from tbl_news where keyword_id='".$request['keyword']."' GROUP BY site_full) a";
        $datatotalnewspersite= DB::select($qry);
        
        $qry="SELECT keyword,sum(1) total_post_negative  from tbl_news left join tbl_keyword on tbl_news.keyword_id = tbl_keyword.id
        where tbl_news.keyword_id = '".$request['keyword']."' and sentiment = 'Negative' group by keyword_id,keyword";
        $datatotalnegative= DB::select($qry);

        $qry="SELECT keyword,sum(1) total_post_positive  from tbl_news left join tbl_keyword on tbl_news.keyword_id = tbl_keyword.id
        where tbl_news.keyword_id = '".$request['keyword']."' and sentiment = 'Positive' group by keyword_id,keyword";
        $datatotalpositive= DB::select($qry);

        $qry="SELECT keyword,sum(1) total_post_netral  from tbl_news left join tbl_keyword on tbl_news.keyword_id = tbl_keyword.id
        where tbl_news.keyword_id = '".$request['keyword']."' and sentiment = 'Netral' group by keyword_id,keyword";
        $datatotalnetral= DB::select($qry);

        $alldata=array('total_news' => $datatotalnews[0],
                        'total_news_persite'=> $datatotalnewspersite[0],
                        'total_news_negative'=> $datatotalnegative[0], 
                        'total_news_positive'=> $datatotalpositive[0],
                        'total_news_netral'=> $datatotalnetral[0]);
        return response()->json($alldata);
    }

    // public function getKontenBySite(Request, $request){
    //     $qry="SELECT trim(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(site_full ,'.',' '),'com',''),'www',''),'20',''),'aceh',''),'ambon',''),'bali',''),'banten',''),'jateng',''),'jogja',''),'jabar',''),'jatim',''),'lampung',''),'makassar',''),'manado',''),'nasional',''),'sport',''),'finance',''),'bangka',''),'batam',''),'finance',''),'finance',''),'finance',''),'finance',''),'finance',''),'finance',''),'finance',''),'finance',''),'finance',''),'finance',''),'celebrity',''),'daerah',''),'economy',''),'ekbis',''),'gorontalo',''),'health',''),'inter',''),'national',''),'co',''),'id',''),'kaltim',''),'lifestyle',''),'medan',''),'megapolitan',''),'metro',''),'money',''),'news',''),'papua',''),'pekanbaru',''),'sains',''),'sulteng',''),'sultra',''),'sumbar',''),'surabaya',''),'tekno',''),'travel',''),'wartakota',''),'wolipop','')) site_full_vw, site_full,count(*) total from tbl_news where keyword_id= ".$request['keyword']." GROUP BY site_full";
    //     $datasitetotal= DB::select($qry);

    //     // $alldata=array('site_list' => $datasitetotal[0];

    //         return response()->json($datasitetotal);
    // }

    // public function getKontenByDate(Request, $request){
    //     $qry="select date(created_at),sum(1) total_negative from tbl_news where 
    //     keyword_id = '".$request['keyword']."' and sentiment = 'Negative' GROUP BY date(created_at)";
    //     $datanegativebydate= DB::select($qry);

    //     $qry="select date(created_at),sum(1) total_positive from tbl_news where 
    //     keyword_id = '".$request['keyword']."' and sentiment = 'Positive' GROUP BY date(created_at)";
    //     $datapositivebydate= DB::select($qry);

    //     $alldata=array('data_negative' => $datanegativebydate[0],
    //                     'data_negative'=> $datapositivebydate[0]);
    //     return response()->json($alldata);
    // }

}
