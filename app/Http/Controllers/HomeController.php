<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function createGists()
    {
        // get JSON object from the front end
        // loop through the collection and create a new gist for each one
        // return the link for each item
        // https://github.com/KnpLabs/php-github-api/blob/1.7/doc/gists.md
    }
}
