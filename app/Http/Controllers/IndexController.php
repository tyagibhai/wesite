<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class IndexController extends Controller
{
    protected $article;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     *  Homepage of the website
     */

    public function index()
    {
        //$allCategoryAndTag = $this->article->getAllCategoryAndTag();

        //$allArticle = formatArticleList($this->article->getAllArticle());

        //$postTagsAndCategories = $this->article->getPostTagsAndCategories('what-is-lorem-ipsum');

        //$articleDetails = formatArticleList($this->article->getArticleDetails('what-is-lorem-ipsum'));
        
        return view('frontend.home.index');
    }
}