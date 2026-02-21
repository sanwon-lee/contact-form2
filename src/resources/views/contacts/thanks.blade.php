@extends('layouts.app')

@push('robots')
  <meta name="robots" content="noindex">
@endpush

@section('title')
  Thanks
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endpush

@section('content')
    <h2>ありがとうございます</h2>
@endsection