<?php

namespace App\Modules\Compra\dto;


use Illuminate\Foundation\Http\FormRequest;

class CreateCompra extends FormRequest{

  public function authorize(): bool {
    return true;
  }

  public function rules(): array{
    return [
      'nome' => 'required|string',
      'valor_produto' => 'required|string',
      'categoria_id' => 'required|numeric',
      'image' => 'required|image|mimes:jpeg,png,jpg,webp',
      'estoque' => 'required|numeric',
      'tipo_de_venda' => 'required|string',
    ];
  }

  public function messages(): array {
    return [
      'nome.required' => 'O nome do produto precisar ser texto.',
      'valor_produto.required' => 'Digite um valor para o Produto.',
      'image.required' => 'Selecione uma imagem.',
      'categoria_id.required' => 'Escolha uma categoria para o produto.',
      'estoque|required' => 'Informe a quantidade no estoque.',
      'tipo_de_venda|required' => 'Informe o tipo de venda do produto.'
    ];
  }
}
