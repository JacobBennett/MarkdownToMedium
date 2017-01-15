<?php

namespace App\Http\Controllers;

use App\Gist;
use App\Gists\GistClient;
use Illuminate\Http\Request;

class GistController extends Controller
{

    public function store(GistClient $gistClient, Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'code' => 'required',
        ]);

        $githubGist = $gistClient->createGist($request->name, $request->code, $request->description);

        $gist = new Gist(['gist_url' => $githubGist['html_url']]);
        auth()->user()->addGist($gist);

        return $githubGist;
    }
}
