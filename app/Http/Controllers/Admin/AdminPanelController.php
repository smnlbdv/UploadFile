<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}
