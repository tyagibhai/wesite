<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     *  Homepage of the website
     */

    public function index(Request $request, $slug)
    {
        //assigning the post slug value
        return view('frontend.article.index',['slug'=>$slug]);
    }
}