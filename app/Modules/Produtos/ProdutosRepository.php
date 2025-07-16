<?php

namespace App\Modules\Produtos;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Produtos\ProdutosModel;
use App\Modules\Produtos\InterfaceProdutos;
use App\Modules\CrudBase\RepositoryBase;

class ProdutosRepository implements InterfaceProdutos{

    public function __construct(private ProdutosModel $model, private RepositoryBase $repositoryBase){
        // $this->ProdutosModel = $ProdutosModel;
    }

    public function findAll($querys){
        return $this->model->findAll($querys);
    }

    public function produtoById($id){
        return $this->model->produtoById($id);
    }

}
