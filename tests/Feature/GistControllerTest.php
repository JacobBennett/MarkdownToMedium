<?php

namespace Tests\Feature;

use Github\Client;
use App\Models\User;
use App\Models\Gist;
use Github\AuthMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GistControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_a_gist()
    {
        $client = new Client();
        $client->authenticate(
            tokenOrLogin: 'secret',
            authMethod: AuthMethod::ACCESS_TOKEN,
        );

        $githubGist = $client->api('gists')->create([
            'files'       => [
                'thing.php' => [
                    'content' => "testing"
                ],
            ],
            'public'      => true,
            'description' => (string) null,
        ]);

        $this->assertArrayHasKey('html_url', $githubGist);
    }
}
