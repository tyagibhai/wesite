<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const UPDATED_AT = null;
    const CREATED_AT = 'comment_date';
    protected $table = "wp_comments";
    protected $primaryKey = 'comment_ID'; // or null
    
    protected $fillable = [
        'comment_post_ID', 'comment_author', 'comment_author_email',
        'comment_author_url','comment_author_IP','comment_date','comment_date_gmt',
        'comment_content','comment_karma','comment_approved','comment_agent','comment_parent','user_id'
    ];
    // default attributes 
    protected $attributes = [
        
    ];

    //get all coments
    public static function getComments($slug = null, $offset = 0, $limit = 5){
        //offset
        $from = $offset*5;
        $articles = 
        DB::table('wp_posts AS p')
            ->select('p.ID','c.comment_ID','c.comment_author','c.comment_author_email','c.comment_date','c.comment_date_gmt','c.comment_content')
            ->leftJoin('wp_comments AS c', function ($join){
                $join->on('p.ID', '=', 'c.comment_post_ID');        
            })
            ->where('p.post_name','=',$slug)
            ->where('c.comment_approved','=',"1")
            ->orderBy('c.comment_date', 'desc')
            ->limit($limit)
            ->offset($from)
            ->get()
            ->toArray();
        return json_decode(json_encode($articles), true);
    }
    //other function
    public static function count($slug = null){
        $count = 
        DB::table('wp_posts AS p')
            ->select('p.ID','c.comment_ID')
            ->leftJoin('wp_comments AS c', function ($join){
                $join->on('p.ID', '=', 'c.comment_post_ID');        
            })
            ->where('p.post_name','=',$slug)
            ->where('c.comment_approved','=',"1")
            ->count();
        
            return $count;
    }

}
