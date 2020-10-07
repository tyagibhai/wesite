<?php
//Date format change
function changeDateFormate($date,$input_date_format,$output_date_format){
    return \Carbon\Carbon::createFromFormat($input_date_format, $date)->format($output_date_format);    
}
function dateToReadable($param){
    $final_date = '';
    //days difference
    $date = \Carbon\Carbon::parse($param);
    $now = \Carbon\Carbon::now();
    $diff = $date->diffInDays($now);
    //show days ago format if less the week
    if($diff<=0){
        $final_date = 'Today';
    }
    if($diff==1){
        $final_date = 'Yesterday';
    }
    if($diff>1 && $diff<=7){
        $final_date = changeDateFormate($param, "Y-m-d H:i:s", "l");
    }
    if($diff>7){
        $final_date= changeDateFormate($param, "Y-m-d H:i:s", "d M, Y");
    }

    return $final_date;
}
//format article list
function formatArticleList($list){

    $articles = [];
    //exit if an empty object provided
    if(!count($list)) return $articles;
    //looping through collection
    foreach($list as $item){
        //check if post already exist
        if(array_key_exists($item->ID,$articles)){
            $temp = $articles[$item->ID];
            $temp->categories[] = $item->terms_name;
            $articles[$item->ID] = $temp;
        }else{
            //adding new item and new categories
            $item->categories[] = $item->terms_name;
            $articles[$item->ID] = $item;
        }       
    }
    //removing keys
    $articleList = [];
    foreach($articles as $article){
        //adding gravitor
        $article->profile_image = "https://www.gravatar.com/avatar/".md5(strtolower(trim($article->user_email)));
        //modifying post date
        $article->post_date = dateToReadable($article->post_date);
        //post_excerpt format
        $article->post_excerpt =  postExcerptformat($article->post_excerpt);
        //adding post thumbnalie
        $article->post_thumbnail = getThumbnail($article->meta_value);
        array_push($articleList,$article);
    }
    
    return json_decode(json_encode($articleList), true);
}

// format post and categories
function formatPostTagsAndCategories($params){
    $data = [];
    $categories = [];
    $tags = [];
    if(!count($params)) return $data;
    //post info
    $param = $params[0];
    $data['info'] = [
        'title'=>$param->post_title,
        'author'=>$param->display_name,
        'date'=>dateToReadable($param->post_date)
    ];
    //category/tag array
    foreach($params as $p){
        if($p->type=='post_tag'){
            array_push($tags,['name'=>$p->name,'slug'=>$p->slug]);
        }
        else{
            array_push($categories,['name'=>$p->name,'slug'=>$p->slug]);
        }
    }
    //adding tags and category data to final data
    $data['tags'] = $tags;
    $data['categories'] = $categories;
    //return data
    return $data;
}
//post excerpt format function

function postExcerptformat($string){
    if (strlen($string) > 120) {
        $stringCut = substr($string, 0,120);
        $endPoint = strrpos($stringCut, ' ');
        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $string .= '...';
    }
    return $string;
}

function getThumbnail($image){
    $image_name = explode('.',explode('/',$image)[2])[0].'-100x100.';
    //image path
    $image_path = explode('/',$image)[0].'/'.explode('/',$image)[1].'/';
    //imge extt
    $image_ext = explode('.',explode('/',$image)[2])[1];
    //return image path
    return $image_path.$image_name.$image_ext;
}

//filter by key value
function filter_by_value ($array, $index, $value){
    $newarray = [];
    if(is_array($array) && count($array)>0) 
    {
        foreach(array_keys($array) as $key){
            $temp[$key] = $array[$key][$index];
            
            if ($temp[$key] == $value){
                $newarray[$key] = $array[$key];
            }
        }
      }
  return $newarray;
}