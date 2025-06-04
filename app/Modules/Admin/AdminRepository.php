<?php

namespace App\Modules\Admin;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Admin\AdminModel;
use App\Modules\Admin\InterfaceAdmin;
use App\Modules\CrudBase\RepositoryBase;
use App\Modules\Slides\SlidesModel;

class AdminRepository implements InterfaceAdmin{

    public function __construct(private AdminModel $model, private RepositoryBase $repositoryBase, private SlidesModel $slidesModel){
        // $this->adminModel = $adminModel;
    }

    public function cria($data){
        return $this->repositoryBase->insert($this->model, $data);
    }

    public function atualiza($data, $id){
        return $this->repositoryBase->update($this->model, $id, $data);
    }
    public function slidesCria($data){
        return $this->repositoryBase->insert($this->slidesModel, $data);
    }

    public function excluir($id) {
        // dd($id);
        return $this->repositoryBase->delete($this->model, $id);
    }
}
