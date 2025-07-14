<?php

namespace App\Modules\Inicio;

use App\Models\User;
use App\Modules\Admin\AdminModel;
use App\Modules\Inicio\InicioModel;
use App\Modules\Slides\SlidesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class InicioService
{

    public function __construct(private InicioModel $registerModel, private AdminModel $adminModel, private SlidesModel $slidesModel){
        $this->registerModel = $registerModel;
        $this->adminModel = $adminModel;
    }

    public function index($req) {
        $slides = $this->slidesModel->findAll();
        $produtos = $this->adminModel::select('id', 'nome', 'valor_produto', 'categoria_id', 'image')->get();
        return view('home.inicio' ,['produtos' => $produtos, 'slides' => $slides]);
    }
  
}
