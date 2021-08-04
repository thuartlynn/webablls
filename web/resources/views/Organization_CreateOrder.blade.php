<?php
$fake_length = 1;
$fake_extended_seats = 1;
$fake_additional_seats = 1;
$fake_total_seats = 2;
$fake_add_or_activate = 0;
?>

@extends('layouts.master')

@section('title', 'Create Order')

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

    input { 
        border-width: 2px;
    }
</style>

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_organization_createorder_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_createorder_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_createorder_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script src="{{ asset('js/bootstrap-select-country.min.js') }}"></script>

<script type="text/javascript">

    function UnLoadWindow() {
    }

    $(function () {

        window.onbeforeunload = UnLoadWindow;
    });

    function add() {
        var txt = document.getElementById("additional_seats");
        var a = txt.value;
        a++;
        txt.value = a;

        /*if (txt.value > <?php echo $fake_total_seats?>) {
            txt.value = <?php echo $fake_total_seats?>;
        }*/
        seatsCheck();
    }
    
    function sub() {
        var txt = document.getElementById("additional_seats");
        var a = txt.value;

        if(a > 1) {
            a--;
            txt.value = a;
        } else {
            txt.value = 0;
        }
        seatsCheck();
    }

    function length_change() {
        var length_id = document.getElementById("length");
        var index = $("#length").get(0).selectedIndex;
        var forms = document.getElementsByClassName('needs-validation');
        var flag = false;
        var validated = false;

        if ($("#organizationcreateorderfrm").hasClass("was-validated")) {
            validated = true;
        }

        if (index == 0) {
            flag = true;
            length_id.setCustomValidity("error");
            if (validated && $("#error_message_1").hasClass("app-disappear")) {
                $("#error_message_1").removeClass("app-disappear");
            }
        } else {
            length_id.setCustomValidity("");
            if (validated &&  !$("#error_message_1").hasClass("app-disappear")) {
                $("#error_message_1").addClass("app-disappear");
            }
        }
        seatsCheck();
        $("#renew").prop("disabled", flag);
        $("#additional_seats").prop("disabled", flag);
        $("#seatsnumber_add").prop("disabled", flag);
        $("#seatsnumber_sub").prop("disabled", flag);
        $("#Add").prop("disabled", flag);
        $("#Activate").prop("disabled", flag);
    }

    function seatsCheck() {
        var forms = document.getElementsByClassName('needs-validation');
        var additional_seats_id = document.getElementById("additional_seats");
        var index = $("#length").get(0).selectedIndex;
        var seats = $('#additional_seats').val();
        var validated = false;

        if ($("#organizationcreateorderfrm").hasClass("was-validated")) {
            validated = true;
        }

        if (seats == 0) {
            additional_seats_id.setCustomValidity("error");
            if (validated && $("#error_message_2").hasClass("app-disappear")) {
                $("#error_message_2").removeClass("app-disappear");
            }
        } else {
            additional_seats_id.setCustomValidity("");
            if (validated &&  !$("#error_message_2").hasClass("app-disappear")) {
                $("#error_message_2").addClass("app-disappear");
            }
        }
    }

    function maxLengthCheck(object) {
        var txt = document.getElementById("additional_seats");
        /*if (txt.value > <?php echo $fake_total_seats?>) {
            txt.value = <?php echo $fake_total_seats?>;
        } else*/ if (txt.value < 0) {
            txt.value = 0;
        }
        seatsCheck();
    }

    $('#additional_seats').blur(function() {
        if ($('#additional_seats').val() == "") {
            $('#additional_seats').val(0);
        }
    });

    function submitCheck() {
        if (!$("#error_message_1").hasClass("app-disappear") || !$("#error_message_2").hasClass("app-disappear")) {
            $("#Confirm").prop("disabled", true);
        } else {
            $("#Confirm").prop("disabled", false);
        }
    }

    function init() {
        $("#length").get(0).selectedIndex = <?php echo $fake_length?>;
        $('#additional_seats').val("<?php echo $fake_additional_seats?>");

        if (<?php echo $fake_add_or_activate?> == "0") {
            document.getElementById("Add").checked = true;
        } else {
            document.getElementById("Activate").checked = true;
        }

        length_change();
    }

    $(document).ready(function() {

        init();
    });

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {

                    var length_id = document.getElementById("length");
                    var additional_seats_id = document.getElementById("additional_seats");
                    var index = $("#length").get(0).selectedIndex;
                    var seats = $('#additional_seats').val();

                    if (index == 0) {
                        if ($("#error_message_1").hasClass("app-disappear")) {
                            $("#error_message_1").removeClass("app-disappear");
                        }
                        length_id.setCustomValidity("error");
                    }
                    
                    if (seats == 0) {
                        if ($("#error_message_2").hasClass("app-disappear")) {
                            $("#error_message_2").removeClass("app-disappear");
                        }
                        additional_seats_id.setCustomValidity("error");
                    }

                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection