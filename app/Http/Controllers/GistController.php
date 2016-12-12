<?php

namespace App\Http\Controllers;

use App\Gists\GistClient;
use Illuminate\Http\Request;

class GistController extends Controller
{

    public function store(GistClient $gistClient, Request $request)
    {
//        return response()->json(['html_url' => 'http://www.google.com']);

        $this->validate($request, [
            'name'  => 'required',
            'code' => 'required',
        ]);

        return $gistClient->createGist($request->name, $request->code, $request->description);
    }
}
