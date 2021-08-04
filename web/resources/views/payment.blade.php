@extends('layouts.master')

@section('title', 'WebABLLS - Payment')

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
        background-color: #e2e2e2;
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
    @include('contents.payment_topcontent')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.payment_bcontent')
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

    // $(function () {
    //     if (!!window.performance && window.performance.navigation.type === 2) {
    //         //!! 用來檢查 window.performance 是否存在
    //         //window.performance.navigation.type ===2 表示使用 back or forward
    //         //window.location.reload();//或是其他動作
    //         window.location.href = "{{url('/')}}"
    //     } 

    // window.history.forward(); 
    //     function noBack() { 
    //         window.history.forward(); 
    //     }

    // function preventBack() { 
    //         window.history.forward(2);  
    //     } 
          
    //     setTimeout("preventBack()", 0); 
          
    //     window.onunload = function () { null };

    // //防止页面后退
    // // history.pushState(null, null, "http://localhost");
    // location.replace('http://localhost');
    // window.addEventListener('popstate', function (e) {
    //     // history.pushState(null, null, "http://localhost");
    //     location.replace('http://localhost');
    // });
    

</script>

@endsection