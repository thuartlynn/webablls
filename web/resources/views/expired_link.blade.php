@extends('layouts.master')

@section('title', 'WebABLLS - Expired Link')

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

<script>
var t = 5;
function showTime() {
    document.getElementById("time").innerHTML = t;    
 
    if (t == 0) {
        // clearTimeout("showTime()");
        window.top.location.href="/password/reset";
    } else {
        t--;
        setTimeout("showTime()", 1000);
    }
}
$(document).ready(function() {
    showTime();
});

</script>
@endsection

@section('header')
<div class="page_header">
    @include('contents.login_header')
</div>
@endsection

@section('top_content')
<div class="top_content">
    @include('contents.expiredlink_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.index_footer')
</div>
@endsection

@section('script')

@endsection