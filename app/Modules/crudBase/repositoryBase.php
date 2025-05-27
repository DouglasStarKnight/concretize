<?php namespace App\Modules\_baseRepository;

class RepositoryBase implements ICrudBase {

  public function create($model, array $data) {
    return $model->create($data);
  }
  public function insert($model, array $data) {
    return $model->insert($data);
  }

  public function findById($model, int $id) {
    return $model->find($id);
  }

  public function update($model, int $id, array $data){
    $upd = $model->find($id);
    $upd->update($data);
    return $upd;
  }

  public function delete($model, int $id) {
    return $model->destroy($id);
  }
}
