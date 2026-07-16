@extends('layouts.master')
@section('title', 'Home Page')
@section('content')

@include('components.home.banner')
@include('components.home.courses')
@include('components.home.affiliations')
@include('components.home.trailer')
@include('components.home.about')
@include('components.home.management-desk')
@include('components.home.choose')
@include('components.home.features')
@include('components.home.certified')
@include('components.home.facts')
@include('components.home.testimonials')
@include('components.home.faq')
@include('components.home.blogs')

@endsection