<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Exception;
use App\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')
            ->scopes(['user:email', 'gist'])
            ->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return redirect('auth/github');
        }
        
        $authUser = $this->findOrCreateUser($user);
        auth()->login($authUser, true);

        return redirect(session()->get('redirect_to', '/create'));
    }

    private function findOrCreateUser($user)
    {
        if ($authUser = User::where('github_id', $user->id)->first()) {
            
            $authUser->update([
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'token' => $user->token
            ]);

            return $authUser->fresh();
        }

        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'github_id' => $user->id,
            'avatar' => $user->avatar,
            'token' => $user->token
        ]);
    }

    public function getLogout()
    {
        auth()->logout();
        return redirect('/');
    }
}
