<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class IndexHomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function addUser(
        RegistrationRequest $request,
        User $user
    ) {
        if ($request->isMethod('post')) {
            $request = $request->validated();

            $user->fill([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
            $user->save();
            return redirect()->route('index');
        }
        return view('registration');
    }
}
