<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LogoutController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect(RouteServiceProvider::HOME)->with('alert', 'Вы успешно вышли из аккаунта');
    }
}
