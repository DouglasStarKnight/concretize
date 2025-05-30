<?php

namespace App\Modules\Register;

use App\Http\Controllers\Controller;
use App\Modules\Register\dto\CreateRegister;
use Illuminate\Http\Request;
use App\Modules\Register\registerService;

class RegisterController extends Controller
{
    public function __construct(private registerService $registerService) {}

    public function showForm()
    {
        return view('register');
    }

    public function cria(CreateRegister $request)
    {
        $data = $request->validated();
        return $this->registerService->cria($data);

    }
}
