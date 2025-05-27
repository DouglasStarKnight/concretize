<?php

namespace App\Modules\Admin\dto;


use Illuminate\Foundation\Http\FormRequest;

class CreateAdmin extends FormRequest{

  public function authorize(): bool {
    return true;
  }

  public function rules(): array{
    return [
      'nome' => 'required|string',
      'valor_produto' => 'required|string',
      'categoria_id' => 'required|numeric',
      'image' => 'required|string',
    ];
  }

  public function messages(): array {
    return [
      'nome.required' => 'O nome do produto precisar ser texto.',
      'valor_produto.required' => 'Digite um valor para o Produto.',
      'image.required' => 'Selecione uma imagem.',
      'categoria_id.required' => 'Escolha uma categoria para o produto.',
    ];
  }
}
