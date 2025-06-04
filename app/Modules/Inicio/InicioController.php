<?php

namespace App\Modules\Inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Inicio\InicioService;

class InicioController extends Controller
{
    public function __construct(private InicioService $inicioService) {
        $this->inicioService = $inicioService;
    }

    public function showForm(Request $req){
        return $this->inicioService->index($req);
    }

}
