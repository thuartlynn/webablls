@extends('layouts.master')

@section('title', 'WebABLLS | What happens if I click on the Student Name?')

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
<!-- JS important-->
<script src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.0/js/fontawesome.js"></script>
@endsection

@section('header')
<div class="page_header">
    @include('support.support_header')
</div>
@endsection

@section('top_content')
<div class="top_content">
    @include('support.what_happens_if_I_click_on_the_student_name_content')
</div>
@endsection

@section('script')

@endsection