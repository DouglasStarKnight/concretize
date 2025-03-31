<?php

namespace App\Modules\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Login\loginService;
use App\Models\User;
use App\Modules\login\auth;
class LoginController extends Controller
{
    public function __construct(private loginService $loginService) {}

    public function showForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);
        // dd($validated);
        if(user::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('register');
        }

        // return back()->with('error', 'Login Invalido.');

    }
}
