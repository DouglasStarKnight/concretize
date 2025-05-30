<?php

namespace App\Modules\Register;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Register\RegisterModel;
use App\Modules\Register\InterfaceRegister;
use App\Modules\CrudBase\RepositoryBase;

class RegisterRepository implements InterfaceRegister{

    public function __construct(private RegisterModel $model, private RepositoryBase $repositoryBase){
        $this->model = $model;
    }

    public function cria($data){
        return $this->repositoryBase->insert($this->model, $data);
    }

    // public function atualiza($data, $id){
    //     return $this->repositoryBase->update($this->model, $id, $data);
    // }

    // public function excluir($id) {
    //     return $this->repositoryBase->delete($this->model, $id);
    // }
}
