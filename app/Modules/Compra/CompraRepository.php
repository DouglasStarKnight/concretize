<?php

namespace App\Modules\Compra;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Compra\CompraModel;
use App\Modules\Compra\InterfaceCompra;
use App\Modules\CrudBase\RepositoryBase;
use App\Modules\Slides\SlidesModel;

class CompraRepository implements InterfaceCompra{

    public function __construct(private CompraModel $model, private RepositoryBase $repositoryBase, private SlidesModel $slidesModel){
        // $this->adminModel = $adminModel;
    }

    public function cria($data){
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
