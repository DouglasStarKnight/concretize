<?php 

namespace App\Modules\Compra;

interface InterfaceCompra {
  public function cria(array $data);
  public function atualiza(array $data,int $id);
}