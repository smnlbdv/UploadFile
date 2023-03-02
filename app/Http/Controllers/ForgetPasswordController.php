<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordRequest;
use Illuminate\Support\Facades\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;

class ForgetPasswordController extends Controller
{
    public function index(){
        return view('service.forgetPassword');
    }
    public function store(ForgetPasswordRequest $request){
        $status = Password::sendResetLink(
            $request->only('email')
        );
        if($status === Password::RESET_LINK_SENT){
            return back()->with('alert', 'Пароль успешно сброшен');
        }

        return back()->with('alert', 'Не получилось сбросить пароль');

    }
}
