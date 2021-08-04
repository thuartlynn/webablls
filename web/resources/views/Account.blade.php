@extends('layouts.master')

@section('title', 'Account Details')

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
    .right_bottom_content {
        margin-left: 20px;
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
</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/timezones.full.js') }}"></script>

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_account_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_account_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_account_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    function init() {
        if (<?php  echo Auth::user()->date_format ?> == 0) {
            $("#Date_Format_id").html("mm/dd/yyyy");
        } else {
            $("#Date_Format_id").html("dd/mm/yyyy");
        }

        if (<?php echo Auth::user()->name_format ?> == 0) {
            $("#Name_Format_id").html("LastName, FirstName");
        } else {
            $("#Name_Format_id").html("FirstName LastName");
        }

        if (<?php echo Auth::user()->show_help?> == 1) {
            $("#Hideshorthelp_id").html("Yes");
        } else {
            $("#Hideshorthelp_id").html("No");
        }

        if (<?php echo  Auth::user()->timeout?> == 0) {
            $("#Timeout_id").html("15 minutes");
        } else if (<?php echo Auth::user()->timeout?>== 1) {
            $("#Timeout_id").html("30 minutes");
        } else if (<?php echo Auth::user()->timeout?>== 2) {
            $("#Timeout_id").html("60 minutes");
        } else if (<?php echo Auth::user()->timeout?>== 3) {
            $("#Timeout_id").html("2 hours");
        } else if (<?php echo Auth::user()->timeout?>== 4) {
            $("#Timeout_id").html("4 hours");
        } else if (<?php echo Auth::user()->timeout?>== 5) {
            $("#Timeout_id").html("6 hours");
        } else {
            $("#Timeout_id").html("8 hours");
        }

        if (<?php echo Auth::user()->assessment_editmode?> == 0) {
            $("#EditMode_id").html("Grid Mode");
        } else if (<?php echo Auth::user()->assessment_editmode?> == 1) {
            $("#EditMode_id").html("Text Mode");
        } else {
            $("#EditMode_id").html("Cat Mode");
        }

        $('#FakeTimeZone_id').timezones();
        $('#FakeTimeZone_id').val("<?php echo Auth::user()->time_zone?>"); 
        var Text=$("#FakeTimeZone_id").find("option:selected").text();
        $("#TimeZone_id").html(Text);
    }

    $(document).ready(function() {
        document.getElementById("Warning_message").classList.add("hide");
        if ("{{$Result->get('ChangeResult')}}" == "PANDING") {
            if (!document.getElementById("Warning_message").classList.contains("hide")) {
                document.getElementById("Warning_message").classList.add("hide");
            }
        } else {
            if (document.getElementById("Warning_message").classList.contains("hide")) {
                document.getElementById("Warning_message").classList.remove("hide");
            }
            $("#Warning_message_text").html("{{$Result->get('Message')}}");
        }
        
        init();
    });

    function UnLoadWindow() {
    }

    $(function () {
        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection