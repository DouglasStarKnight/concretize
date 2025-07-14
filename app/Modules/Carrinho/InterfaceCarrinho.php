<?php 

namespace App\Modules\Carrinho;

interface InterfaceCarrinho {
  public function cria(array $data);
  public function atualiza(array $data,int $id);
}