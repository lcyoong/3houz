<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ChangePassword;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except' => ['edit', 'update']]);
    }
	
	public function edit ()
	{
		$user = Auth::user();
		return view('auth.passwords.edit', compact('user'));
	}
	
	public function update (ChangePassword $request)
	{
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		User::find($input['id'])->update($input);
		
		return redirect('/home')->with('status', trans('common.save_successful'));
	}
	
}
