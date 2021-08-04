@extends('layouts.master')

@section('title', 'Student Profile')

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
    @include('contents.app_webablls_s_profile_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_s_profile_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_s_profile_right_bottom_content')
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
    var StudentID = <?php echo ''.$Profile["ID"].'' ?>;
    const Permission = <?php echo $Profile->get('Permission'); ?>;
    //const Permission2 = "Iv"; 測試用

    function TriggerSubmit() {
        var myForm = $('#Profilefrm');
        CheckSpace();
        if ($("#actions").hasClass("disable")) {
            //alert("you have no rights.");
            $("#actions li").removeAttr("onclick");
        } else if(!myForm[0].checkValidity()) {
            myForm.find(':submit').click();
        } else {
            myForm[0].submit();
        }
    }

    function UnLoadWindow() {
    }

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

    function init() {

        var value = "0";
        if (<?php echo Auth::user()->date_format ?> == 0) {
            $( "#datepicker" ).datepicker({
                dateFormat: 'mm/dd/yy'
            });
        } else {
            $( "#datepicker" ).datepicker({
                dateFormat: 'dd/mm/yy'
            });
        }

        if (<?php echo $Profile->get("HasAssessment");?> != 1) {
            $('#TGV').addClass("app-disable");
            $('#SAssess').addClass("app-disable");
            $('#StudentNotes').addClass("app-disable");
        } else {
            $('#TGV').removeClass("app-disable");
            $('#SAssess').removeClass("app-disable");
            $('#StudentNotes').removeClass("app-disable");
        }

        $("#ethnicity").get(0).selectedIndex = <?php echo $Profile->get("Ethnicity")?>;        
        $("#Gender").get(0).selectedIndex = <?php echo $Profile->get("Gender")?>;
        if (<?php echo $SPData[0]["Active"] ?> == 1) {
            if ("<?php echo $Profile["Parameter1"] ?>") {
                value = "<?php echo $Profile["Parameter1"] ?>";
            } else {
                value = "";
            }
            $('#Parameter1').val(value);
        }
        if (<?php echo $SPData[1]["Active"] ?> == 1) {
            if ("<?php echo $Profile["Parameter2"] ?>") {
                value = "<?php echo $Profile["Parameter2"]?>";
            } else {
                value = "";
            }
            $('#Parameter2').val(value);
        }
        if (<?php echo $SPData[2]["Active"] ?> == 1) {
            if ("<?php echo $Profile["Parameter3"] ?>") {
                value = "<?php echo $Profile["Parameter3"] ?>";
            } else {
                value = "";
            }
            $('#Parameter3').val(value);
        }
        document.getElementById("SingLanguage_id").value ="<?php echo $Profile->get("SingLanguage")?>";
        $("#Dignostic_id").get(0).selectedIndex = <?php echo $Profile->get("Dignostic")?>;
        document.getElementById("Notes_id").value ="<?php echo $Profile->get("Notes")?>";

        if (!Check_Permission("View Summary", Permission)) {
            $('#ViewSummary').addClass("app-disable");
        }

        if (!Check_Permission("View Profile", Permission)) {
            $('#ViewProfile').addClass("app-disable");
        }

        if (!Check_Permission("Total Grid View", Permission)) {
            $('#TGV').addClass("app-disable");
        }

        if (!Check_Permission("Student Assessment", Permission)) {
            $('#SAssess').addClass("app-disable");
        }

        if (!Check_Permission("Share Student", Permission)) {
            $('#ShareStudent').addClass("app-disable");
        }
                
        if (!Check_Permission("Student History", Permission)) {
            $('#StudentHistory').addClass("app-disable");
        }

        if (!Check_Permission("Student Files", Permission)) {
            $('#StudentFiles').addClass("app-disable");
        }

        if (!Check_Permission("Student Notes", Permission)) {
            $('#StudentNotes').addClass("app-disable");
        }

        if (!Check_Permission("Add Assessment", Permission)) {
            $('#AddAssessment').addClass("app-disable");
        }

        if (!Can_Edit("Student", Permission)) {
            $("#actions").addClass("disable");
            $("input").attr('disabled', true);
            $("select").attr('disabled', true);
            $("textarea").attr('disabled', true);
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

        // var ansIv = Permission.some(function(item, index, array){
        //     return item === 'Iv';
        // });
        // var ansIm = Permission.some(function(item, index, array){
        //     return item === 'Im';
        // });

        // if ( ansIv === true ){
        //     $("#actions").addClass("disable");
        //     $("input").attr('disabled', true);
        //     $("select").attr('disabled', true);
        //     $("textarea").attr('disabled', true);
        // } else {
        //     $("#actions").removeClass("disable");
        //     $("input").attr('disabled', false);
        //     $("select").attr('disabled', false);
        //     $("textarea").attr('disabled', false);
        // }

        window.onbeforeunload = UnLoadWindow;
    });

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
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

</script>

@endsection