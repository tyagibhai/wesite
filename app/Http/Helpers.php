<?php
//Date format change
function changeDateFormate($date,$input_date_format,$output_date_format){
    return \Carbon\Carbon::createFromFormat($input_date_format, $date)->format($output_date_format);    
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
        //days difference
        $date = \Carbon\Carbon::parse($article->post_date);
        $now = \Carbon\Carbon::now();
        $diff = $date->diffInDays($now);
        //show days ago format if less the week
        if($diff<=0){
            $article->post_date = 'Today';
        }
        if($diff==1){
            $article->post_date = 'Yesterday';
        }
        if($diff>1 && $diff<=7){
            $article->post_date = "$diff days ago";
        }
        if($diff>7){
            $article->post_date = changeDateFormate($article->post_date, "Y-m-d H:i:s", "d M, Y");
        }
        
        array_push($articleList,$article);
    }
    
    return $articleList;
}
