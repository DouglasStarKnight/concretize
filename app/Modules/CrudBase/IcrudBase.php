<?php namespace App\Modules\CrudBase;
interface ICrudBase {
  public function create(string $model, array $data);
  public function findById(string $model, int $id);
  public function update(string $model, int $id, array $data);
  public function delete(string $model, int $id);
}
