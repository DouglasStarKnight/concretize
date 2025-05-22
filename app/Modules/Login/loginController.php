<?php

namespace App\Modules\login;

use App\Models\User;
use Illuminate\Http\Request;
use App\Modules\Login\loginService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
        }
        return redirect()->route('inicio.index');

    }
}
