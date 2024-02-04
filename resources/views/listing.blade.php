@extends('layouts.inside')

@push('title') Listing @endpush

@section('content')
    @include('includes.insidehead')
    @include('includes.sectionCarListingPaginate')
    @include('includes.testimonial')
    @include('includes.rentCar')
@endsection
