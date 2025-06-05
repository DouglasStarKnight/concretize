<?php

namespace App\Modules\Slides;

// use App\Modules\_baseRepository\RepositoryBase;
use App\Modules\Slides\SlidesModel;
use App\Modules\Slides\InterfaceSlides;
use App\Modules\CrudBase\RepositoryBase;

class SlidesRepository implements InterfaceSlides{

    public function __construct(private SlidesModel $model, private RepositoryBase $repositoryBase, private SlidesModel $slidesModel){
    }
    public function Cria($data){
        return $this->repositoryBase->insert($this->slidesModel, $data);
    }

    public function atualiza($data, $id){
        return $this->repositoryBase->update($this->model, $id, $data);
    }
}
