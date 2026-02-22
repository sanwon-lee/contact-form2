@extends('layouts.app')

@section('content')
    <form action="{{ route('login') }}" method="post">
      @csrf
      <input type="email" name="email" value="{{ old('email') }}">
      <input type="password" name="password">
      <button>ログイン</button>
    </form>
@endsection