@extends('layouts.master')

@section('title', "Student History")

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
<script src="{{ asset('/js/tool.js') }}"></script>   

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_history_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_history_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_history_right_bottom_content')
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
    const Permission = <?php echo $Student->get('Permission'); ?>;
    
    function UnLoadWindow() {
    }

    function init() {
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

        if (<?php echo $Student->get("HasAssessment");?> != 1) {
            $('#TGV').addClass("app-disable");
            $('#SAssess').addClass("app-disable");
            $('#StudentNotes').addClass("app-disable");
        } else {
            $('#TGV').removeClass("app-disable");
            $('#SAssess').removeClass("app-disable");
            $('#StudentNotes').removeClass("app-disable");
        }

    }

    $(function () {
        init();

        var $table = $("#historyTable");
        var listnum = {{sizeof($Records)}};
        if (listnum > 50) {
            listnum = 50;
        }
        if (<?php echo Auth::user()->date_format ?> == 0) {
                var date_format = 'mmddyyyy';
            } else {
                var date_format = 'ddmmyyyy';
            }
      
        $table.tablesorter({
            sortReset: true,
            sortRestart: true,
            dateFormat: date_format,
            textAttribute: 'data-sort',
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
                        container   : '.pager',       // target the pager markup (wrapper) 
                        first       : '.first',       // go to first page arrow 
                        prev        : '.prev',        // previous page arrow 
                        next        : '.next',        // next page arrow 
                        last        : '.last',        // go to last page arrow 
                        gotoPage    : '.gotoPage',    // go to page selector - select dropdown that sets the current page 
                        pageDisplay : '.pagedisplay', // location of where the "output" is displayed 
                        pageSize    : '.pagesize'     // page size selector - select dropdown that sets the "size" option 
                    }
            }
        });

        $("#History li").click(function(e) {
            location.href=$(this).data("path");
        });

        window.onbeforeunload = UnLoadWindow;
    });

</script>
@endsection