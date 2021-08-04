@extends('layouts.master')

<?php
  $name = "";
  if (Auth::user()->name_format == 0) {
    $name = "Related Students / ".Auth::user()->last_name." ".Auth::user()->first_name." (".Auth::user()->email.")";
  } else {
    $name = "Related Students / ".Auth::user()->first_name." ".Auth::user()->last_name." (".Auth::user()->email.")";
  }
?>
@section('title', $name)

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
    @include('contents.app_webablls_organization_manage_students_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_manage_students_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_manage_students_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    function UnLoadWindow() {
    }

    $(function () {
        var $table1 = $("#table1");
        var $table2 = $("#table2");
        var $table3 = $("#table3");
        var listnum1 = {{sizeof($AS)}};
        var listnum2 = {{sizeof($SS)}};
        var listnum3 = {{sizeof($OS)}};
        if (<?php echo Auth::user()->date_format ?> == 0) {
            var date_format = 'mmddyyyy';
        } else {
            var date_format = 'ddmmyyyy';
        }
        
        if (listnum1 > 50) {
            listnum1 = 50;
        }
        
        if (listnum2 > 50) {
            listnum2 = 50;
        }
        
        if (listnum3 > 50) {
            listnum3 = 50;
        }

        var select = 0;

        $table1.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            dateFormat: date_format,
            widgets: ["filter", "zebra", "pager"],
            widgetOptions: {
                filter_external: '.search',
                filter_defaultFilter: { 1: '~{query}' },
                filter_columnFilters: false,
                filter_saveFilters: false,
                filter_columnAnyMatch: true,
                filter_reset: '.reset',
                filter_anyMatch: true,
                pager_size: listnum1,
                pager_startPage: 0,
                pager_savePages: false,
                pager_fixedHeight: true,
                pager_removeRows: false,
                pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                pager_updateArrows: true,
                pager_selectors: { 
 					container   : '.pager1',       // target the pager markup (wrapper) 
 					first       : '.first',       // go to first page arrow 
 					prev        : '.prev',        // previous page arrow 
 					next        : '.next',        // next page arrow 
 					last        : '.last',        // go to last page arrow 
 					gotoPage    : '.gotoPage',    // go to page selector - select dropdown that sets the current page 
 					pageDisplay : '.pagedisplay', // location of where the "output" is displayed 
 					pageSize    : '.pagesize'     // page size selector - select dropdown that sets the "size" option 
 				},

            }
        });

        $table2.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            dateFormat: date_format,
            widgets: ["filter", "zebra", "pager"],
            widgetOptions: {
                filter_external: '.search',
                filter_defaultFilter: { 1: '~{query}' },
                filter_columnFilters: false,
                filter_saveFilters: false,
                filter_columnAnyMatch: true,
                filter_reset: '.reset',
                filter_anyMatch: true,
                pager_size: listnum2,
                pager_startPage: 0,
                pager_savePages: false,
                pager_fixedHeight: true,
                pager_removeRows: false,
                pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                pager_updateArrows: true,
                pager_selectors: { 
 					container   : '.pager2',       // target the pager markup (wrapper) 
 					first       : '.first',       // go to first page arrow 
 					prev        : '.prev',        // previous page arrow 
 					next        : '.next',        // next page arrow 
 					last        : '.last',        // go to last page arrow 
 					gotoPage    : '.gotoPage',    // go to page selector - select dropdown that sets the current page 
 					pageDisplay : '.pagedisplay', // location of where the "output" is displayed 
 					pageSize    : '.pagesize'     // page size selector - select dropdown that sets the "size" option 
 				},
            }
        });

        $table3.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            dateFormat: date_format,
            widgets: ["filter", "zebra", "pager"],
            widgetOptions: {
                filter_external: '.search',
                filter_defaultFilter: { 1: '~{query}' },
                filter_columnFilters: false,
                filter_saveFilters: false,
                filter_columnAnyMatch: true,
                filter_reset: '.reset',
                filter_anyMatch: true,
                pager_size: listnum3,
                pager_startPage: 0,
                pager_savePages: false,
                pager_fixedHeight: true,
                pager_removeRows: false,
                pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                pager_updateArrows: true,
                pager_selectors: { 
 					container   : '.pager3',       // target the pager markup (wrapper) 
 					first       : '.first',       // go to first page arrow 
 					prev        : '.prev',        // previous page arrow 
 					next        : '.next',        // next page arrow 
 					last        : '.last',        // go to last page arrow 
 					gotoPage    : '.gotoPage',    // go to page selector - select dropdown that sets the current page 
 					pageDisplay : '.pagedisplay', // location of where the "output" is displayed 
 					pageSize    : '.pagesize'     // page size selector - select dropdown that sets the "size" option 
 				},
            }
        });
        
        $('#table1 td, #table2 td, #table3 td').click(function(event) {
            if ($(this).parent("tr").hasClass('selected')) {
                $("#table1 tr").removeClass("selected");
                $("#table2 tr").removeClass("selected");
                $("#table3 tr").removeClass("selected");
                $('#actions').addClass('disable');
            } else {
                $("#table1 tr").removeClass("selected");
                $("#table2 tr").removeClass("selected");
                $("#table3 tr").removeClass("selected");
                $(this).parent("tr").addClass('selected');
                $('#actions').removeClass('disable');
                select = $(this).parent().data("table-row-id");
            }
        });

        $('#filter').click(function(event) {
            var Name = document.getElementById("Name");
            var Name_hide = document.getElementById("Name_hide");

            Name_hide.value = Name.value;
            if (document.createEventObject) {
                Name_hide.fireEvent("onchange");
            } else {
                var evt = document.createEvent("HTMLEvents");
                evt.initEvent("change", false, true);
                Name_hide.dispatchEvent(evt);
            }
            $("#table1 tr").removeClass("selected");
            $("#table2 tr").removeClass("selected");
            $("#table3 tr").removeClass("selected");
            $('#actions').addClass('disable');
        });
 
        $('#clear').click(function() {
            $table1.trigger('filterReset').trigger('sortReset');
            $table2.trigger('filterReset').trigger('sortReset');
            $table3.trigger('filterReset').trigger('sortReset');
            var Name = document.getElementById("Name").value = "";
            var Name_hide = document.getElementById("Name_hide").value = "";
        });

        $(".table1 span.poptext:contains('O')").qtip({ content: { text: 'Owner rights' } });
        $(".table1 span.poptext:contains('Fm')").qtip({ content: { text: 'File modify' } });
        $(".table1 span.poptext:contains('Fv')").qtip({ content: { text: 'File view' } });
        $(".table1 span.poptext:contains('Av')").qtip({ content: { text: 'Assessments and Report View' } });
        $(".table1 span.poptext:contains('Am')").qtip({ content: { text: 'Assessments and Report modify' } });
        $(".table1 span.poptext:contains('Iv')").qtip({ content: { text: 'Basic INFO view (Student Profile screen)' } });
        $(".table1 span.poptext:contains('Im')").qtip({ content: { text: 'Basic INFO Modify ( Student Profile screen)' } });
        $(".table1 span.poptext:contains('FA')").qtip({ content: { text: 'Full access' } });
        $(".table1 span.poptext:contains('FAs')").qtip({ content: { text: 'Full access with authorization to manage share links' } });
        $(".table1 span.poptext:contains('CO')").qtip({ content: { text: 'Coordinator (or Profile Coordinator)' } });
        $(".table1 span.poptext:contains('DAv')").qtip({ content: { text: 'Analytics view' } });
        $(".table1 span.poptext:contains('DAm')").qtip({ content: { text: 'Analytics modify' } });

        $(".table2 span.poptext:contains('O')").qtip({ content: { text: 'Owner rights' } });
        $(".table2 span.poptext:contains('Fm')").qtip({ content: { text: 'File modify' } });
        $(".table2 span.poptext:contains('Fv')").qtip({ content: { text: 'File view' } });
        $(".table2 span.poptext:contains('Av')").qtip({ content: { text: 'Assessments and Report View' } });
        $(".table2 span.poptext:contains('Am')").qtip({ content: { text: 'Assessments and Report modify' } });
        $(".table2 span.poptext:contains('Iv')").qtip({ content: { text: 'Basic INFO view (Student Profile screen)' } });
        $(".table2 span.poptext:contains('Im')").qtip({ content: { text: 'Basic INFO Modify ( Student Profile screen)' } });
        $(".table2 span.poptext:contains('FA')").qtip({ content: { text: 'Full access' } });
        $(".table2 span.poptext:contains('FAs')").qtip({ content: { text: 'Full access with authorization to manage share links' } });
        $(".table2 span.poptext:contains('CO')").qtip({ content: { text: 'Coordinator (or Profile Coordinator)' } });
        $(".table2 span.poptext:contains('DAv')").qtip({ content: { text: 'Analytics view' } });
        $(".table2 span.poptext:contains('DAm')").qtip({ content: { text: 'Analytics modify' } });

        $(".table3 span.poptext:contains('O')").qtip({ content: { text: 'Owner rights' } });
        $(".table3 span.poptext:contains('Fm')").qtip({ content: { text: 'File modify' } });
        $(".table3 span.poptext:contains('Fv')").qtip({ content: { text: 'File view' } });
        $(".table3 span.poptext:contains('Av')").qtip({ content: { text: 'Assessments and Report View' } });
        $(".table3 span.poptext:contains('Am')").qtip({ content: { text: 'Assessments and Report modify' } });
        $(".table3 span.poptext:contains('Iv')").qtip({ content: { text: 'Basic INFO view (Student Profile screen)' } });
        $(".table3 span.poptext:contains('Im')").qtip({ content: { text: 'Basic INFO Modify ( Student Profile screen)' } });
        $(".table3 span.poptext:contains('FA')").qtip({ content: { text: 'Full access' } });
        $(".table3 span.poptext:contains('FAs')").qtip({ content: { text: 'Full access with authorization to manage share links' } });
        $(".table3 span.poptext:contains('CO')").qtip({ content: { text: 'Coordinator (or Profile Coordinator)' } });
        $(".table3 span.poptext:contains('DAv')").qtip({ content: { text: 'Analytics view' } });
        $(".table3 span.poptext:contains('DAm')").qtip({ content: { text: 'Analytics modify' } });

        $("#actions li").click(function(e) {
            if ($(this).data("path") != "") {
                location.href=$(this).data("path");
            } else {
                if (!$('#actions').hasClass('disable')) {
                    var Url = "{{url('/Organization/Manage/Students/Replace')}}" + "/" + {{$User->get("ID")}} + "/" + select;
                    location.href = Url;
                }
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection