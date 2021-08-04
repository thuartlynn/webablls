@extends('layouts.master')

@section('title', 'Add Contact')

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
    @include('contents.app_webablls_contact_add_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_contact_add_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_contact_add_right_bottom_content')
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
        var $myForm = $('#AddContactfrm');
        if(!$myForm[0].checkValidity()) {
            $myForm.find(':submit').click();
        } else {
            $myForm[0].submit();
        }
    }

    $("#Contact_Email").keyup(function() {
        var Contact_Email = document.getElementById("Contact_Email");
        if (Contact_Email.value.length == 0) {
            $("#Contact_Email_Required").html("Contact E-mail address field is required");
            Contact_Email.setCustomValidity("Contact E-mail address field is required");
        } else if (!isEmail(Contact_Email.value)) {
            $("#Contact_Email_Required").html("Contact E-mail address must be vaild");
            Contact_Email.setCustomValidity("Contact E-mail address must be vaild");
        }  else {
            Contact_Email.setCustomValidity("");
        }
    });

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var Contact_Email = document.getElementById("Contact_Email");

            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {

                    if (!isEmail(Contact_Email.value)) {
                        Contact_Email.setCustomValidity("Contact E-mail address must be vaild");
                        event.preventDefault();
                        event.stopPropagation();
	                } else if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    function UnLoadWindow() {
    }

    $(function () {
        $("#actions li").click(function(e) {
            TriggerSubmit();
        });

        $("#contacts li").click(function(e) {
            location.href = $(this).data("path");
        });
        
        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection