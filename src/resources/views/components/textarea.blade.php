@php
  use App\Models\Contact;
@endphp

@props(['field'])

@php
  $label = Contact::COL_LABELS[$field];
@endphp

<div class="form__item">
  <label for="{{ $field }}" class="form__label form__label--textarea">{{ $label }}</label>

  <textarea name="{{ $field }}" id="{{ $field }}" class="form__textarea" rows="10" {{ $attributes }}>{{ old($field) }}</textarea>

  @error($field)
    <span class="err-msg">{{ $message }}</span>
  @enderror
</div>
