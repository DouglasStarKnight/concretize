<?php

namespace App\Modules\Slides\dto;


use Illuminate\Foundation\Http\FormRequest;

class CreateSlides extends FormRequest{

  public function authorize(): bool {
    return true;
  }

  public function rules(): array{
    return [
      'caminho' => 'nullable|image|mimes:jpeg,png,jpg,webp',
      'posicao' => 'nullable'
    ];
  }

  // public function messages(): array {
  //   return [
      
      
  //   ];
  // }
}
