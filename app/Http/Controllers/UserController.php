<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;

use App\User;
use App\Role;

use Validator;

use Alert;

class UserController extends Controller
{
    public function index() {
    	$users = User::paginate(10);
    	$roles = Role::lists('name', 'id');

    	return view('admin.users.index', compact('users', 'roles'));
    }

    public function create() {
    	return abort(404);
    }

    public function store(UserRequest $request) {
    	$user = new User();

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);

    	$user->save();
    	
        $user->roles()->sync($request->roles);

    	Alert::success('Successfully create user!', 'Created');
    	return redirect('users');
    }

    public function edit($id) {
        $user = User::find($id);
        $users = User::all();
        $roles = Role::lists('name', 'id');

        return view('admin.users.edit', compact('user', 'users', 'roles'));
    }

    public function update($id, Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'password' => 'sometimes|min:6|confirmed',
            'roles' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        
        $user->save();

        $user->roles()->sync($request->roles);

        Alert::success('Successfully update user!', 'Updated');
        return redirect('users');
    }

    public function setting() {
        $user = User::where('id', auth()->user()->id)->first();

        return view('admin.users.setting', compact('user'));
    }

    public function settingUpdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.auth()->user()->id,
            'password' => 'sometimes|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect('user/setting')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        
        $user->save();

        Alert::success('Successfully update your account!', 'Updated');
        return view('admin.users.setting', compact('user'));
    }

    public function destroy($id) {
    	$user = User::find($id);

    	$user->delete();

    	Alert::success('Successfully delete user!', 'Deleted');
    	return redirect()->back();
    }
}
