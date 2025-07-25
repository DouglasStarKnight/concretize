<?php

namespace App\Modules\Carrinho;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Carrinho\CarrinhoModel;
use App\Modules\Carrinho\InterfaceCarrinho;
use App\Modules\CrudBase\RepositoryBase;
use App\Modules\Slides\SlidesModel;

class CarrinhoRepository implements InterfaceCarrinho{

    public function __construct(private CarrinhoModel $model, private RepositoryBase $repositoryBase, private SlidesModel $slidesModel){
    }

    public function cria($data){
        // dd($data);
        return $this->repositoryBase->insert($this->model, $data);
    }

    public function atualiza($data, $id){
        return $this->repositoryBase->update($this->model, $id, $data);
    }

    public function excluir($id) {
        // dd($id);
        return $this->repositoryBase->delete($this->model, $id);
    }
}
