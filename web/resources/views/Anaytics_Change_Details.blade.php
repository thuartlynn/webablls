<?php
    $Faker = array( 0=>array("Student_Name"=> "William H",
                             "Student_ID"=>"11301",
                             "Assigned_ID"=>"731",
                             "Assigned_Date"=> "01/17/2020",
                             "Assessments"=>array(0=>array("Color"=>"#00bfff",
                                                           "Select"=>"0",
                                                           "Text"=>"Assessment 11/03/2019 (age 2 years, 11 months)"),
                                                  1=>array("Color"=>"#123456",
                                                           "Select"=>"1",
                                                           "Text"=>"Assessment 08/12/2020 (age 2 years, 11 months)")),
                             "Output_Options"=>array(0=>array("0"=>"0",
                                                              "1"=>"1")),
                             "Section_Analysis"=>array(0=>array("0"=>"1",
                                                                "1"=>"0",
                                                                "2"=>"0",
                                                                "3"=>"0",
                                                                "4"=>"0",
                                                                "5"=>"0")),
                             "Category_Analysis"=>array(0=>array("A"=>"1",
                                                                 "B"=>"0",
                                                                 "C"=>"0",
                                                                 "D"=>"0",
                                                                 "E"=>"0",
                                                                 "F"=>"0",
                                                                 "G"=>"0",
                                                                 "H"=>"0",
                                                                 "I"=>"0",
                                                                 "J"=>"0",
                                                                 "K"=>"0",
                                                                 "L"=>"0",
                                                                 "M"=>"0",
                                                                 "N"=>"0",
                                                                 "P"=>"0",
                                                                 "Q"=>"0",
                                                                 "R"=>"0",
                                                                 "S"=>"0",
                                                                 "T"=>"0",
                                                                 "U"=>"0",
                                                                 "V"=>"0",
                                                                 "W"=>"0",
                                                                 "X"=>"0",
                                                                 "Y"=>"0",
                                                                 "Z"=>"0")),
                             "Include_Normative_Data"=> "1",
                             "Select_Age"=> "3",
                             "Select_Age_Options"=>array(0=>array("0"=>"1 mounths",
                                                                  "1"=>"2 months",
                                                                  "2"=>"6 months",
                                                                  "3"=>"12 months",
                                                                  "4"=>"2 years")),
                             "Graphs_with_Total_Items_Scale"=>array(0=>array("0"=>"0",
                                                                             "1"=>"1")),
                             "Graphs_with_Total_Scores_Scale"=>array(0=>array("0"=>"0",
                                                                              "1"=>"1")),
                             "Graphs_with_Percentage_Scale"=>array(0=>array("0"=>"0",
                                                                            "1"=>"1"))
                            ));
?>

@extends('layouts.master')

