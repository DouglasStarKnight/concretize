<?php namespace App\Modules\Profile\dto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest {
  public function authorize(): bool {
    return true;
  }

  public function rules(): array{
    return [
      'nome' => 'string',
      'data_nascimento' => 'date',
      'email' => 'email',
      'image' => 'image|mimes:jpeg,png,jpg,webp'
    ];
  }

  public function messages(): array {
    return [
      'nome.string' => 'Digite seu nome.',
      'data_nascimento.data' => 'Digite sua data de nascimento.',
      'image.image' => 'Modelo de imagem não aceito.',
      'email.email' => 'Digite um e-mail valido.',
    ];
  }
}
