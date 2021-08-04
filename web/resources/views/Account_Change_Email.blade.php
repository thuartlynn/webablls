@extends('layouts.master')

@section('title', 'Change email')

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
    @include('contents.app_webablls_account_change_email_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_account_change_email_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_account_change_email_right_bottom_content')
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
        var $myForm = $('#ChangeEmailfrm');
        CheckOptions();
        if(!$myForm[0].checkValidity()) {
            $myForm.find(':submit').click();
        } else {
            $myForm[0].submit();
        }
    }

    $("#New_email").keyup(function() {
        var New_email = document.getElementById("New_email");
        if (New_email.value.length == 0) {
            $("#Required").html("Email field is required");
            New_email.setCustomValidity("Email field is required");
        } else if (!isEmail(New_email.value)) {
            $("#Required").html("Email must be vaild");
            New_email.setCustomValidity("Email must be vaild");
        }  else {
            New_email.setCustomValidity("");
        }
    });

    $("#Confirm_new_email").keyup(function() {
        var New_email = document.getElementById("New_email");
        var Confirm_Email = document.getElementById("Confirm_new_email");
        if (Confirm_Email.value.length == 0) {
            $("#confirmRequired").html("Email confirmation is required");
            Confirm_Email.setCustomValidity("Email confirmation is required");
        } else if (!isEmail(Confirm_Email.value)) {
            $("#confirmRequired").html("Email must be vaild");
            Confirm_Email.setCustomValidity("Email must be vaild");
        } else if (New_email.value != Confirm_Email.value) {
            $("#confirmRequired").html("Email and confirmation must match");
            Confirm_Email.setCustomValidity("Email and confirmation must match");
        } else {
            Confirm_Email.setCustomValidity("");
        }
    });

    $("#New_email").change(function() {
        var New_email = document.getElementById("New_email");
        if (New_email.value.length == 0) {
            $("#Required").html("Email field is required");
            New_email.setCustomValidity("Email field is required");
        } else if (!isEmail(New_email.value)) {
            $("#Required").html("Email must be vaild");
            New_email.setCustomValidity("Email must be vaild");
        }  else {
            New_email.setCustomValidity("");
        }
    });

    $("#Confirm_new_email").change(function() {
        var New_email = document.getElementById("New_email");
        var Confirm_Email = document.getElementById("Confirm_new_email");
        if (Confirm_Email.value.length == 0) {
            $("#confirmRequired").html("Email confirmation is required");
            Confirm_Email.setCustomValidity("Email confirmation is required");
        } else if (!isEmail(Confirm_Email.value)) {
            $("#confirmRequired").html("Email must be vaild");
            Confirm_Email.setCustomValidity("Email must be vaild");
        } else if (New_email.value != Confirm_Email.value) {
            $("#confirmRequired").html("Email and confirmation must match");
            Confirm_Email.setCustomValidity("Email and confirmation must match");
        } else {
            Confirm_Email.setCustomValidity("");
        }
    });

    function CheckOptions() {
        var New_email = document.getElementById("New_email");
        var Confirm_Email = document.getElementById("Confirm_new_email");

        if (New_email.value.length == 0) {
            $("#Required").html("Email field is required");
            New_email.setCustomValidity("Email field is required");
        } else if (!isEmail(New_email.value)) {
            $("#Required").html("Email must be vaild");
            New_email.setCustomValidity("Email must be vaild");
        }  else {
            New_email.setCustomValidity("");
        }

        if (Confirm_Email.value.length == 0) {
            $("#confirmRequired").html("Email confirmation is required");
            Confirm_Email.setCustomValidity("Email confirmation is required");
        } else if (!isEmail(Confirm_Email.value)) {
            $("#confirmRequired").html("Email must be vaild");
            Confirm_Email.setCustomValidity("Email must be vaild");
        } else if (New_email.value != Confirm_Email.value) {
            $("#confirmRequired").html("Email and confirmation must match");
            Confirm_Email.setCustomValidity("Email and confirmation must match");
        } else {
            Confirm_Email.setCustomValidity("");
        }
    }

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var New_email = document.getElementById("New_email");
            var Confirm_Email = document.getElementById("Confirm_new_email");

            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {

                    CheckOptions();
	                if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $(document).ready(function() {
        if ("{{$Result->get('ChangeResult')}}" != "PANDING") {
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