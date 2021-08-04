@extends('layouts.master')

@section('title', 'Student_add student')

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

<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-select-country.min.css') }}" rel="stylesheet">

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/js/tool.js') }}"></script>

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_student_addStudent_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_student_addStudent_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_student_addStudent_right_bottom_content')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
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

    function init() {
        var value = "0";

        if (<?php echo Auth::user()->date_format ?> == 0) {
            $( "#datepicker" ).datepicker({
                dateFormat: 'mm/dd/yy',
                minDate: "01/01/1000", 
                maxDate: "12/31/9999"
                });
        } else {
            $( "#datepicker" ).datepicker({
                dateFormat: 'dd/mm/yy',
                minDate: "01/01/1000", 
                maxDate: "31/12/9999"
                });
        }
        
    }

    function CheckBirthDate() {
        var birthDate = document.getElementById("datepicker");

        if (birthDate.value.length == 0) {
            $("#invalid-date").html("Birth Date field is required");
            birthDate.setCustomValidity("Birth Date field is required");
        } else {
            birthDate.setCustomValidity("");
        }

        if (birthDate.value.length != 0 && !dateValidationCheck(birthDate.value, <?php echo Auth::user()->date_format ?>)) {
            $("#invalid-date").html("Please confirm the format");
            birthDate.setCustomValidity("Please confirm the format");
        } else {
            birthDate.setCustomValidity("");
        }
    }

    function CheckSpace() {
        let firstName = document.getElementById("studentFirstname");
        if (!firstName.value.trim()) {
            firstName.setCustomValidity("First Name field is required");
        } else {
            firstName.setCustomValidity("");
        }

        let lastName = document.getElementById("studentLastname");
        if (!lastName.value.trim()) {
            lastName.setCustomValidity("Last Name field is required");
        } else {
            lastName.setCustomValidity("");
        }

        let cityName = document.getElementById("City");
        if (!cityName.value.trim()) {
            cityName.setCustomValidity("City field is required");
        } else {
            cityName.setCustomValidity("");
        }
        
    }

    $(document).ready(function() {
        init();

        $("#datepicker").change(function() {
            CheckBirthDate();
        });

        $("#datepicker").keyup(function() {
            CheckBirthDate();
        });

        $("input[type='text']").change(function() {
            CheckSpace();
        });

        $("input[type='text']").keyup(function() {
            CheckSpace();
        });
    });

    function CheckOptions() {
        var Parameter1;
        var Parameter2;
        var Parameter3;

        if (<?php echo $SPData[0]["Active"] ?> == 1) {
            Parameter1 = document.getElementById("Parameter1");
        }
        if (<?php echo $SPData[1]["Active"] ?> == 1) {
            Parameter2 = document.getElementById("Parameter2");
        }
        if (<?php echo $SPData[2]["Active"] ?> == 1) {
            Parameter3 = document.getElementById("Parameter3");
        }

        if ((<?php echo $SPData[0]["Active"] ?> == 1) && (<?php echo $SPData[0]["Rrquire"] ?> == 1)) {
            if ($("#Parameter1").get(0).selectedIndex == 0) {
                Parameter1.setCustomValidity("Options field is required");
            } else {
                Parameter1.setCustomValidity("");
            }
        }

        if ((<?php echo $SPData[1]["Active"] ?> == 1) && (<?php echo $SPData[1]["Rrquire"] ?> == 1)) {
            if ($("#Parameter2").get(0).selectedIndex == 0) {
                Parameter2.setCustomValidity("Options field is required");
            } else {
                Parameter2.setCustomValidity("");
            }
        }

        if ((<?php echo $SPData[2]["Active"] ?> == 1) && (<?php echo $SPData[2]["Rrquire"] ?> == 1)) {
            if ($("#Parameter3").get(0).selectedIndex == 0) {
                Parameter3.setCustomValidity("Options field is required");
            } else {
                Parameter3.setCustomValidity("");
            }
        }
    }
    
    (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            document.getElementById('saveaddstudent').addEventListener('click', function(event) {
                CheckSpace();
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(".fileCoordinator").prop("disabled",false);
                form.classList.add('was-validated');
            }, false);
            document.getElementById('saveS&newassess').addEventListener('click', function(event) {
                CheckSpace();
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(".fileCoordinator").prop("disabled",false);
                form.classList.add('was-validated');
            }, false);
            document.getElementById('saveS&newstudent').addEventListener('click', function(event) {
                CheckSpace();
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(".fileCoordinator").prop("disabled",false);
                form.classList.add('was-validated');
            }, false);
        });
        }, false);
    })();

    window.onbeforeunload = UnLoadWindow;

</script>


@endsection