<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;

use App\User;
use App\Role;

use Alert;

class UserController extends Controller
{
    public function index() {
    	$users = User::all();
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

    }

    public function update($id, Request $request) {

    }

    public function destroy($id) {
    	$user = User::find($id);

    	$user->delete();

    	Alert::success('Successfully delete user!', 'Deleted');
    	return redirect('users');
    }
}
