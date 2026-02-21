@extends('layouts.app')

@php
  use App\Models\Contact;
@endphp

@section('title')
  Contact form
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@section('content')
  <div class="form">
    <h2 class="form__title">お問い合わせ</h2>
    <form action="{{ route('contacts.confirm') }}" method="post" class="form__body">
      @csrf
      <x-input :field="Contact::COL_NAME" type="text" placeholder="お名前を入力してください" />
      <x-input :field="Contact::COL_EMAIL" type="email" placeholder="メールアドレスを入力してください" />
      <x-input :field="Contact::COL_TEL" type="tel" placeholder="電話番号を入力してください" />
      <x-textarea :field="Contact::COL_CONTENT" placeholder="お問い合わせ内容を入力してください" />
      <button class="form__button">入力内容を確認する</button>
    </form>
  </div>
@endsection