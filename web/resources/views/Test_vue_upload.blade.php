@extends('layouts.master')

@section('title', 'test Vue upload')

@section('head')

<style>

    html, body {
        background-color: #efeeef;
        margin: 0;
        padding: 0;
    }
    body {
        height: 100vh;
    }
    .page_header {
        top: 0;
        width: 100vw;
        z-index: 99;
    }
    .top_content {
        margin-bottom:100px;
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
        clear: both;
        -webkit-flex: 1;
        z-index: 10;
    }
    #email_error_msg { 
        color: red;   
        padding:2px 5px;
    }
    #send_pwd_msg {
        width: 100%;
        text-align: left;
        line-height: 48px;
        color: rgb(50,150,250);
        margin: 0;
        padding: 0;
    }
</style>

<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>

@endsection

@section('header')
<div class="page_header">
    @include('support.support_header')
</div>
@endsection

@section('top_content')
    <testform></testform>

@endsection

@section('script')

@endsection