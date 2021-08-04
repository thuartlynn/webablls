@extends('layouts.master')

<?php
  $name = "";
  if (Auth::user()->name_format == 0) {
    $name = "Set User Password / ".Auth::user()->last_name." ".Auth::user()->first_name." (".Auth::user()->email.")";
  } else {
    $name = "Set User Password / ".Auth::user()->first_name." ".Auth::user()->last_name." (".Auth::user()->email.")";
  }
?>
@section('title', $name)

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
<script src="{{ asset('/js/tool.js') }}"></script>

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_organization_manage_set_user_password_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_manage_set_user_password_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_manage_set_user_password_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    function Listener(event) {
        var NewPassword = document.getElementById("NewPassword");
        var ConfirmNewPassword = document.getElementById("ConfirmNewPassword");

        var listinputpw9 = document.getElementById("list-input-pw-9");
        var listinputpwlower = document.getElementById("list-input-pw-lower");
        var listinputpwupper = document.getElementById("list-input-pw-upper");
        var listinputpwspecial = document.getElementById("list-input-pw-special");
        var listinputpwcheck = document.getElementById("list-input-pw-check");

        var listinputpw9_v = document.getElementById("list-input-pw-9-v");
        var listinputpwlower_v = document.getElementById("list-input-pw-lower-v");
        var listinputpwupper_v = document.getElementById("list-input-pw-upper-v");
        var listinputpwspecial_v = document.getElementById("list-input-pw-special-v");
        var listinputpwcheck_v = document.getElementById("list-input-pw-check-v");

        if (NewPassword.value.length >= 9) {
            listinputpw9_v.classList.remove("app-disappear");
            listinputpw9.classList.add("app-disappear");
        } else {
            listinputpw9_v.classList.add("app-disappear");
            listinputpw9.classList.remove("app-disappear");
        }

        if (hasLowercase(NewPassword.value)) {
            listinputpwlower_v.classList.remove("app-disappear");
            listinputpwlower.classList.add("app-disappear");
        } else {
            listinputpwlower_v.classList.add("app-disappear");
            listinputpwlower.classList.remove("app-disappear");
        }

        if (hasCapital(NewPassword.value)) {
            listinputpwupper_v.classList.remove("app-disappear");
            listinputpwupper.classList.add("app-disappear");
        } else {
            listinputpwupper_v.classList.add("app-disappear");
            listinputpwupper.classList.remove("app-disappear");
        }

        if (hasOther(NewPassword.value) || hasNumber(NewPassword.value)) {
            listinputpwspecial_v.classList.remove("app-disappear");
            listinputpwspecial.classList.add("app-disappear");
        } else {
            listinputpwspecial_v.classList.add("app-disappear");
            listinputpwspecial.classList.remove("app-disappear");
        }

        if ((ConfirmNewPassword.value == NewPassword.value) && ConfirmNewPassword.value.length > 0) {
            listinputpwcheck_v.classList.remove("app-disappear");
            listinputpwcheck.classList.add("app-disappear");
        } else {
            listinputpwcheck_v.classList.add("app-disappear");
            listinputpwcheck.classList.remove("app-disappear");
        }

        if ((listinputpw9.classList.contains("app-disappear")) &&
            (listinputpwlower.classList.contains("app-disappear")) &&
            (listinputpwupper.classList.contains("app-disappear")) &&
            (listinputpwspecial.classList.contains("app-disappear")) &&
            (listinputpwcheck.classList.contains("app-disappear"))) {
            $('#submit').removeAttr('disabled');
            //$('#ChangePassword').removeClass("app-disable");
        } else {
            $('#submit').attr('disabled', 'disabled');
            //$('#ChangePassword').addClass("app-disable");
        }
    }

    $(document).ready(function() {
    
        $('#submit').attr('disabled', 'disabled');
    });

    function UnLoadWindow() {
    }

    $(function () {
        $("#actions li").click(function(e) {
            if ($(this).data("path") != "") {
                location.href=$(this).data("path");
            } else {
                if (!$('#ChangePassword').hasClass("app-disable")) {
                    var $myForm = $('#SetPasswordfrm');
                    $myForm.find(':submit').click();
                }
            }
        });
        
        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection