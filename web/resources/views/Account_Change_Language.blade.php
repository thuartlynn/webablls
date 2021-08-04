@extends('layouts.master')

@section('title', 'Change Language')

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

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_account_change_language_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_account_change_language_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_account_change_language_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    function TriggerSubmit() {
        var $myForm = $('#LanguageChangefrm');
        if(!$myForm[0].checkValidity()) {
            $myForm.find(':submit').click();
        } else {
            $myForm[0].submit();
        }
    }

    function init() {
        $("#Language_id").get(0).selectedIndex = <?php echo Auth::user()->language?>;
    }

    $(document).ready(function() {

        init();

        document.getElementById("Warning_message").classList.add("hide");
        if ("{{$Result->get('ChangeResult')}}" == "PANDING") {
            if (!document.getElementById("Warning_message").classList.contains("hide")) {
                document.getElementById("Warning_message").classList.add("hide");
            }
        } else {
            if (document.getElementById("Warning_message").classList.contains("hide") && "{{$Result->get('Message')}}" != "") {
                document.getElementById("Warning_message").classList.remove("hide");
            }
            $("#Warning_message_text").html("{{$Result->get('Message')}}");
        }
    });

    function UnLoadWindow() {
    }

    $(function () {
        $("#actions li").click(function(e) {
            if ($(this).data("path") != "")
                location.href=$(this).data("path");
        });
        
        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection