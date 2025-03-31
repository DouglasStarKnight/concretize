<?php

namespace App\Modules\Inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\inicio\InicioService;

class InicioController extends Controller
{
    public function __construct(private InicioService $inicioService) {}

    public function showForm()
    {
        return view('inicio');
    }

}
