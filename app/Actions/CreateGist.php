<?php


namespace App\Actions;


use Github\Client;
use App\Models\Gist;
use Github\AuthMethod;
use App\Http\Requests\GistStoreRequest;

class CreateGist
{
    public function __construct(
        public Client $client
    ) {}

    public function handle(GistStoreRequest $request)
    {
        $this->client->authenticate(
            tokenOrLogin: $request->user()->github_token,
            authMethod: AuthMethod::ACCESS_TOKEN,
        );

        $githubGist = $this->client->api('gists')->create([
            'files' => [
                $request->name => [
                    'content' => $request->code
                ],
            ],
            'public' => true,
            'description' => $request->description ?: '',
        ]);

        $gist = new Gist(['gist_url' => $githubGist['html_url']]);

        $request->user()->addGist($gist);

        return $githubGist;
    }
}
