<?php namespace App\Modules\Admin\dto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdmin extends FormRequest {
  public function authorize(): bool {
    return true;
  }

  public function rules(): array{
    return [
      'nome' => 'string',
      'valor_produto' => 'string',
      'categoria_id' => 'numeric',
      'image' => 'mimes:jpeg,png,jpg,webp',
    ];
  }

  public function messages(): array {
    return [
      'nome.string' => 'O nome do produto precisar ser texto.',
      'valor_produto.string' => 'Digite um valor para o Produto.',
      'image.image' => 'Modelo de imagem não aceita.',
      'categoria_id.numeric' => 'Escolha uma categoria para o produto.',
    ];
  }
}
