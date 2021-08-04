<?php
    $Students = array( 0=>array("FirstName"=>"H", "LastName"=>"W", "ID"=>"11128"),
                       1=>array("FirstName"=>"H", "LastName"=>"William", "ID"=>"11301"));
?>

@extends('layouts.master')

@section('title', 'Renew Order')

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
    @include('contents.app_webablls_organization_reneworder_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_reneworder_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_reneworder_right_bottom_content')
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

        $("input").click(function(e) {
            /*var validated = false;
            var seats_number_id = document.getElementById("seats_number");
            if ($("#organizationreneworderfrm").hasClass("was-validated")) {
                validated = true;
            }*/
            if ($(this).attr("id") == "select_students") {
                if ($("#students").hasClass("app-disappear")) {
                    $("#students").removeClass("app-disappear");
                }
                if (!$("#seats").hasClass("app-disappear")) {
                    $("#seats").addClass("app-disappear");
                }
                /*if (validated) {
                    seats_number_id.setCustomValidity("");
                }*/
            } else if ($(this).attr("id") == "input_number") {
                if ($("#seats").hasClass("app-disappear")) {
                    $("#seats").removeClass("app-disappear");
                }
                if (!$("#students").hasClass("app-disappear")) {
                    $("#students").addClass("app-disappear");
                }
                /*if (validated) {
                    if (seats_number_id.value == 0) {
                        seats_number_id.setCustomValidity("error");
                    } else {
                        seats_number_id.setCustomValidity("");
                    }
                }*/
            } else if ($(this).attr("id") == "all") {
                if (!$("#seats").hasClass("app-disappear")) {
                    $("#seats").addClass("app-disappear");
                }
                if (!$("#students").hasClass("app-disappear")) {
                    $("#students").addClass("app-disappear");
                }
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });

    function valueCheck(object) {
        var forms = document.getElementsByClassName('needs-validation');
        var seats_number_id = document.getElementById("seats_number");
        if (seats_number_id.value < 0) {
            seats_number_id.value = 0;
        }

        /*if ($("#organizationreneworderfrm").hasClass("was-validated")) {
            if (seats_number_id.value == 0) {
                seats_number_id.setCustomValidity("error");
            } else {
                seats_number_id.setCustomValidity("");
            }
        }*/
    }

    $('#seats_number').blur(function() {
        if ($('#seats_number').val() == "") {
            $('#seats_number').val(0);
        }
    });

    function init() {
        document.getElementById("all").checked = true;
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

                    /*var input_number = document.getElementById("input_number").checked;
                    var seats_number_id = document.getElementById("seats_number");
                    if (input_number && seats_number_id.value == 0) {
                        seats_number_id.setCustomValidity("error");
                    }*/

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