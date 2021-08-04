@extends('layouts.master')

@section('title', "Assessment list")

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
    .bottom_content {
        margin-top: 5px;
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
<link href="{{ asset('css/theme.default.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('/js/jquery.tablesorter.widgets.js') }}"></script>
<script src="{{ asset('/js/widget-pager.js') }}"></script>
<link href="{{ asset('css/jquery.tablesorter.pager.css') }}" rel="stylesheet">
<script src="{{ asset('/js/tool.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/basic/jquery.qtip.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/basic/jquery.qtip.js"></script>

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_assessment_list_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_assessment_list_right_top_content')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.app_webablls_assessment_list_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    function Change() {
        $("#Table tr").removeClass("selected");
        $('#Assessment_Details').addClass('app-disable');
        $('#Grid_Edit').addClass('app-disable');
        $('#Text_Edit').addClass('app-disable');
        $('#Cat_Edit').addClass('app-disable');
        $('#View_Report').addClass('app-disable');
        $('#TGV').addClass('app-disable');
        $('#Student_Summary').addClass('app-disable');
    }

    function UnLoadWindow() {
    }

    $(function () {
        var $Assessments_Table = $("#Table");
        var select_ID = "0";
        var select_Seat_ID = "0";
        var total_number = {{$Assessments->count()}};
        var listnum = {{$Assessments->count()}};
        if (<?php echo Auth::user()->date_format ?> == 0) {
            var date_format = 'mmddyyyy';
        } else {
            var date_format = 'ddmmyyyy';
        }
        
        if (listnum > 50) {
            listnum = 50;
        }

        $Assessments_Table.tablesorter({
            sortReset: true,
            sortRestart: true,
            dateFormat: date_format,
            textAttribute: 'data-sort',
            sortList: [[0,0]], 
            headers: {                    
                0: { sorter: false },
            },
            widgets: ["filter", "zebra", "pager"],
            widgetOptions: {
                filter_external: '.search',
                filter_defaultFilter: { 1: '~{query}' },
                filter_columnFilters: false,
                filter_saveFilters: false,
                filter_columnAnyMatch: true,
                filter_reset: '.reset',
                filter_anyMatch: true,
                pager_size: listnum,
                pager_startPage: 0,
                pager_savePages: false,
                pager_fixedHeight: true,
                pager_removeRows: false,
                pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                pager_updateArrows: true,
                pager_selectors: { 
 					container   : '.Assessments_Pager',       // target the pager markup (wrapper) 
 					first       : '.first',       // go to first page arrow 
 					prev        : '.prev',        // previous page arrow 
 					next        : '.next',        // next page arrow 
 					last        : '.last',        // go to last page arrow 
 					gotoPage    : '.gotoPage',    // go to page selector - select dropdown that sets the current page 
 					pageDisplay : '.pagedisplay', // location of where the "output" is displayed 
 					pageSize    : '.pagesize'     // page size selector - select dropdown that sets the "size" option 
 				},
            }
        })
        .bind('filterStart filterEnd', function(e, filter) {
            if (e.type === 'filterEnd') {
                $("#Visible_Num").html(total_number - $('.filtered').length);
            } else {
                return;
            }
        });

        $("#Table span.poptext:contains('M')").qtip({ content: { text: 'You can edit this assessment.' } });
        $("#Table span.poptext:contains('V')").qtip({ content: { text: 'You can only view this assessment.' } });

        $('#Table td').click(function(event) {
            if ($(this).parent("tr").hasClass('selected')) {
                $("#Table tr").removeClass("selected");
                $('#Assessment_Details').addClass('app-disable');
                $('#Grid_Edit').addClass('app-disable');
                $('#Text_Edit').addClass('app-disable');
                $('#Cat_Edit').addClass('app-disable');
                $('#View_Report').addClass('app-disable');
                $('#TGV').addClass('app-disable');
                $('#Student_Summary').addClass('app-disable');
            } else {
                select_ID = $(this).parent().data("table-row-id");
                select_Seat_ID = $(this).parent().data("table-row-seat-id");
                $("#Table tr").removeClass("selected");
                $(this).parent("tr").addClass('selected');
                $('#Assessment_Details').removeClass('app-disable');
                if (Check_Permission("Assessment Details", $(this).parent().data("permission"))) {
                    $('#Assessment_Details').removeClass('app-disable');
                } else {
                    $('#Assessment_Details').addClass('app-disable');
                }
                if (Check_Permission("Grid Edit", $(this).parent().data("permission"))) {
                    $('#Grid_Edit').removeClass('app-disable');
                } else {
                    $('#Grid_Edit').addClass('app-disable');
                }
                if (Check_Permission("Text Edit", $(this).parent().data("permission"))) {
                    $('#Text_Edit').removeClass('app-disable');
                } else {
                    $('#Text_Edit').addClass('app-disable');
                }
                if (Check_Permission("Cat Edit", $(this).parent().data("permission"))) {
                    $('#Cat_Edit').removeClass('app-disable');
                } else {
                    $('#Cat_Edit').addClass('app-disable');
                }
                if (Check_Permission("Total Grid View", $(this).parent().data("permission"))) {
                    $('#TGV').removeClass('app-disable');
                } else {
                    $('#TGV').addClass('app-disable');
                }
                if (Check_Permission("Student Summary", $(this).parent().data("permission"))) {
                    $('#Student_Summary').removeClass('app-disable');
                } else {
                    $('#Student_Summary').addClass('app-disable');
                }
                $('#View_Report').removeClass('app-disable');
            }
        });
        
        $("#actions li").click(function(e) {
            if ($("#Table tr").not(this).hasClass("selected") && !$(this).hasClass("app-disable")) {
                if ($(this).data("path") == "/Student/ViewReports/" || $(this).data("path") == "/Student/ViewSummary/" || $(this).data("path") == "/Assessment/TgvGrid/") {
                    location.href=$(this).data("path") + select_Seat_ID;
                } else if ($(this).data("path") == "/Assessment/TgvTextEdit/" || $(this).data("path") == "/Assessment/TgvCatEdit/") {
                    location.href=$(this).data("path") + select_ID + "/?filter=A";
                } else {
                    location.href=$(this).data("path") + select_ID;
                }
            }
        });

        $("#Show_all_assessments, #Show_last, #Show_first").change(function() {
            if ($(this).prop('checked')) {
                $('#Show_all_assessments').prop('checked',false);
                $('#Show_last').prop('checked',false);
                $('#Show_first').prop('checked',false);
                $(this).prop('checked',true);
            }

            var Show_all_assessments = document.getElementById("Show_all_assessments").checked;
            var Show_last = document.getElementById("Show_last").checked;
            var Show_first = document.getElementById("Show_first").checked;
            var show_last_or_first = document.getElementById("show_last_or_first");
            var key = "";

            $("#Table tr").removeClass("selected");
            $('#Assessment_Details').addClass('app-disable');
            $('#Grid_Edit').addClass('app-disable');
            $('#Text_Edit').addClass('app-disable');
            $('#Cat_Edit').addClass('app-disable');
            $('#View_Report').addClass('app-disable');
            $('#TGV').addClass('app-disable');
            $('#Student_Summary').addClass('app-disable');

            show_last_or_first.value = "";

            if (!Show_all_assessments) {
                if (Show_last) {
                    if (key == "") {
                        key = "'Last'";
                    } else {
                        key = key + "|'Last'";
                    }
                }

                if (Show_first) {
                    if (key == "") {
                        key = "'First'";
                    } else {
                        key = key + "|'First'";
                    }
                }
            }

            show_last_or_first.value = key;
            if (document.createEventObject) {
                show_last_or_first.fireEvent("onchange");
            } else {
                var evt = document.createEvent("HTMLEvents");
                evt.initEvent("change", false, true);
                show_last_or_first.dispatchEvent(evt);
            }
        });

        $("#Show_all_assessments_range, #Show_last_3_months, #Show_last_6_months, #Show_last_year, #Show_last_2_years, #Show_last_5_years, #Show_more_than_5_years").change(function() {
            if ($(this).prop('checked')) {
                $('#Show_all_assessments_range').prop('checked',false);
                $('#Show_last_3_months').prop('checked',false);
                $('#Show_last_6_months').prop('checked',false);
                $('#Show_last_year').prop('checked',false);
                $('#Show_last_2_years').prop('checked',false);
                $('#Show_last_5_years').prop('checked',false);
                $('#Show_more_than_5_years').prop('checked',false);
                $(this).prop('checked',true);
            }

            var Show_all_assessments_range = document.getElementById("Show_all_assessments_range").checked;
            var Show_last_3_months = document.getElementById("Show_last_3_months").checked;
            var Show_last_6_months = document.getElementById("Show_last_6_months").checked;
            var Show_last_year = document.getElementById("Show_last_year").checked;
            var Show_last_2_years = document.getElementById("Show_last_2_years").checked;
            var Show_last_5_years = document.getElementById("Show_last_5_years").checked;
            var Show_more_than_5_years = document.getElementById("Show_more_than_5_years").checked;
            var show_range = document.getElementById("show_range");
            var key = "";

            $("#Table tr").removeClass("selected");
            $('#Assessment_Details').addClass('app-disable');
            $('#Grid_Edit').addClass('app-disable');
            $('#Text_Edit').addClass('app-disable');
            $('#Cat_Edit').addClass('app-disable');
            $('#View_Report').addClass('app-disable');
            $('#TGV').addClass('app-disable');
            $('#Student_Summary').addClass('app-disable');

            show_range.value = "";

            if (!Show_all_assessments_range) {
                if (Show_last_3_months) {
                    if (key == "") {
                        key = "<=90";
                    } else {
                        key = key + "|<=90";
                    }
                }

                if (Show_last_6_months) {
                    if (key == "") {
                        key = "<=180";
                    } else {
                        key = key + "|<=180";
                    }
                }

                if (Show_last_year) {
                    if (key == "") {
                        key = "<=365";
                    } else {
                        key = key + "|<=365";
                    }
                }

                if (Show_last_2_years) {
                    if (key == "") {
                        key = "<=730";
                    } else {
                        key = key + "|<=730";
                    }
                }

                if (Show_last_5_years) {
                    if (key == "") {
                        key = "<=1825";
                    } else {
                        key = key + "|<=1825";
                    }
                }

                if (Show_more_than_5_years) {
                    if (key == "") {
                        key = ">=1825";
                    } else {
                        key = key + "|>=1825";
                    }
                }
            }

            show_range.value = key;
            if (document.createEventObject) {
                show_range.fireEvent("onchange");
            } else {
                var evt = document.createEvent("HTMLEvents");
                evt.initEvent("change", false, true);
                show_range.dispatchEvent(evt);
            }
        });

        var Body = document.getElementById("Table");
        if ({{$Assessments->count()}} != 0) {
            var element = Body.querySelectorAll('span');
            for (var i = 0; i < element.length; i++) {
                if (element[i].classList.contains("addcontent")) {
                    var string1 = "";
                    if (element[i].dataset.index == "View Profile") {
                        string1 = '<a title="Click to see student profile" style="text-decoration:underline; color: #337ab7;" href="' + element[i].dataset.path + '">' + element[i].dataset.display + '</a>';
                    } else if (element[i].dataset.index == "View Summary") {
                        string1 = '<a title="Click to see student summary" style="text-decoration:underline; color: #337ab7;" href="' + element[i].dataset.path + '">' + element[i].dataset.display + '</a>';
                    }
                    if (Check_Permission(element[i].dataset.index, element[i].parentNode.parentNode.dataset.permission)) {
                        element[i].innerHTML = string1;
                    } else {
                        element[i].innerHTML = element[i].dataset.display;
                    }
                }
            }
            $Assessments_Table.trigger('update');
        }
    });
</script>
@endsection