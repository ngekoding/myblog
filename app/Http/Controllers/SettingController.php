<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Validator;

use Alert;

class SettingController extends Controller
{
    public function index() {
    	$user = User::where('id', auth()->user()->id)->first();

        return view('admin.users.setting', compact('user'));
    }

    public function update(Request $request) {
    	// $user = User::where(auth()->user()->id)->first();

    	dd($request);
    }
}
