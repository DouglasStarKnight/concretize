<?php

namespace App\Modules\Inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\inicio\InicioService;

class InicioController extends Controller
{
    public function __construct(private InicioService $inicioService) {
        $this->inicioService = $inicioService;
    }

    public function showForm()
    {
        return $this->inicioService->index();
    }

    public function findAll() {
        return $this->inicioService->findAll();
    }

}
