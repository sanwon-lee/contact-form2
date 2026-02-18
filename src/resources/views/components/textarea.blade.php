@php
    use App\Models\Contact;
@endphp

@props(['field'])

@php
  $label = Contact::COL_LABELS[$field];
@endphp

<label for="{{ $field }}" class="form__label">{{ $label }}</label>

<textarea name="{{ $field }}" id="{{ $field }}" class="form__textarea" {{ $attributes }}>{{ old($field) }}</textarea>

@error($field)
  <span class="err-msg">{{ $message }}</span>
@enderror
