<?php

namespace App\Modules\Profile;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Profile\ProfileModel;
use App\Modules\Profile\InterfaceProfile;
use App\Modules\CrudBase\repositoryBase;

class ProfileRepository implements InterfaceProfile{

    public function __construct(private ProfileModel $model, private RepositoryBase $repositoryBase){
        $this->model = $model;
    }

    public function atualiza($data){
        return $this->model->findAll($data);
    }

}
