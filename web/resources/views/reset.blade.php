@extends('layouts.master')

@section('title', 'WebABLLS - Reset')

@section('head')

<style>

    html {
        background-color: #efeeef;
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
        margin-top:4rem;
        margin-bottom:4rem;
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
    #msg { color: red; }

    #all_error_msg { 
        color: red;   
        padding:2px 5px;
    }

    #send_pwd_msg {
        width: 100%;
        text-align: center;
        height: 48px;
        line-height: 48px;
        background-color: rgb(250,220,50);
        color: rgb(80,80,80);
        margin: 0;
        padding: 0;
    }
</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/tool.js') }}"></script>

@endsection

@section('header')
<div class="page_header">
    @include('contents.login_header')
</div>
@endsection

@section('top_content')
<div class="top_content">
    @include('contents.reset_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.index_footer')
</div>
@endsection

@section('script')

<script type="text/javascript">
    var form = document.getElementById("resetForm");
    var listinputpw9 = document.getElementById("list-input-pw-9");
    var listinputpwlower = document.getElementById("list-input-pw-lower");
    var listinputpwupper = document.getElementById("list-input-pw-upper");
    var listinputpwspecial = document.getElementById("list-input-pw-special");
    var listinputpwcheck = document.getElementById("list-input-pw-check");

    function Listener(event) {
        var NewPassword = document.getElementById("NewPassword");
        var ConfirmNewPassword = document.getElementById("ConfirmNewPassword");
        var listinputpw9 = document.getElementById("list-input-pw-9");
        var listinputpwlower = document.getElementById("list-input-pw-lower");
        var listinputpwupper = document.getElementById("list-input-pw-upper");
        var listinputpwspecial = document.getElementById("list-input-pw-special");
        var listinputpwcheck = document.getElementById("list-input-pw-check");

        if (NewPassword.value.length >= 9) {
            if (listinputpw9.classList.contains("list-group-item-danger")) {
                
                listinputpw9.classList.remove("list-group-item-danger");
                listinputpw9.classList.add("list-group-item-success");
            }
        } else {
            if (listinputpw9.classList.contains("list-group-item-success")) {
                listinputpw9.classList.remove("list-group-item-success");
                listinputpw9.classList.add("list-group-item-danger");
            }
        }

        if (NewPassword.value.match(/^.*[a-z]+.*$/) && NewPassword.value != null) {
            if (listinputpwlower.classList.contains("list-group-item-danger")) {
                listinputpwlower.classList.remove("list-group-item-danger");
                listinputpwlower.classList.add("list-group-item-success");
            }
        } else {
            if (listinputpwlower.classList.contains("list-group-item-success")) {
                listinputpwlower.classList.remove("list-group-item-success");
                listinputpwlower.classList.add("list-group-item-danger");
            }
        }

        if (NewPassword.value.match(/^.*[A-Z]+.*$/) && NewPassword.value != null) {
            if (listinputpwupper.classList.contains("list-group-item-danger")) {
                listinputpwupper.classList.remove("list-group-item-danger");
                listinputpwupper.classList.add("list-group-item-success");
            }
        } else {
            if (listinputpwupper.classList.contains("list-group-item-success")) {
                listinputpwupper.classList.remove("list-group-item-success");
                listinputpwupper.classList.add("list-group-item-danger");
            }
        }

        if (NewPassword.value.match(/^.*[!@#$%^&*]+.*$/) || NewPassword.value.match(/^.*[0-9]+.*$/) && NewPassword.value != null) {
            if (listinputpwspecial.classList.contains("list-group-item-danger")) {
                listinputpwspecial.classList.remove("list-group-item-danger");
                listinputpwspecial.classList.add("list-group-item-success");
            }
        } else {
            if (listinputpwspecial.classList.contains("list-group-item-success")) {
                listinputpwspecial.classList.remove("list-group-item-success");
                listinputpwspecial.classList.add("list-group-item-danger");
            }
        }

        if ((ConfirmNewPassword.value == NewPassword.value) && ConfirmNewPassword.value.length > 0) {
            if (listinputpwcheck.classList.contains("list-group-item-danger")) {
                listinputpwcheck.classList.remove("list-group-item-danger");
                listinputpwcheck.classList.add("list-group-item-success");
            }
        } else {
            if (listinputpwcheck.classList.contains("list-group-item-success")) {
                listinputpwcheck.classList.remove("list-group-item-success");
                listinputpwcheck.classList.add("list-group-item-danger");
            }
        }

        if ((listinputpw9.classList.contains("list-group-item-success")) &&
            (listinputpwlower.classList.contains("list-group-item-success")) &&
            (listinputpwupper.classList.contains("list-group-item-success")) &&
            (listinputpwspecial.classList.contains("list-group-item-success")) &&
            (listinputpwcheck.classList.contains("list-group-item-success"))) {
                $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
        }
    }

    $(document).ready(function() {
        $('#submit').attr('disabled', 'disabled');
    });
</script>
@endsection