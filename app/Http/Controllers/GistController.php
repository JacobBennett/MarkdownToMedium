<?php

namespace App\Http\Controllers;

use App\Actions\CreateGist;
use App\Http\Requests\GistStoreRequest;

class GistController extends Controller
{
    public function store(CreateGist $createGist, GistStoreRequest $request)
    {
        return $createGist->handle($request);
    }
}
