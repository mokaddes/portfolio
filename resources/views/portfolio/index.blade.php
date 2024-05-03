@extends('layouts.master')
@section('content')
    @include('portfolio.component.header')
    @include('portfolio.component.sections.professional')
    @include('portfolio.component.sections.projects')
    @include('portfolio.component.sections.frameworks')
    @include('portfolio.component.sections.tools')
    @include('portfolio.component.sections.mini')
    @include('portfolio.component.sections.personal')
@endsection
