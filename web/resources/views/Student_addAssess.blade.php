
@extends('layouts.master')

@section('title', "Add Assessment")

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
  @include('contents.app_webablls_addAssess_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
  @include('contents.app_webablls_addAssess_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
  @include('contents.app_webablls_addAssess_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')

<script type="text/javascript">
    var StudentID = <?php echo $NewAssInfo["ID"] ?>;
    const Permission = <?php echo $NewAssInfo->get('Permission'); ?>;

    function UnLoadWindow() {
    }

    function TriggerSubmit() {
            var myForm = $('#addAssess');
            if(!myForm[0].checkValidity()) {
                myForm.find(':submit').click();
            } else {
                myForm[0].submit();
            }
    }

    function init() {
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

        if (<?php echo $NewAssInfo["UsedColor"];?> == "") {
            $('#TGV').addClass("app-disable");
            $('#SAssess').addClass("app-disable");
            $('#StudentNotes').addClass("app-disable");
        } else {
            $('#TGV').removeClass("app-disable");
            $('#SAssess').removeClass("app-disable");
            $('#StudentNotes').removeClass("app-disable");
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

    $(document).ready(function() {
        init();

        $("#actions li").click(function(e) {
            if ($(this).data("index") == "Continue") {
                TriggerSubmit();
            }
        });

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