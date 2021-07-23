<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function checkInput()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $users = DB::table('users')->get();
        $username = $request->input('username');
        $password = $request->input('password');
        foreach ($users as $user) {
            if ($username == $user->username && $password == $user->password) {
                toastr()->success('Welcome!!!', 'Success');
                return redirect()->route('customers.list');
            } else {
                toastr()->error('Check username or password', 'Error');
                return view('login');
            }
        }
    }

}
