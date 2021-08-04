@extends('layouts.master')

@section('title', 'I am example !!')

@section('head')
<style>
    html, body {
        background-color: #fff;
        margin: 0;
        padding: 0;
    }
    body {
        height: 100vh;
    }
    .page_header {
        background-color: yellow;
        height: 50px;
    }
    .top_content {
        background-color: pink;
        height: 60px;
    }
    .left_content {
        background-color: purple;
        width: 200px;
        height: 532px;
    }
    .right_top_content {
        background-color: gray;
        width: 200px;
        height: 140px;
    }
    .right_bottom_content {
        background-color: lightblue;
        width: 200px;
        height: 140px;
    }
    .bottom_content {
        background-color: green;
        height: 70px;
        clear: both;
    }
    .page_footer {
        background-color: red;
        flex: 1;
        -webkit-flex: 1;
        clear: both;
    }
</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

@endsection

@section('header')
<div class="page_header">
</div>
@endsection

@section('top_content')
<div class="top_content">
</div>
@endsection

@section('left_content')
<div class="left_content">
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
</div>
@endsection

@section('footer')
<div class="page_footer">
</div>
@endsection

@section('script')
@endsection