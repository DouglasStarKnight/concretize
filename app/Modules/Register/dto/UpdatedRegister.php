<?php

namespace App\Modules\Register\dto;


use Illuminate\Foundation\Http\FormRequest;

class UpdatedRegister extends FormRequest{

  public function authorize(): bool {
    return true;
  }

  public function rules(): array{
    return [
      'nome' => 'required|string',
      'data_nascimento' => 'required|numeric',
      'email' => 'required|string|email',
      'password' => 'required|string',
    ];
  }

  public function messages(): array {
    return [
      'nome.required' => 'Insira um nome.',
      'data_nascimento.required' => 'Digite uma data de nascimento.',
      'email.required' => 'digite um e-mail.',
      'email.email' => 'digite um e-mail valido.',
      'password.required' => 'Digite uma senha.',
    ];
  }
}
