<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Http\Controllers\Controller;

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
            $user->fill($request);
            $user->save();
            return redirect()->route('logon');
        }
        return view('registration');
    }
}
