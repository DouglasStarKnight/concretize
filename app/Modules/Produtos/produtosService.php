<?php

namespace App\Modules\Produtos;

use App\Models\User;
use App\Modules\Admin\AdminModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Modules\Inicio\InicioModel;
class ProdutosService
{

    public function __construct(private InicioModel $registerModel, private AdminModel $adminModel){
        $this->registerModel = $registerModel;
        $this->adminModel = $adminModel;
    }

    public function index() {
        $produtos = $this->adminModel::select('id', 'nome', 'valor_produto', 'categoria_id', 'image')->get();

        return view('produtos' ,['produtos' => $produtos]);
    }
 
}
