@extends('layouts.inside')

@push('title') About US @endpush

@section('content')
    @include('includes.insidehead')
    @include('includes.aboutSection')
    @include('includes.sectionMeetTeam')
    @include('includes.historySection')
    @include('includes.rentCar')
@endsection


