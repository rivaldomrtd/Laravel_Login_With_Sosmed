<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook()
    {
        try {

            $user = Socialite::driver('facebook')->stateless()->user();

            /// lakukan pengecekan apakah facebook id nya sudah ada apa belum
            $isUser = User::where('facebook_id', $user->id)->first();

            /// jika sudah ada, langsung login
            if ($isUser) {

                Auth::login($isUser);
                return redirect('/home');
            } else { /// jika belum ada, register baru

                $createUser = new User;
                $createUser->name =  $user->getName();

                /// mendapatkan email dari facebook
                if ($user->getEmail() != null) {
                    $createUser->email = $user->getEmail();
                    $createUser->email_verified_at = \Carbon\Carbon::now();
                }

                /// tambahkan facebook id
                $createUser->facebook_id = $user->getId();

                /// membuat random password
                $rand = rand(111111, 999999);
                $createUser->password = Hash::make($user->getName() . $rand);

                /// save
                $createUser->save();

                /// login
                Auth::login($createUser);
                return redirect('/home');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
