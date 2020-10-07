<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "wp_posts";

    //getting all parent categories
    public static function getAllCategoryAndTag($type ="category", $limit = 5){
    
        $data = DB::table('wp_terms')
                    ->join('wp_term_taxonomy', function ($join) use($type){
                        $join->on('wp_terms.term_id', '=', 'wp_term_taxonomy.term_taxonomy_id')
                        ->where('wp_term_taxonomy.parent', '=', 0);
                    })
                     ->where('taxonomy', '=', $type)
                    ->orderBy('count', 'desc')
                    ->limit($limit)
                    ->get();
        //returning the response
        return $data;  
    }
    //getting all posts [ for category]
    public static function getAllArticle($slug = null, $type = '1', $offset = 0, $limit = 12){

        $typeConfig = [ '1'=> 'category', '2'=> 'post_tag'];
        $type = $typeConfig[$type];
        //variable declearation
        $condition='whereNotIn';
        $subcategories = [];
        $from = $offset*10;
        //fetch all sub categories 
        if($slug){
            $slugs = explode(',' , $slug);
            //getting the all sub categories
            $subcategories = DB::table('wp_terms')
                                ->select('slug')
                                ->join('wp_term_taxonomy', function ($join) use($type, $slugs) {
                                    $join->on('wp_terms.term_id', '=', 'wp_term_taxonomy.term_id');
                                })
                                ->where('wp_term_taxonomy.taxonomy', '=', $type)
                                ->whereIn('wp_term_taxonomy.parent',function($query) use($type, $slugs){
                                    $query->select('term_id')->from('wp_terms')->whereIn('slug',$slugs);
                                })
                                ->get()
                                ->toArray();
            //returning all subcategories
            $subcategoriesArray =  array_map(function ($subCategory) {
                return $subCategory->slug;
            }, $subcategories );
            //appending parenet category as well
            array_push($subcategoriesArray,$slug);
            //adding category/subcategory filter
            $subcategories = $subcategoriesArray;
            $condition='whereIn';
        }
        //feteching the article list
        $articles = DB::table('wp_posts AS p')
                        ->select('p.ID', 'p.post_date','p.post_title','p.post_name','p.post_modified','p.post_excerpt','m2.meta_value','u.user_nicename', 'u.display_name', 'u.user_email', 't.name as terms_name')
                        ->leftJoin('wp_postmeta AS m1', function ($join){
                            $join->on('m1.post_id', '=', 'p.ID');        
                        })
                        ->leftJoin('wp_postmeta AS m2', function ($join){
                            $join->on('m1.meta_value', '=', 'm2.post_id');        
                        })
                        ->leftJoin('wp_term_relationships AS rel', function ($join){
                            $join->on('rel.object_id', '=', 'p.ID');        
                        })
                        ->leftJoin('wp_term_taxonomy AS tax', function ($join){
                            $join->on('tax.term_taxonomy_id', '=', 'rel.term_taxonomy_id');        
                        })
                        ->leftJoin('wp_terms AS t', function ($join){
                            $join->on('t.term_id', '=', 'tax.term_id');        
                        })
                        ->leftJoin('wp_users AS u', function ($join){
                            $join->on('u.id', '=', 'p.post_author');        
                        })
                        ->whereNotNull('m1.meta_value')
                        ->where('m1.meta_key','=','_thumbnail_id')
                        ->whereNotNull('m2.meta_value')
                        ->where('m2.meta_key','=','_wp_attached_file')
                        ->where('tax.taxonomy','=',$type)
                        ->where('p.post_status','=','publish')
                        ->where('p.post_type','=','post')
                        ->{$condition}('t.slug',$subcategories)
                        ->orderBy('p.post_date', 'desc')
                        ->limit($limit)
                        ->offset($from)
                        ->get()
                        ->toArray();

        return formatArticleList($articles);
    }
    //getting article categories and tags
    public static function getPostTagsAndCategories($slug = 'oh,no'){
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        $data = DB::table('wp_posts as p')
                    ->select('p.post_name','p.post_title','post_date','tax.taxonomy as type','t.name','t.slug','u.user_nicename', 'u.display_name')
                    ->leftJoin('wp_term_relationships AS rel', function ($join){
                        $join->on('id', '=', 'object_id');        
                    })
                    ->join('wp_term_taxonomy AS tax', function ($join){
                        $join->on('tax.term_taxonomy_id', '=', 'rel.term_taxonomy_id');        
                    })
                    ->join('wp_terms as t', function ($join){
                        $join->on('t.term_id', '=', 'tax.term_id');        
                    })
                    ->join('wp_users AS u', function ($join){
                        $join->on('u.id', '=', 'p.post_author');        
                    })
                    ->where('post_name', '=', $slug)
                    ->where('post_status', '=','publish')
                    ->get()
                    ->toArray();
        //returning the response
        
        return formatPostTagsAndCategories($data);
    }
    //get article details
    public static function getArticleDetails($slug = 'oh,no',$type = 'category'){
        //DB::enableQueryLog();
        $details = DB::table('wp_posts AS p')
        ->select('p.ID', 'p.post_date','p.post_title','p.post_content','p.post_name','p.post_modified','p.post_excerpt','m2.meta_value','u.user_nicename', 'u.display_name', 'u.user_email', 't.name as terms_name')
        ->leftJoin('wp_postmeta AS m1', function ($join){
            $join->on('m1.post_id', '=', 'p.ID');        
        })
        ->leftJoin('wp_postmeta AS m2', function ($join){
            $join->on('m1.meta_value', '=', 'm2.post_id');        
        })
        ->leftJoin('wp_term_relationships AS rel', function ($join){
            $join->on('rel.object_id', '=', 'p.ID');        
        })
        ->leftJoin('wp_term_taxonomy AS tax', function ($join){
            $join->on('tax.term_taxonomy_id', '=', 'rel.term_taxonomy_id');        
        })
        ->leftJoin('wp_terms AS t', function ($join){
            $join->on('t.term_id', '=', 'tax.term_id');        
        })
        ->leftJoin('wp_users AS u', function ($join){
            $join->on('u.id', '=', 'p.post_author');        
        })
        ->whereNotNull('m1.meta_value')
        ->where('m1.meta_key','=','_thumbnail_id')
        ->whereNotNull('m2.meta_value')
        ->where('m2.meta_key','=','_wp_attached_file')
        ->where('tax.taxonomy','=',$type)
        ->where('p.post_status','=','publish')
        ->where('p.post_type','=','post')
        ->where('post_name','=', $slug)
        ->orderBy('p.post_date', 'desc')
        ->limit(1)
        ->offset(0)
        ->get();
        //dd(DB::getQueryLog());

        return formatArticleList($details);
    }
    //full text search
    public static function search($terms = null){
        $resp = DB::table('wp_posts')
                ->whereRaw('MATCH (post_title, post_content, post_excerpt) AGAINST (?)' , array($terms))
                ->orderBy('post_date', 'desc')
                ->get()
                ->toArray();

        return json_decode(json_encode($resp), true);
    }
}