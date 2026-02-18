@php
  use App\Models\Contact;
@endphp

@props(['field'])

@php
  $label = Contact::COL_LABELS[$field];
@endphp

<div class="form__item">
  <div class="form__label">
    <label for="{{ $field }}" class="form__label">{{ $label }}<span>必須</span></label>
  </div>

  <input id="{{ $field }}" name="{{ $field }}" class="form__input" value="{{ old($field) }}" {{ $attributes }}>

  @error($field)
    <span class="err-msg">{{ $message }}</span>
  @enderror
</div>
