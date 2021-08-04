@extends('layouts.master')

@section('title', "Edit Profile")

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

<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
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
    @include('contents.app_webablls_organization_student_roster_edit_profile_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_student_roster_edit_profile_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_student_roster_edit_profile_right_bottom_content')
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

    function TriggerSubmit() {
        var $myForm = $('#editprofilefrm');
        CheckOptions();
        if(!$myForm[0].checkValidity()) {
            $myForm.find(':submit').click();
        } else {
            $myForm[0].submit();
        }
    }

    function CheckBirthDate() {
        var BirthDate = document.getElementById("datepicker");

        if (BirthDate.value.length == 0) {
            $("#BirthDateError").html("Birth Date field is required");
            BirthDate.setCustomValidity("Birth Date field is required");
        } else {
            BirthDate.setCustomValidity("");
        }

        if (BirthDate.value.length != 0 && !dateValidationCheck(BirthDate.value, <?php echo Auth::user()->date_format ?>)) {
            $("#BirthDateError").html("Birth Date format is wrong");
            BirthDate.setCustomValidity("Birth Date format is wrong");
        } else {
            BirthDate.setCustomValidity("");
        }
    }

    $("#datepicker").change(function() {
        CheckBirthDate();
    });

    $("#datepicker").keyup(function() {
        CheckBirthDate();
    });

    $("#FirstName").keyup(function() {
        var FirstName = document.getElementById("FirstName");
        if (!FirstName.value.trim()) {
            FirstName.setCustomValidity("First Name field is required");
        } else {
            FirstName.setCustomValidity("");
        }
    });

    $("#LastNameOrStudentID").keyup(function() {
        var LastNameOrStudentID = document.getElementById("LastNameOrStudentID");
        if (!LastNameOrStudentID.value.trim()) {
            LastNameOrStudentID.setCustomValidity("Last Name field is required");
        } else {
            LastNameOrStudentID.setCustomValidity("");
        }
    });

    $("#City").keyup(function() {
        var City = document.getElementById("City");
        if (!City.value.trim()) {
            City.setCustomValidity("City field is required");
        } else {
            City.setCustomValidity("");
        }
    });

    $("#FirstName").change(function() {
        var FirstName = document.getElementById("FirstName");
        if (!FirstName.value.trim()) {
            FirstName.setCustomValidity("First Name field is required");
        } else {
            FirstName.setCustomValidity("");
        }
    });

    $("#LastNameOrStudentID").change(function() {
        var LastNameOrStudentID = document.getElementById("LastNameOrStudentID");
        if (!LastNameOrStudentID.value.trim()) {
            LastNameOrStudentID.setCustomValidity("Last Name field is required");
        } else {
            LastNameOrStudentID.setCustomValidity("");
        }
    });

    $("#City").change(function() {
        var City = document.getElementById("City");
        if (!City.value.trim()) {
            City.setCustomValidity("City field is required");
        } else {
            City.setCustomValidity("");
        }
    });

    function CheckOptions() {
        var Parameter1;
        var Parameter2;
        var Parameter3;

        var FirstName = document.getElementById("FirstName");
        if (!FirstName.value.trim()) {
            FirstName.setCustomValidity("First Name field is required");
        }

        var LastNameOrStudentID = document.getElementById("LastNameOrStudentID");
        if (!LastNameOrStudentID.value.trim()) {
            LastNameOrStudentID.setCustomValidity("Last Name field is required");
        }

        var City = document.getElementById("City");
        if (!City.value.trim()) {
            City.setCustomValidity("City field is required");
        }

        CheckBirthDate();

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

    function init() {
        var value = "0";
        if (<?php echo Auth::user()->date_format ?> == 0) {
            $( "#datepicker" ).datepicker({dateFormat: 'mm/dd/yy'});
        } else {
            $( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy'});
        }

        $("#Gender_id").get(0).selectedIndex = <?php echo $Profile["Gender"] ?>;
        $("#Ethnicity_id").get(0).selectedIndex = <?php echo $Profile["Ethnicity"] ?>;
        if (<?php echo $SPData[0]["Active"] ?> == 1) {
            if ("<?php echo $Profile["Parameter1"] ?>") {
                value = "<?php echo $Profile["Parameter1"] ?>";
            } else {
                value = "0";
            }
            $('#Parameter1').val(value);
        }
        if (<?php echo $SPData[1]["Active"] ?> == 1) {
            if ("<?php echo $Profile["Parameter2"] ?>") {
                value = "<?php echo $Profile["Parameter2"]?>";
            } else {
                value = "0";
            }
            $('#Parameter2').val(value);
        }
        if (<?php echo $SPData[2]["Active"] ?> == 1) {
            if ("<?php echo $Profile["Parameter3"] ?>") {
                value = "<?php echo $Profile["Parameter3"] ?>";
            } else {
                value = "0";
            }
            $('#Parameter3').val(value);
        }
        $('#SignLang_id').val("<?php echo $Profile["SingLanguage"] ?>");
        $("#Diagnostic_Information_id").get(0).selectedIndex = <?php echo $Profile["Dignostic"] ?>;
        document.getElementById("Notes_id").value = "<?php echo $Profile["Notes"] ?>";
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

    $(function () {
        $("#actions li").click(function(e) {
            if ($(this).data("index") == "Save") {
                TriggerSubmit();
            } else {
                window.location.reload();
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });

    $("#Student li").click(function(e) {
        location.href=$(this).data("path");
    });
</script>
@endsection