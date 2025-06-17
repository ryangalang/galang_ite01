@extends('layouts.app', ['page_title' => 'Profile'])

@section('content')
    <h1 class="students">This is the profile page.</h1>
    <h2>{{ $greetings }}</h2>
    <button class="btn btn-primary btn-sm">Button</button>
@endsection
