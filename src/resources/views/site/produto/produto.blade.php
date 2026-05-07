@extends('layout.site')

@section('content')

@include('site.produto.page_title')
@include('site.produto.sidebar')

@endsection

@push('plugins')
    <script src="{{ asset('davilla/js/theia-sticky-sidebar.min.js') }}"></script>
@endpush