@extends('layouts.master')

@section('title', 'Student_reports')

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

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href="{{ asset('css/theme.default.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('/js/jquery.tablesorter.widgets.js') }}"></script>
<script src="{{ asset('/js/widget-pager.js') }}"></script>
<link href="{{ asset('css/jquery.tablesorter.pager.css') }}" rel="stylesheet">

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_s_reports_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_s_reports_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_s_reports_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')

<script type="text/javascript">
    var StudentID = <?php echo ''.$Student["ID"].'' ?>;
    
    function UnLoadWindow() {
    }

    $(function () {
        var $table = $("#ReportTable");
        var select = 0;
        // !important Report此頁不能使用list_num
        
        $table.tablesorter({
                sortReset: true,
                sortRestart: true,
                textAttribute: 'data-sort',
                widgets: ["filter", "zebra", "pager"],
                headers: {                    
                        0: { sorter: false }
                    },
                widgetOptions: {
                    filter_external: '.search',
                    filter_defaultFilter: { 1: '~{query}' },
                    filter_columnFilters: false,
                    filter_saveFilters: false,
                    filter_columnAnyMatch: true,
                    filter_reset: '.reset',
                    filter_anyMatch: true,
                    pager_size: 50,
                    pager_startPage: 0,
                    pager_savePages: false,
                    pager_fixedHeight: true,
                    pager_removeRows: false,
                    pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                    pager_updateArrows: true
                }
        });

        $("#ReportTable td").click(function(event) {
            if ($(this).parent("tr").hasClass("selected")) {
                $("#ReportTable tr").removeClass("selected");
                $("#actions").addClass("disable");
            } else {
                $("#ReportTable tr").removeClass("selected");
                $(this).parent("tr").addClass("selected");
                $("#actions").removeClass("disable");
                select = $(this).parent().data("table-row-id");
            }
        });

        $("#student li").click(function(e) {
            if ($("#UserTable tr").not(this).hasClass("selected")) {
                location.href=$(this).data("path") + select;
            }
        });

        $("#actions li").click(function(e) {
            if ($("#UserTable tr").not(this).hasClass("selected")) {
                location.href=$(this).data("path") + select;
            }
        });

        $("#addStudent li").click(function(e) {
            location.href=$(this).data("path");
        });

        $("#programWork, #progress, #sTatus, #bAseline").change(function() {
            var programWork = document.getElementById("programWork").checked;
            var progress = document.getElementById("progress").checked;
            var status = document.getElementById("sTatus").checked;
            var baseline = document.getElementById("bAseline").checked;
            var P_hide = document.getElementById("P_hide");

            if (programWork && progress && status && baseline) {
                P_hide.value = "";
            } else if (programWork) {
                P_hide.value = "Worksheet";
            } else if (progress) {
                P_hide.value = "Progress";
            } else if (status) {
                P_hide.value = "Status";
            } else if (baseline) {
                P_hide.value = "BaseLine";
            } else {
                P_hide.value = "";
            }
            P_hide.dispatchEvent(new Event('change'));
        });

        window.onbeforeunload = UnLoadWindow;
    });

    function removeReport() {
        
	    answer = confirm("app.webablls.net顯示\nThis action will remove report directly. This action can not be undone. Are you sure you want to continue?");
	      if (answer)
            var Url = "{{url('/Student/ViewReports/')}}" + select;
            $.ajax({
                url: Url,
                processData: false, //防止jquery將data變成query String
                cache: false
                }).done(function(data) {
                    location.href="{{url('Student/ViewReports')}}";
        });
		    
    }
</script>

@endsection