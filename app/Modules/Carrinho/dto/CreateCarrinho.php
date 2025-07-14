<?php

namespace App\Modules\Carrinho\dto;


use Illuminate\Foundation\Http\FormRequest;

class CreateCarrinho extends FormRequest{

  public function authorize(): bool {
    return true;
  }

  public function rules(): array{
    return [
      'produto_id' => 'required|string',
      'quantidade' => 'required|numeric',
      'carrinho_id' => 'nullable|numeric',
      'preco' => 'required|string',
    ];
  }

  // public function messages(): array {
  //   return [
  //     'nome.required' => 'O nome do produto precisar ser texto.',
  //     'valor_produto.required' => 'Digite um valor para o Produto.',
  //     'image.required' => 'Selecione uma imagem.',
  //     'categoria_id.required' => 'Escolha uma categoria para o produto.',
  //     'estoque|required' => 'Informe a quantidade no estoque.',
  //     'tipo_de_venda|required' => 'Informe o tipo de venda do produto.'
  //   ];
  // }
}
