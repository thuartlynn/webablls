@extends('layouts.master')

@section('title', 'Assessment Detail')

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
    
    .test > input[type="radio"] + label, .test .usedlable {
        margin: 6px; 
        vertical-align: top; 
        width: 20px; 
        height: 20px;
        border: 1px solid #000000; 
        display: inline-block;
    }

    .test .usedlable { margin:7px; }

    .test > input[type="radio"]:checked + label {
        border: 3px solid #DE2E14; 
    }

    .colorpalette3 {
        /* vertical-align: top;  */
        width: 20px; 
        height: 20px; 
        filter:alpha(Opacity=80);
        -moz-opacity:0.8;
        opacity: 0.8;
        z-index:100; 
        background-image: url(/images/no-png-icon-red.png);
        background-repeat: no-repeat;
        background-size: cover;
        display: inline-block;
    }

</style>

<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

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
    @include('contents.app_webablls_s_assessment_detail_left_pan')
</div>
@endsection
    
@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_s_assessment_detail_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_s_assessment_detail_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')

<script type="text/javascript">
    var StudentID = <?php echo $Ass_Detail->get('ID') ?>;
    const Permission = <?php echo $Ass_Detail->get('Permission'); ?>;

    function UnLoadWindow() {}

    function TriggerSubmit() {
        var myForm = $('#addAssess');
        if ($("#actions").hasClass("app-disable")) {
            $("#actions li").removeAttr("onclick");
        } else if(!myForm[0].checkValidity()) {
            myForm.find(':submit').click();
        } else {
            myForm[0].submit();
        }
    }

    function init() {

        if (<?php echo Auth::user()->date_format ?> == 0) {
            $( "#datepicker" ).datepicker({
                dateFormat: 'mm/dd/yy',
            });
        } else {
            $( "#datepicker" ).datepicker({
                dateFormat: 'dd/mm/yy',
            });
        }

        $("#GradeLevel_id").get(0).value = "<?php echo $Ass_Detail->get("Grade_Level"); ?>";
        $("#program_level_1").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[0]["ProgramLevel"]; ?>";
        $("#other_1").get(0).value = "<?php echo $Ass_Detail->get("Paramter")[0]["Others"]; ?>";
        $("#average_hours_1").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[0]["AvgTime"]; ?>";

        $("#program_level_2").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[1]["ProgramLevel"]; ?>";
        $("#other_2").get(0).value = "<?php echo $Ass_Detail->get("Paramter")[1]["Others"]; ?>";
        $("#average_hours_2").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[1]["AvgTime"]; ?>";

        $("#program_level_3").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[2]["ProgramLevel"]; ?>";
        $("#other_3").get(0).value = "<?php echo $Ass_Detail->get("Paramter")[2]["Others"]; ?>";
        $("#average_hours_3").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[2]["AvgTime"]; ?>";

        $("#program_level_4").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[3]["ProgramLevel"]; ?>";
        $("#other_4").get(0).value = "<?php echo $Ass_Detail->get("Paramter")[3]["Others"]; ?>";
        $("#average_hours_4").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[3]["AvgTime"]; ?>";

        $("#program_level_5").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[4]["ProgramLevel"]; ?>";
        $("#other_5").get(0).value = "<?php echo $Ass_Detail->get("Paramter")[4]["Others"]; ?>";
        $("#average_hours_5").get(0).selectedIndex = "<?php echo $Ass_Detail->get("Paramter")[4]["AvgTime"]; ?>";

        // var ans = Permission.some(function(item, index, array){
        //     return item === 'Av';
        // });
        // if ( ans === true ){
        //     $("#actions").addClass("disable");   
        // } else {
        //     $("#actions").removeClass("disable"); 
        // }

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

        if (!Can_Edit("Assessment", Permission)) {
            $("input").attr('disabled', true);
            $("select").attr('disabled', true);
            $("textarea").attr('disabled', true);
            $('#actions').addClass("app-disable");
        } else {
            $('#actions').removeClass("app-disable");
        }

    }

    function CheckAssessDate() {
        var assessDate = document.getElementById("datepicker");

        if (assessDate.value.length == 0) {
            $("#invalid-date").html("Please fill out this field.");
            assessDate.setCustomValidity("Please fill out this field.");
        } else {
            assessDate.setCustomValidity("");
        }

        if (assessDate.value.length != 0 && !dateValidationCheck(assessDate.value, <?php echo Auth::user()->date_format ?>)) {
            $("#invalid-date").html("Please confirm the format");
            assessDate.setCustomValidity("Please confirm the format");
        } else {
            assessDate.setCustomValidity("");
        }
    }

    $(function () {
        init();

        $("#datepicker").change(function() {
            CheckAssessDate();
        });

        $("#datepicker").keyup(function() {
            CheckAssessDate();
        });

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