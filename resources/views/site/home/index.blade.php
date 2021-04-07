@extends('site.layouts.master')


@section('content')
    <h1>Hello World!</h1>

    <a href="{{ route('admin.index') }}">Admin</a>
@endsection
