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
      'password' => 'numeric',
      'email' => 'email',
      'image' => 'mimes:jpeg,png,jpg,webp',
    ];
  }

  public function messages(): array {
    return [
      'nome.string' => 'O seu nome.',
      'data_nascimento.data' => 'Digite sua data de nascimento.',
      'image.mimes' => 'Modelo de imagem não aceita.',
      'email.email' => 'Digite um e-mail valido.',
    ];
  }
}
