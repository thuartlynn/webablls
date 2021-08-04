@extends('layouts.master')

@section('title', 'Archived Students')

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

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_organization_archived_students_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_archived_students_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_archived_students_right_bottom_content')
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
        var $table = $("#UserTable");
        var select = 0;
        var listnum = {{sizeof($ArchivedData)}};
        if (<?php echo Auth::user()->date_format ?> == 0) {
            var date_format = 'mmddyyyy';
        } else {
            var date_format = 'ddmmyyyy';
        }

        if (listnum > 50) {
            listnum = 50;
        }

        $table.tablesorter({
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
                pager_size: listnum,
                pager_startPage: 0,
                pager_savePages: false,
                pager_fixedHeight: true,
                pager_removeRows: false,
                pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                pager_updateArrows: true
            }
        });
        
        $('#UserTable td').click(function(event) {
            if ($(this).parent("tr").hasClass('selected')) {
                $("#UserTable tr").removeClass("selected");
                $('#actions').addClass('disable');
            } else {
                $("#UserTable tr").removeClass("selected");
                $(this).parent("tr").addClass('selected');
                $('#actions').removeClass('disable');
                select = $(this).parent().data("table-row-id");
            }
        });

        $('#filter').click(function(event) {
            var Name = document.getElementById("Name_ID");
            var Name_hide = document.getElementById("Name_ID_hide");

            Name_hide.value = Name.value;
            if (document.createEventObject) {
                Name_hide.fireEvent("onchange");
            } else {
                var evt = document.createEvent("HTMLEvents");
                evt.initEvent("change", false, true);
                Name_hide.dispatchEvent(evt);
            }
            $("#UserTable tr").removeClass("selected");
            $('#actions').addClass('disable');
        });
 
        $('#clear').click(function() {
            $table.trigger('filterReset').trigger('sortReset');
            var Name = document.getElementById("Name_ID").value = "";
            var Name_hide = document.getElementById("Name_ID_hide").value = "";
        });

        $("#actions li").click(function(e) {
            if ($("#UserTable tr").not(this).hasClass("selected")) {
                console.log($(this).data("index"));
                if ($(this).data("index") == "Delete") {
                    if (!confirm("This action will delete students profile from system permanently. This action cannot be undone. Are you sure you want to continue?")) return;
                    var Url = "{{url('Organization/ArchivedStudents/Delete')}}" + "/" + select;
                    $.ajax({
                        url: Url,
                        cache: false
                    }).done(function(data) {
                        window.location.reload();
                        //document.getElementsByClassName("selected")[0].remove();
                        //listnum--;
                        //$table.trigger('pageSize', listnum);
                        //$table.trigger('update');
                    });
                } else {
                    var Url = "{{url('Organization/ArchivedStudents/Unarchive')}}" + "/" + select;
                    $.ajax({
                        url: Url,
                        cache: false
                    }).done(function(data) {
                        window.location.reload();
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                    });
                }
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection