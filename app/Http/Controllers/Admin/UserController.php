<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends AdminController
{

    public function index()
    {
        $users = User::latest()->paginate('6');
        return view('Admin.User.index', compact('users'));
    }

    public function create()
    {
        return view('Admin.User.UserAdd');
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'userName' => 'required',
            'userEmail' => 'required|email',
            'userPassword' => 'required',
            'userPasswordConfrim' => 'required',
            'userRole' => 'required',
            'checkEmail' => 'required|numeric',
        ]);


        if ($request['userPassword'] != $request['userPasswordConfrim']) {
            session()->flash('passwordReapit', true);
            return back();
        } else {
            $signup = [
                'name' => $request['userName'],
                'email' => $request['userEmail'],
                'password' => bcrypt($request['userPassword']),
                'type' => $request['userRole'],
                'verified' => '0',
            ];

            if ($request['checkEmail'] == true) {
                $user = User::create($signup);
                // event(new Registered($user));
                // UserVerification::generate($user);
                // UserVerification::send($user, 'My Custom E-mail Subject From Panel Admin');
                session()->flash('sendMail', true);
                return redirect()->route('user.index');
            } else if ($request['checkEmail'] == false) {
                $signup['verified'] = '1';
                $user = User::create($signup);
                session()->flash('registerEmail', true);
                return redirect()->route('user.index');
            } else
                return back();
        }
    }

    public function show(User $user)
    {

        //
    }

    #Show Edit To User
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('Admin.User.UserEdit', compact('user', 'roles'));
    }

    #Update User
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles_id'));
        return redirect(route('user.index'));
    }

    #Remove User
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();
        return redirect(route('user.index'));
    }
}
