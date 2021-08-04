@extends('layouts.master')

@section('title', "Anaytics list")

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
    @include('contents.app_webablls_anaytics_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_anaytics_right_top_content')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.app_webablls_anaytics_bottom_content')
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
        $('#actions').addClass('disable');
    }

    function UnLoadWindow() {
    }

    $(function () {
        var $Anaytics_Table = $("#Table");
        var select = "0";
        var total_number = {{sizeof($AnalysisList)}};
        var listnum = {{sizeof($AnalysisList)}};
        if (<?php echo Auth::user()->date_format ?> == 0) {
            var date_format = 'mmddyyyy';
        } else {
            var date_format = 'ddmmyyyy';
        }

        if (listnum > 50) {
            listnum = 50;
        }

        $Anaytics_Table.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            dateFormat: date_format,
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
 					container   : '.Anaytics_Pager',       // target the pager markup (wrapper) 
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

        $("#Table span.poptext:contains('M')").qtip({ content: { text: 'You can edit this assessment' } });
        $("#Table span.poptext:contains('V')").qtip({ content: { text: 'No content' } });

        $('#Table td').click(function(event) {
            if ($(this).parent("tr").hasClass('selected')) {
                $("#Table tr").removeClass("selected");
                $('#actions').addClass('disable');
            } else {
                $("#Table tr").removeClass("selected");
                $(this).parent("tr").addClass('selected');
                $('#actions').removeClass('disable');
                select = $(this).parent().data("table-row-id");
            }
        });
        
        $("#actions li").click(function(e) {
            if ($("#Table tr").not(this).hasClass("selected")) {
                if ($(this).data("index") == "View") {
                    location.href=$(this).data("path") + select + "?a=1";
                } else if ($(this).data("index") == "Change") {
                    location.href=$(this).data("path") + select;
                } else {
                    if (!confirm("Are you sure you want to remove this analysis?")) return;
                    $.ajax({
                        url: "{{url('analysis list/remove')}}",
                        type: 'POST',
                        headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'Select': select
                        }
                    }).done(function (data) {
                        window.location.reload();
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                    });
                }
            }
        });

        $("#show_all, #show_last").change(function() {
            var show_last = document.getElementById("show_last").checked;
            var show_hide = document.getElementById("show_hide");
            $("#Table tr").removeClass("selected");
            $('#actions').addClass('disable');

            if (show_last) {
                show_hide.value = "1";
            } else {
                show_hide.value = "";
            }

            if (document.createEventObject) {
                show_hide.fireEvent("onchange");
            } else {
                var evt = document.createEvent("HTMLEvents");
                evt.initEvent("change", false, true);
                show_hide.dispatchEvent(evt);
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection