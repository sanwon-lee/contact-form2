<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ContactRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  public function prepareForValidation(): void
  {
    $this->merge([
      Contact::COL_EMAIL => (string) Str::of($this->email)
        ->tap(fn($s) => mb_convert_kana($s, 'as', 'UTF-8'))
        ->lower()
        ->trim(),

      Contact::COL_TEL => (string) Str::of($this->tel)
        ->tap(fn($s) => mb_convert_kana($s, 'as', 'UTF-8')),
    ]);
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      Contact::COL_NAME => ['required', 'string'],
      Contact::COL_EMAIL => ['required', 'string', 'email:rfc,dns'],
      Contact::COL_TEL => ['required', 'string', 'regex:/^[0-9+-]+$/', 'max:20'],
      Contact::COL_CONTENT => ['nullable', 'string'],
    ];
  }

  public function attributes(): array
  {
    return Contact::COL_LABELS;
  }

  public function messages()
  {
    return [
      Contact::COL_TEL . '.regex' => '電話番号には数字、ハイフン(-)および\'+\'のみ使用できます',
    ];
  }
}
