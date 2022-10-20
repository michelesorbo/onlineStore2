@extends('app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<h1>About Us</h1>
<p>{{ $viewData['content'] }}</p>
<p>{{ $viewData['autori'] }}</p>
@endsection
