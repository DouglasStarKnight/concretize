<?php 

namespace App\Modules\Admin;

interface InterfaceAdmin {
  public function cria(array $data);
  public function atualiza(array $data,int $id);
}