<?php

namespace App\Modules\login;

use App\Models\User;
use Illuminate\Http\Request;
use App\Modules\Login\LoginService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(private LoginService $loginService) {
        $this->loginService = $loginService;
    }

    public function showForm()
    {
        return view('login');
    }

    public function login(Request $req)
    {
       $data = $req->all();
    //    dd($data);

        return $this->loginService->login($data);

    }
}
