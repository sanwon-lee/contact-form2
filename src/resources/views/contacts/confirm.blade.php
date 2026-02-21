@extends('layouts.app')

@php
    use App\Models\Contact;
@endphp

@push('robots')
    <meta name="robots" content="noindex">
@endpush

@section('title')
  Confirmation
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endpush

@section('content')
  <div class="confirm">
    <h2 class="confirm__title">お問い合わせ内容確認</h2>

    <div class="confirm__body">
      @foreach ($inputs as $key => $value)
          <label class="confirm__body-label">{{ Contact::COL_LABELS[$key] }}</label>
          <p class="confirm__body-content">{{ $value }}</p>
      @endforeach
    </div>

    <form action="{{ route('contacts.store') }}" method="post" id="confirm__form">
      @csrf
      <div class="confirm__form-inner">
        <button formaction="{{ route('contacts.back') }}" id="edit-button" class="confirm__form-btn">修正する</button>
        <button id="submit-button" class="confirm__form-btn">送信する</button>
      </div>
    </form>
  </div>
@endsection

@push('scripts')
    <script>
      const form = document.getElementById('confirm__form');
      const submitButton = document.getElementById('submit-button');
      const editButton = document.getElementById('edit-button');

      form.addEventListener('submit', function() {
        submitButton.disabled = true;
        submitButton.innerText = "送信中...";

        editButton.disable = true;
      });

      window.addEventListener('pageshow', function() {
        submitButton.disabled = false;
        submitButton.innerText = "送信する";

        editButton.disabled = false;
      });
    </script>
@endpush