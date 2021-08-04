@extends('layouts.master')

@section('title', "Anaytics View")

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
    .left_content {
        margin-top: 7px;
    }
    .right_top_content {
        margin-top: 10px;
        margin-left: 20px;
    }
    .bottom_content {
        margin-top: 5px;
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
        }';
    }
    ?>

    @media(max-width:990px) {
        .bottom_content .container-fluid .col-md-4 {
            flex:0 0 50%;
            max-width:50%;
        }
    }

    @media(max-width:550px) {
        .bottom_content .container-fluid .col-md-4 {
            flex:0 0 100%;
            max-width:100%;
        }
    }
</style>

<script src="{{ asset('/js/Chart.min.js') }}"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href="{{ asset('css/theme.default.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('/js/jquery.tablesorter.widgets.js') }}"></script>
<script src="{{ asset('/js/widget-pager.js') }}"></script>
<link href="{{ asset('css/jquery.tablesorter.pager.css') }}" rel="stylesheet">
@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_anaytics_view_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_anaytics_view_right_top_content')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.app_webablls_anaytics_view_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">
    function UnLoadWindow() {
    }

    $(function () {

        $("#Change").click(function(e) {
            location.href = "{{url('/analysis list/ChangeDetails/1')}}";
        });
        
        $("#actions li").click(function(e) {
            if ($(this).data("index") == "Change") {
                var Url = "{{url('/analysis list/ChangeDetails/1')}}";
                location.href = Url;
            } else {
            }
        });

        $("#student li").click(function(e) {
            location.href=$(this).data("path");
        });

        $(".app-select-list2 span").on("click", function() {
            if (!$(this).hasClass('select')) {
                if ($(this).data("index") == "Table_analysis_of_single_assessment") {
                    location.href="{{url('analysis list/View/1/?a=2')}}";
                } else if ($(this).data("index") == "Section_Graphs_with_Total_Items_Scale") {
                    location.href="{{url('analysis list/View/1/?a=3')}}";
                } else if ($(this).data("index") == "Category_Graphs_with_Total_Items_Scale") {
                    location.href="{{url('analysis list/View/1/?a=4')}}";
                } else if ($(this).data("index") == "Section_Graphs_with_Total_Scores_Scale") {
                    location.href="{{url('analysis list/View/1/?a=5')}}";
                } else if ($(this).data("index") == "Category_Graphs_with_Total_Scores_Scale") {
                    location.href="{{url('analysis list/View/1/?a=6')}}";
                } else if ($(this).data("index") == "Section_Graphs_with_Percentage_Scale") {
                    location.href="{{url('analysis list/View/1/?a=7')}}";
                } else if ($(this).data("index") == "Category_Graphs_with_Percentage_Scale") {
                    location.href="{{url('analysis list/View/1/?a=8')}}";
                } else {
                    location.href="{{url('analysis list/View/1/?a=1')}}";
                }
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });

</script>
@endsection