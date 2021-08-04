@extends('layouts.master')

@section('title', 'WebABLLS - Done')

@section('head')

<style>
    html {
        background-color: #ffffff;
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
        padding-top:120px;
        z-index: 45;
        /* background-color: #e2e2e2; */
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
        padding-top:4rem;
        padding-bottom:4rem;
    }
    <?php
    $userAgent = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
    if (preg_match('~MSIE|Internet Explorer~i', $userAgent) || (strpos($userAgent, 'Trident/7.0') !== false && strpos($userAgent, 'rv:11.0') !== false)) {
        echo '.page_footer {
            margin-top: 10px;
            flex-grow: 1;
            -webkit-flex-grow: 1;
            -moz-flex-grow: 1;
            -ms-flex-grow: 1;
            -o-flex-grow: 1;
            clear: both;
            background-color: #e2e2e2; 
        }';
    } else {
        echo '.page_footer {
            margin-top: 10px;
            flex: 1;
            -webkit-flex: 1;
            -moz-flex: 1;
            -ms-flex: 1;
            -o-flex: 1;
            clear: both;
            background-color: #e2e2e2; 
        }';
    }
    ?>
</style>

@endsection

@section('header')
<div class="page_header">
  @include('contents.index_header')
</div>
@endsection

@section('top_content')
<div class="top_content">
    @include('contents.done_topcontent')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.done_bcontent')
</div>
@endsection

@section('footer')
  <div class="page_footer">
    @include('contents.index_footer')
  </div>
@endsection

@section('script')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/jquery.payform.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/script.js') }}"></script> -->
<script type='text/javascript'>

    // history.pushState(null, null, "http://localhost");
    // location.replace('http://localhost');
    // window.addEventListener('popstate', function (e) {
    //     // history.pushState(null, null, "http://localhost");
    //     location.replace('http://localhost');
    // });

    location.replace('http://localhost'); 
        function noBack() { 
            location.replace('http://localhost'); 
        }

    window.onkeydown = function ( e ) {
    // if(e.altKey){
    //     alert(5);
    // }
        if ((e.altKey) && ((e.keyCode==37) || (e.keyCode==39))){ //擋 Alt+ 方向鍵 
            alert("You can not back!");

            e.returnValue=false;
        }


        if (e.keyCode==116){ //擋 F5 重新整理鍵
            alert("No refresh page!");
            e.keyCode=0;
            e.returnValue=false;
        }

        if ((e.ctrlKey) && (e.keyCode==82) || (!e.altKey && !e.shiftKey && e.keyCode == 82)){ //擋 Ctrl+R and mac command + R
            alert("No refresh page!");

            e.returnValue=false;
        }
    }
</script>

@endsection