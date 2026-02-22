@extends('layouts.app')

@section('content')
    <form action="{{ route('register') }}" method="post">
      @csrf
      <input type="text" name="name" value="{{ old('name') }}">
      <input type="email" name="email" value="{{ old('email') }}">
      <input type="password" name="password">
      <input type="password" name="password_confirmation">
      <button>登録する</button>
    </form>

    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endsection