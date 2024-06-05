<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Patient;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{


    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * @throws \Exception
     */
    public function socialRedirect($service): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        $this->validateService($service);

        if ($service == "fb") {
            $service = "facebook";
        }

        return Socialite::driver($service)->redirect();
    }


    public function socialCallback($service, Request $request): Application|Redirector|RedirectResponse
    {
        $this->validateService($service);

        if ($service == "fb") {
            $service = "facebook";
        }

        try {
            $user = Socialite::driver($service)->user();
        } catch (\Throwable $th) {
            $user = Socialite::driver($service)->stateless()->user();
        }

        $targetUser = Patient::updateOrCreate([
            $service . "_id" => $user->id,
        ], [
            'name' => $user->name,
            'email' => $user->email,
            $service . '_token' => $user->token,
            $service . '_refresh_token' => $user->refreshToken,
            'password' => Hash::make($user->token)
        ]);

        $targetUser->makeVisible(['password']);

        $credentilas = [
            'email' => $targetUser->email,
            'password' => $user->token
        ];

        $this->guard->login($targetUser);

        if($this->guard->user()->email_verified_at == null){
            $this->guard->user()->email_verified_at = now();
            $this->guard->user()->save();
        }



        return redirect('/dashboard');


    }

    /**
     * @throws \Exception
     */
    private function validateService($service = null): void
    {
        $services = Config::get('services.socialite', null);

        if ($service == null || $services == null || !in_array($service, $services)) {
            throw new \Exception("no service $service available", 400);
        }
    }
}
