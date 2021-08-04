@extends('layouts.master')

@section('title', 'test localStorage')

@section('head')

<style>

    html, body {
        background-color: #efeeef;
        margin: 0;
        padding: 0;
        list-style: none;
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

</style>

<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>

@endsection



@section('header')
   

@endsection

@section('top_content')
<div class="top_content">
@include('contents.test_local')
</div>
@endsection

@section('script')

<script>


    window.addEventListener("storage",function(event){
        var string = localStorage.getItem("data");
        console.log("value is"+ " "+ string);
        console.log("key is"+ " "+event.newValue);
    },false);


</script>

@endsection