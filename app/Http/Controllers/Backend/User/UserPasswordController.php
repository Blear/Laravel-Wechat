<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Requests\Backend\User\UpdateUserPasswordRequest;
use App\Models\User\User;
use App\Repositories\Backend\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPasswordController extends Controller
{
    protected $users;
    public function __construct(UserRepository $users)
    {
        $this->users=$users;
    }

    public function edit(ManageUserRequest $request,User $user)
    {
        return view('backend.user.change-password')->withUser($user);
    }

    public function update(UpdateUserPasswordRequest $request,User $user)
    {
        $this->users->updatePassword($user,$request->all());
        return redirect()->route('admin.user.index')->withFlashSuccess('修改用户密码成功!');
    }
}
