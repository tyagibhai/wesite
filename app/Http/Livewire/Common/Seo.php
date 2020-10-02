<?php

namespace App\Http\Livewire\Common;
use Illuminate\Http\Request;
use App\Models\Article;
use Livewire\Component;

class Seo extends Component
{
    public $pagePath = null;
    public $pageSlug = null;
    public $seoDetails = [];
    public $pageUrl = null;

    public function mount(Request $request){
        $this->pagePath = $request->path();
        //set seo data
        $this->seoDetails = $this->setSeoContent();
        //set page url
        $this->pageUrl = env('APP_URL') . '/' . $this->pagePath;
    }
    public function render()
    {
        return view('livewire.common.seo');
    }

    protected function setSeoContent(){
       $pageName = $this->getPageName();
       //if page is article the fetch seao details from db
       if($pageName=="article"){
            $this->seoDetails = Article::getArticleDetails($this->pageSlug);
            if(!count($this->seoDetails)){ abort('404'); }
            //pass psot object
            return $this->seoDetails[0];
       }
       else{
            return  $this->getStaticContent($pageName);
       }
    }

    protected function getPageName(){
        
        $pageName="";

        $arr = explode('/',$this->pagePath);
        //length 1 for static and homepage
        if($arr[0]==''){
            $pageName="home";
        }else{
            $pageName=$arr[0];
            if(count($arr)>1){
                $this->pageSlug = $arr[1];
            }          
        }
        //return page name
        return $pageName;
    }
    //static content
    protected function getStaticContent($page){

        $content  = [
            'home'=>[
                'post_title'=>'Homepage',
                'post_excerpt'=>'homepage description',
                'meta_value'=>''
            ],
            'contact'=>[
                'post_title'=>'contact us',
                'post_excerpt'=>'contact description',
                'meta_value'=>''
            ],
            'articles'=>[
                'post_title'=>'search',
                'post_excerpt'=>'search description',
                'meta_value'=>''
            ]
        ];
        //returning the content
        return $content[$page];
    }
}
