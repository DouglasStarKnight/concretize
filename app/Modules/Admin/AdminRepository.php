<?php

namespace App\Modules\Admin;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Admin\AdminModel;
use App\Modules\Admin\InterfaceAdmin;
use App\Modules\CrudBase\repositoryBase;

class AdminRepository implements InterfaceAdmin{

    public function __construct(private AdminModel $model, private RepositoryBase $repositoryBase){
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
