<?php

namespace app\Http\Controllers\Auth;

use App\User;
use App\Member;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialize;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'ajaxLogin']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'tel_no' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tel_no' => $data['tel_no'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        // Create user
        $user = $this->create($request->all());

        // Create member profile
        Member::create(['mb_user_id'=>$user->id]);

        // Attach role to user
        $user->attachRole(config('entrust.member_role_id'));

        Auth::guard($this->getGuard())->login($user);

        return redirect($this->redirectPath());
    }

    public function getSocialAuth($provider)
    {
        if (!config("services.$provider")) {
            abort('404');
        }
        return Socialize::driver($provider)->redirect();
    }

    public function getSocialAuthCallback($provider=null)
    {
        if ($user = Socialize::with($provider)->user()) {
            $authUser = $this->findOrCreateUser($user);

            Auth::login($authUser, true);

            return redirect($this->redirectTo);
        } else {
            return 'something went wrong';
        }
    }

    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        if ($authUser){
            return $authUser;
        }

        $authUser = User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'avatar' => $facebookUser->avatar
        ]);

        // Create member profile
        Member::create(['mb_user_id'=>$authUser->id]);

        // Attach role to user
        $authUser->attachRole(config('entrust.member_role_id'));

        return $authUser;

    }

    public function ajaxLogin()
    {
        return view('auth.login_ajax');
    }

}
