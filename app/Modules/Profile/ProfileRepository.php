<?php

namespace App\Modules\Profile;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Profile\ProfileModel;
use App\Modules\Profile\InterfaceProfile;
use App\Modules\CrudBase\RepositoryBase;

class ProfileRepository implements InterfaceProfile{

    public function __construct(private ProfileModel $model, private RepositoryBase $repositoryBase){
        $this->model = $model;
    }

    public function index(){
        return $this->model->findAll();
    }

    public function cria(){
        return $this->repositoryBase->insert($this->model, $data);
    }

    public function atualiza($data, $id){
        return $this->repositoryBase->update($this->model, $id, $data);
    }

}
