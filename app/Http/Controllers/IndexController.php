<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except(['test','blog']);
    }

    /**
     *  Homepage of the website
     */

    public function index()
    {
        return view('frontend.home.index');
    }
}
