<?php namespace App\Modules\Compra\dto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompra extends FormRequest {
  public function authorize(): bool {
    return true;
  }

  public function rules(): array{
    return [
      'nome' => 'nullable|string',
      'valor_produto' => 'nullable|string',
      'categoria_id' => 'nullable|numeric',
      'image' => 'nullable|mimes:jpeg,png,jpg,webp',
      'estoque' => 'nullable|numeric',
      'tipo_de_venda' => 'nullable|string'
    ];
  }

  // public function messages(): array {
  //   return [
  //     'nome.string' => 'O nome do produto precisar ser texto.',
  //     'valor_produto.string' => 'Digite um valor para o Produto.',
  //     'image.image' => 'Modelo de imagem não aceita.',
  //     'categoria_id.numeric' => 'Escolha uma categoria para o produto.',
  //   ];
  // }
}
