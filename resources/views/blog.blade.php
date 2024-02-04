@extends('layouts.inside')

@push('title') Blog @endpush

@section('content')
    @include('includes.insidehead')
    @include('includes.blog')
    @include('includes.rentCar')
@endsection
