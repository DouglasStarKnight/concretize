<?php

namespace App\Modules\Admin;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Admin\AdminModel;
use App\Modules\Admin\InterfaceAdmin;
use App\Modules\CrudBase\RepositoryBase;
use App\Modules\Destaque\DestaqueModel;
use App\Modules\Slides\SlidesModel;

class AdminRepository implements InterfaceAdmin{

    public function __construct(private DestaqueModel $destaqueModel ,private AdminModel $model, private RepositoryBase $repositoryBase, private SlidesModel $slidesModel){
    }

    public function cria($data){
        return $this->repositoryBase->insert($this->model, $data);
    }

    public function atualiza($data, $id){
        return $this->repositoryBase->update($this->model, $id, $data);
    }

    public function excluir($id) {
        return $this->repositoryBase->delete($this->model, $id);
    }

    public function destaque($data){
        return $this->repositoryBase->insert($this->destaqueModel, $data);
    }

    public function destaqueEdita($data, $id){
        return $this->repositoryBase->update($this->destaqueModel,$id, $data);
    }

    public function exclui_destaque($id) {

        return $this->repositoryBase->delete($this->destaqueModel, $id);
    }
    
}
