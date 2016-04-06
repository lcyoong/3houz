<?php

namespace app\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traits\ControllerTrait;
use App\User;
use App\Http\Requests\EditUser;

class UserController extends Controller
{
    use ControllerTrait;
    protected $userRepo;

    public function __construct(User $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->parm = ['search_path'=>'user/search', 'search'=>'src_user', 'filter'=>'user.filter'];
    }

    public function index()
    {
        $users = $this->userRepo->filter(session()->get('src_user'))->getPaginated();

        return view('user.list', compact('users') + $this->parm);
    }

    public function edit(User $user)
    {
				$this->authorize('update', $user);

        return view('user.edit', compact('user'));
    }

    public function editOwn()
    {
        $user = auth()->user();

        return view('user.edit', compact('user'));
    }

    public function update(EditUser $request)
    {
        $input = $request->all();

        $this->userRepo->find($input['id'])->update($input);

        return redirect()->back()->with('status', trans('common.save_successful'));
    }
}
