<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Providers\RouteServiceProvider;


class RegisterController extends Controller
{
    public function index(){
        return view('service.register');
    }
    public function store(RegisterRequest $request){
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if (!$user){
            return redirect()->route('register.index')->with('alert', 'Ошибка регистрации');
        }
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME)->with('alert', 'Вы успшено зарегистрированы');
    }
}
