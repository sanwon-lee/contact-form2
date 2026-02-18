@extends('layouts.app')

@php
    use App\Models\Contact;
@endphp

@push('robots')
    <meta name="robots" content="noindex">
@endpush

@push('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endpush

@section('content')
  <h2>お問い合わせ内容確認</h2>

  <p class="confirm-text">{{ $inputs[Contact::COL_NAME] }}</p>
  <p class="confirm-text">{{ $inputs[Contact::COL_EMAIL] }}</p>
  <p class="confirm-text">{{ $inputs[Contact::COL_TEL] }}</p>
  <p class="confirm-text">{{ $inputs[Contact::COL_CONTENT] }}</p>

  <form action="{{ route('contacts.store') }}" method="post" id="form">
    @csrf
    <button formaction="{{ route('contacts.back') }}">修正する</button>
    <button id="submit-btn">送信する</button>
  </form>
@endsection

@push('scripts')
    <script>
      const form = document.getElementById('form');
      const button = document.getElementById('submit-btn');

      form.addEventListener('submit', function() {
        button.disabled = true;
        button.innerText = "送信中...";
      });

      window.addEventListener('pageshow', function() {
        button.disabled = false;
        button.innerText = "送信する";
      });
    </script>
@endpush