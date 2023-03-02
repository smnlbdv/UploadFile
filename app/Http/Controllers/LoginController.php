<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function index(){
        return view('service.login');
    }
    public function store(LoginRequest $request){
        if (Auth::attempt($request->only("email", 'password'), $request->boolean('remember'))){
            $request->session()->regenerate();
            return redirect()->route('service.index')->with('status', 'Вход в аккаунт выполнен успешно');
        }else{
            return redirect()->back()->with('status', 'Ошибка авторизации');
        }
    }
}
