@php
  use App\Models\Contact;
@endphp

@props(['field'])

@php
  $label = Contact::COL_LABELS[$field];
@endphp

<div class="form__item">
  <div class="form__label">
    <label for="{{ $field }}">{{ $label }}</label>
    <label class="form__label-item--required">必須</label>
  </div>

  <div class="form__content">
    <input id="{{ $field }}" name="{{ $field }}" class="form__input @error($field) err-input @enderror" value="{{ old($field) }}" {{ $attributes }}>
    @error($field)
      <span class="err-msg">{{ $message }}</span>
    @enderror
  </div>
</div>