@section('title', 'Change Anaytics Details')

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
<link href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/basic/jquery.qtip.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/basic/jquery.qtip.js"></script>
<script src="{{ asset('/js/tool.js') }}"></script>   
@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_anaytics_change_details_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_anaytics_change_details_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_anaytics_change_details_right_bottom_content')
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

    var changes = false;
    var time = "";

    function UnLoadWindow() {
    }

    function TriggerSubmit() {
        var $myForm = $('#ChangeDetailsfrm');
        if(!$myForm[0].checkValidity()) {
            $myForm.find(':submit').click();
        } else {
            $myForm[0].submit();
        }
    }

    function cancel() {
        window.location.reload();
    }

    $().save({
        saveCallback: save,
        cancelCallback: cancel,
        Warnign: 'There are unsaved changes. Be sure to save them before you leave this page. All unsaved changes will be lost.',
        Save: 'Save',
        Cancel: 'Cancel',
        Confirm: 'Changes have been saved'
    });

    function save() {
        TriggerSubmit();
        $().save.save();
        changes = !1;
    }

    function change() {
        if (!changes) {
                changes = true;
                $().save.change();
            }
    }

    function init() {
        if (<?php echo Auth::user()->date_format ?> == 0) {
            $( "#datepicker" ).datepicker({dateFormat: 'mm/dd/yy'});
        } else {
            $( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy'});
        }

        if (<?php echo $Faker[0]["Include_Normative_Data"]?> == "0") {
            document.getElementById("Include_normative_data_No").checked = true;
        } else {
            document.getElementById("Include_normative_data_Yes").checked = true;
        }

        $("#Select_age_id").get(0).selectedIndex = <?php echo $Faker[0]["Select_Age"]?>;
    }

    $(document).ready(function() {

        init();
    });

    $(function () {
        
        $("#student li").click(function(e) {
            location.href=$(this).data("path") + "nodefine";
        });

        $("#Output_Options_Group input").click(function() {
            //change();

            if ($(this).prop('checked')) {
                $('#Output_Options_Group input:checkbox').prop('checked',false);
                $(this).prop('checked',true);
            } /*else {
                if (!$("Output_Options_Single").prop('checked') && !$("Output_Options_Multiple").prop('checked')) {
                    $(this).prop('checked',true);
                }
            }*/

            var flag = true;
            $("#Output_Options_Group input").each(function() {
                if ($(this).prop('checked')) {
                    flag = false;
                }
            });

            if (flag && !$(this).prop('checked')) {
                $(this).prop("checked", true);
            } else {
                change(); 
            }
        });

        $("#Section_Analysis_Group input").click(function() {
            change();

            if ($(this).data("index") == "1" && $(this).prop('checked')) {
                if (!$("#Category_Analysis_A").prop('checked')) {
                    $("#Category_Analysis_A").prop("checked", true);
                }
                if (!$("#Category_Analysis_B").prop('checked')) {
                    $("#Category_Analysis_B").prop("checked", true);
                }
                if (!$("#Category_Analysis_C").prop('checked')) {
                    $("#Category_Analysis_C").prop("checked", true);
                }
                if (!$("#Category_Analysis_D").prop('checked')) {
                    $("#Category_Analysis_D").prop("checked", true);
                }
                if (!$("#Category_Analysis_E").prop('checked')) {
                    $("#Category_Analysis_E").prop("checked", true);
                }
                if (!$("#Category_Analysis_F").prop('checked')) {
                    $("#Category_Analysis_F").prop("checked", true);
                }
                if (!$("#Category_Analysis_G").prop('checked')) {
                    $("#Category_Analysis_G").prop("checked", true);
                }
                if (!$("#Category_Analysis_H").prop('checked')) {
                    $("#Category_Analysis_H").prop("checked", true);
                }
                if (!$("#Category_Analysis_I").prop('checked')) {
                    $("#Category_Analysis_I").prop("checked", true);
                }
                if (!$("#Category_Analysis_J").prop('checked')) {
                    $("#Category_Analysis_J").prop("checked", true);
                }
                if (!$("#Category_Analysis_K").prop('checked')) {
                    $("#Category_Analysis_K").prop("checked", true);
                }
                if (!$("#Category_Analysis_L").prop('checked')) {
                    $("#Category_Analysis_L").prop("checked", true);
                }
                if (!$("#Category_Analysis_M").prop('checked')) {
                    $("#Category_Analysis_M").prop("checked", true);
                }
                if (!$("#Category_Analysis_N").prop('checked')) {
                    $("#Category_Analysis_N").prop("checked", true);
                }
                if (!$("#Category_Analysis_P").prop('checked')) {
                    $("#Category_Analysis_P").prop("checked", true);
                }
            } else if ($(this).data("index") == "2" && $(this).prop('checked')) {
                if (!$("#Category_Analysis_C").prop('checked')) {
                    $("#Category_Analysis_C").prop("checked", true);
                }
                if (!$("#Category_Analysis_E").prop('checked')) {
                    $("#Category_Analysis_E").prop("checked", true);
                }
                if (!$("#Category_Analysis_F").prop('checked')) {
                    $("#Category_Analysis_F").prop("checked", true);
                }
                if (!$("#Category_Analysis_G").prop('checked')) {
                    $("#Category_Analysis_G").prop("checked", true);
                }
                if (!$("#Category_Analysis_H").prop('checked')) {
                    $("#Category_Analysis_H").prop("checked", true);
                }
                if (!$("#Category_Analysis_I").prop('checked')) {
                    $("#Category_Analysis_I").prop("checked", true);
                }
                if (!$("#Category_Analysis_J").prop('checked')) {
                    $("#Category_Analysis_J").prop("checked", true);
                }
            } else if ($(this).data("index") == "3" && $(this).prop('checked')) {
                if (!$("#Category_Analysis_Q").prop('checked')) {
                    $("#Category_Analysis_Q").prop("checked", true);
                }
                if (!$("#Category_Analysis_R").prop('checked')) {
                    $("#Category_Analysis_R").prop("checked", true);
                }
                if (!$("#Category_Analysis_S").prop('checked')) {
                    $("#Category_Analysis_S").prop("checked", true);
                }
                if (!$("#Category_Analysis_T").prop('checked')) {
                    $("#Category_Analysis_T").prop("checked", true);
                }
            } else if ($(this).data("index") == "4" && $(this).prop('checked')) {
                if (!$("#Category_Analysis_U").prop('checked')) {
                    $("#Category_Analysis_U").prop("checked", true);
                }
                if (!$("#Category_Analysis_V").prop('checked')) {
                    $("#Category_Analysis_V").prop("checked", true);
                }
                if (!$("#Category_Analysis_W").prop('checked')) {
                    $("#Category_Analysis_W").prop("checked", true);
                }
                if (!$("#Category_Analysis_X").prop('checked')) {
                    $("#Category_Analysis_X").prop("checked", true);
                }
            } else if ($(this).data("index") == "5" && $(this).prop('checked')) {
                if (!$("#Category_Analysis_Y").prop('checked')) {
                    $("#Category_Analysis_Y").prop("checked", true);
                }
                if (!$("#Category_Analysis_Z").prop('checked')) {
                    $("#Category_Analysis_Z").prop("checked", true);
                }
            } else if ($(this).data("index") == "6" && $(this).prop('checked')) {
                if (!$("#Category_Analysis_A").prop('checked')) {
                    $("#Category_Analysis_A").prop("checked", true);
                }
                if (!$("#Category_Analysis_B").prop('checked')) {
                    $("#Category_Analysis_B").prop("checked", true);
                }
                if (!$("#Category_Analysis_C").prop('checked')) {
                    $("#Category_Analysis_C").prop("checked", true);
                }
                if (!$("#Category_Analysis_D").prop('checked')) {
                    $("#Category_Analysis_D").prop("checked", true);
                }
                if (!$("#Category_Analysis_E").prop('checked')) {
                    $("#Category_Analysis_E").prop("checked", true);
                }
                if (!$("#Category_Analysis_F").prop('checked')) {
                    $("#Category_Analysis_F").prop("checked", true);
                }
                if (!$("#Category_Analysis_G").prop('checked')) {
                    $("#Category_Analysis_G").prop("checked", true);
                }
                if (!$("#Category_Analysis_H").prop('checked')) {
                    $("#Category_Analysis_H").prop("checked", true);
                }
                if (!$("#Category_Analysis_I").prop('checked')) {
                    $("#Category_Analysis_I").prop("checked", true);
                }
                if (!$("#Category_Analysis_J").prop('checked')) {
                    $("#Category_Analysis_J").prop("checked", true);
                }
                if (!$("#Category_Analysis_K").prop('checked')) {
                    $("#Category_Analysis_K").prop("checked", true);
                }
                if (!$("#Category_Analysis_L").prop('checked')) {
                    $("#Category_Analysis_L").prop("checked", true);
                }
                if (!$("#Category_Analysis_M").prop('checked')) {
                    $("#Category_Analysis_M").prop("checked", true);
                }
                if (!$("#Category_Analysis_N").prop('checked')) {
                    $("#Category_Analysis_N").prop("checked", true);
                }
                if (!$("#Category_Analysis_P").prop('checked')) {
                    $("#Category_Analysis_P").prop("checked", true);
                }
                if (!$("#Category_Analysis_Q").prop('checked')) {
                    $("#Category_Analysis_Q").prop("checked", true);
                }
                if (!$("#Category_Analysis_R").prop('checked')) {
                    $("#Category_Analysis_R").prop("checked", true);
                }
                if (!$("#Category_Analysis_S").prop('checked')) {
                    $("#Category_Analysis_S").prop("checked", true);
                }
                if (!$("#Category_Analysis_T").prop('checked')) {
                    $("#Category_Analysis_T").prop("checked", true);
                }
                if (!$("#Category_Analysis_U").prop('checked')) {
                    $("#Category_Analysis_U").prop("checked", true);
                }
                if (!$("#Category_Analysis_V").prop('checked')) {
                    $("#Category_Analysis_V").prop("checked", true);
                }
                if (!$("#Category_Analysis_W").prop('checked')) {
                    $("#Category_Analysis_W").prop("checked", true);
                }
                if (!$("#Category_Analysis_X").prop('checked')) {
                    $("#Category_Analysis_X").prop("checked", true);
                }
                if (!$("#Category_Analysis_Y").prop('checked')) {
                    $("#Category_Analysis_Y").prop("checked", true);
                }
                if (!$("#Category_Analysis_Z").prop('checked')) {
                    $("#Category_Analysis_Z").prop("checked", true);
                }
            }
        });

        $("#Select_age_id").change(function() {  
            change();
        });

        $("#Assessments_Group input").click(function() {
            var flag = true;
            $("#Assessments_Group input").each(function() {
                if ($(this).prop('checked')) {
                    flag = false;
                }
            });

            if (flag && !$(this).prop('checked')) {
                $(this).prop("checked", true);
            } else {
                change(); 
            }
        });
        
        $("#Include_normative_data_No").click(function() {
            change();
        });

        $("#Include_normative_data_Yes").click(function() {
            change();
        });

        $("#Graphing_Options_Group1 input").click(function() {
            change();
        });

        $("#Graphing_Options_Group2 input").click(function() {
            change();
        });

        $("#Graphing_Options_Group3 input").click(function() {
            change();
        });

        $("#Category_Analysis_Group input").click(function() {
            change();
        });

        $("#Assessments_clear").click(function() {
            change();

            $('#Assessments_Group input:checkbox').prop('checked',false);

            $("#Assessments_Group input").each(function() {
                $(this).prop('checked',true);
                return false;
            });
        });

        $("#Assessments_select_all").click(function() {
            change();

            $('#Assessments_Group input:checkbox').prop('checked',true);
        });

        $("#Category_Analysis_clear").click(function() {
            change();

            $('#Section_Analysis_Group input:checkbox').prop('checked',false);
            $('#Category_Analysis_Group input:checkbox').prop('checked',false);
        });

        $("#Category_Analysis_select_all").click(function() {
            change();

            $('#Section_Analysis_Group input:checkbox').prop('checked',true);
            $('#Category_Analysis_Group input:checkbox').prop('checked',true);
        });

        $("#Graphing_Options_clear").click(function() {
            change();

            $('#Graphing_Options_Group1 input:checkbox').prop('checked',false);
            $('#Graphing_Options_Group2 input:checkbox').prop('checked',false);
            $('#Graphing_Options_Group3 input:checkbox').prop('checked',false);
        });

        $("#Graphing_Options_select_all").click(function() {
            change();

            $('#Graphing_Options_Group1 input:checkbox').prop('checked',true);
            $('#Graphing_Options_Group2 input:checkbox').prop('checked',true);
            $('#Graphing_Options_Group3 input:checkbox').prop('checked',true);
        });

        $(".Output_Options i.poptext").qtip({ content: { text: 'You are the owner of this student.' } });

        $("#Output_Options").qtip({
            content: {
                text: '<span>Select the <b>Single Assessment Analysis</b> option to create analysis of the scores obtained during an initial assessment or any other single assessment.<br><br>Select the <b>Developmental Analysis</b> option to create a comparison of the scores from 2 or more assessments and display a statistical analysis of the change in skills observed between assessments.</span>'
            }
        });

        $("#Contentut_Options").qtip({
            content: {
                text: '<span>No content.</span>'
            }
        });

        $("#Normative_Data").qtip({
            content: {
                text: '<span>No content.</span>'
            }
        });

        $("#Graphing_Options_1").qtip({
            content: {
                text: '<span>No content.</span>'
            }
        });

        $("#Graphing_Options_2").qtip({
            content: {
                text: '<span>No content.</span>'
            }
        });

        $("#Graphing_Options_3").qtip({
            content: {
                text: '<span>No content.</span>'
            }
        });

        $("#actions li").click(function(e) {
            if ($(this).data("index") == "Save") {
                TriggerSubmit();
            } else {
                window.location.reload();
            }
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