@extends('layouts.master')

@section('title', 'WebABLLS-Add User mail')

@section('head')

<style>

    html {
        background-color: #fff;
        padding: 0;
        position:relative;
        min-height:100vh;
    }
    /* body {
        margin-bottom:270px;
    } */
    .page_header {
        position: fixed;
        top: 0;
        width: 100vw;
        z-index: 99;
        clear: both;
    }
    .top_content {
        margin-top:120px;
        z-index: 45;
    }
    .left_content {
    }
    .right_top_content {
    }
    .right_bottom_content {
    }
    .bottom_content {
        clear: both;
        z-index: 23;
    }
    .page_footer {
        flex: 1;
        -webkit-flex: 1;
        -moz-flex: 1;
        -ms-flex: 1;
        -o-flex: 1;
        clear: both;
        background-color: #e2e2e2; 
    }
</style>

<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
@endsection

@section('header')
<div class="page_header">
  @include('contents.login_header')
</div>
@endsection

@section('bottom_content')
<div class="top_content">
    @include('contents.mailadduser_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.index_footer')
</div>
@endsection

@section('script')

@endsection