<?php  namespace App\Gists;

use Exception;
use App\Exceptions\GistNotFoundException;
use Github\Client as GitHubClient;

class GistClient
{
    /**
     * @var GitHubClient
     */
    private $github;

    public function __construct(GitHubClient $github)
    {
        $this->github = $github;
    }

    public function getGitHubClient()
    {
        return $this->github;
    }

    /**
     * @param $gistId
     * @return array
     * @throws GistNotFoundException
     */
    public function getGist($gistId)
    {
        try {
            return $this->github->api('gists')->show($gistId);
        } catch (Exception $e) {
            throw new GistNotFoundException($gistId, $e->getMessage());
        }
    }

    /**
     * @param $filename
     * @param $contents
     * @param null $description
     * @return mixed
     */
    public function createGist($filename, $contents, $description = null)
    {
        $file = [
            'files' => [
                $filename => [
                    'content' => $contents,
                ],
            ],
            'public' => false,
            'description' => is_null($description) ? '' : $description,
        ];

        $this->github->authenticate(auth()->user()->token, GitHubClient::AUTH_HTTP_TOKEN);
        return $this->github->api('gists')->create($file);
    }
}