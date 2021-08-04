@extends('layouts.master')

@section('title', 'Bulletin Board')

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
<link href="http://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_organization_bulletin_board_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_bulletin_board_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_bulletin_board_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    var row_id;

    function UnLoadWindow() {
    }

    $(document).ready(function() {
        if (<?php echo Auth::user()->date_format ?> == 0) {
            $("#datepicker_start").datepicker({dateFormat: 'mm/dd/yy'});
            $("#datepicker_end").datepicker({dateFormat: 'mm/dd/yy'});
        } else {
            $("#datepicker_start").datepicker({dateFormat: 'dd/mm/yy'});
            $("#datepicker_end").datepicker({dateFormat: 'dd/mm/yy'});
        }
    });

    $(function () {

        var $table = $("#Table");
        var listnum = {{sizeof($Bulletin)}};
        var file;
        var filename;
        var isnew = false;

        if (<?php echo Auth::user()->date_format ?> == 0) {
            var date_format = 'mmddyyyy';
        } else {
            var date_format = 'ddmmyyyy';
        }

        if (listnum > 50) {
            listnum = 50;
        }

        if (listnum > 0) {
            $table.tablesorter({
                sortReset: true,
                sortRestart: true,
                textAttribute: 'data-sort',
                dateFormat: date_format,
                widgets: ["filter", "zebra", "pager"],
                headers: {                    
                    0: { sorter: false },
                    1: { sorter: false },
                    2: { sorter: false },
                },
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
                        container   : '.Bulletin_Board_Pager',       // target the pager markup (wrapper) 
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
        }

        $('#Table td').click(function(event) {
            if ($(this).parent("tr").hasClass('selected')) {
                $("#Table tr").removeClass("selected");
                $('#edit').addClass('app-disable');
                $('#remove').addClass('app-disable');
            } else {
                $("#Table tr").removeClass("selected");
                $(this).parent("tr").addClass('selected');
                $('#edit').removeClass('app-disable');
                $('#remove').removeClass('app-disable');
                row_id = $(this).parent().data("table-row-id");
            }
        });

        $("#new").click(function(e) {

            isnew = true;
            file = "";
            $("#bulletin_delete").addClass('app-disappear');
            $("#delete_button").addClass("app-disappear");
            document.getElementById("Title").value = "";
            document.getElementById("Content").value = "";
            document.getElementById("Standard").checked = false; 
            document.getElementById("Restricted").checked = false;
            document.getElementById("file_name").value = "";
            document.getElementById("datepicker_start").value = "";
            document.getElementById("datepicker_end").value = "";

            $("#Bulletin-box").dialog({
                autoOpen: false,
                width: 600,
                height: 550,
                maxHeight: 1000,
                modal: true,
                close: function () {
                },
                overlay: {
                    opacity: 0.5,
                    background: "black"
                },
                draggable: false,
                resizable: false,
                title: "New Bulletin"
            });
            $("#Bulletin-box").dialog("open");
        });

        $("#edit").click(function(e) {
            if ($(this).hasClass('app-disable')) {
                return;
            }

            isnew = false;
            file = "";
            $("#bulletin_delete").removeClass('app-disappear');
            var Value = <?php echo json_encode($Bulletin); ?>;
            document.getElementById("Title").value = Value[row_id]["Title"];
            if (Value[row_id]["Content"] != null) {
                document.getElementById("Content").value = Value[row_id]["Content"];
            }
            if (Value[row_id]["Standard_Invisible"] == 1) {
                document.getElementById("Standard").checked = true; 
            } else {
                document.getElementById("Standard").checked = false; 
            }
            if (Value[row_id]["Restricted_Invisible"] == 1) {
                document.getElementById("Restricted").checked = true; 
            } else {
                document.getElementById("Restricted").checked = false; 
            }
            document.getElementById("file_name").value = Value[row_id]["FileName"];
            document.getElementById("datepicker_start").value = Value[row_id]["Announcement"];
            document.getElementById("datepicker_end").value = Value[row_id]["Period"];

            if (!document.getElementById("file_name").value.trim()) {
                $("#delete_button").addClass("app-disappear");
            } else {
                $("#delete_button").removeClass("app-disappear");
            }

            $("#Bulletin-box").dialog({
                autoOpen: false,
                width: 600,
                height: 550,
                maxHeight: 1000,
                modal: true,
                close: function () {
                },
                overlay: {
                    opacity: 0.5,
                    background: "black"
                },
                draggable: false,
                resizable: false,
                title: "Edit Bulletin"
            });
            $("#Bulletin-box").dialog("open");
        });

        $("#remove").click(function(e) {
            if ($(this).hasClass('app-disable')) {
                return;
            }

            Remove();
        });

        $("#bulletin_confirm").click(function(e) {
            var Value = <?php echo json_encode($Bulletin); ?>;
            var Title = document.getElementById("Title").value;
            var Content = document.getElementById("Content").value;
            var Standard_Invisible = document.getElementById("Standard").checked;
            var Restricted_Invisible = document.getElementById("Restricted").checked;
            var Announcement_date = document.getElementById("datepicker_start").value;
            var Period = document.getElementById("datepicker_end").value;
            var FileName = document.getElementById("file_name").value;
            var vals = "";
            var New_Announcement_date = "";
            var New_Period = "";

            if (!Title.trim()) {
                alert("Title is required");
                return;
            }

            if (!Announcement_date.trim()) {
                alert("Announcement date is required");
                return;
            }

            if (!Period.trim()) {
                alert("Period is required");
                return;
            }

            if (!dateValidationCheck(Announcement_date, <?php echo Auth::user()->date_format ?>)) {
                alert("Date format is wrong");
                return;
            }

            if (!dateValidationCheck(Period, <?php echo Auth::user()->date_format ?>)) {
                alert("Date format is wrong");
                return;
            }


            if (<?php echo Auth::user()->date_format ?> == 0) {
                New_Announcement_date = Announcement_date;
                New_Period = Period;
            } else {
                vals = Announcement_date.split('/');
                New_Announcement_date = vals[1] + "/" + vals[0] + "/" + vals[2];
                vals = Period.split('/');
                New_Period = vals[1] + "/" + vals[0] + "/" + vals[2];
            }

            if (Date.parse(New_Announcement_date).valueOf() > Date.parse(New_Period).valueOf()){
                alert("Period is wrong");
                return;
            }

            let form_data = new FormData();

            if (file != "") {
                form_data.append('file', file);
            }

            if (FileName.trim()) {
                form_data.append('file_name', FileName);
            }

            form_data.append('Title', Title);

            if (Content.trim()) {
                form_data.append('Content', Content);
            }
            form_data.append('Standard_Invisible', Standard_Invisible);
            form_data.append('Restricted_Invisible', Restricted_Invisible);
            form_data.append('Announcement_date', Announcement_date);
            form_data.append('Period', Period);
            if (isnew == false) {
                form_data.append('ID', Value[row_id]["ID"]);
            }

            $.ajax({
                url: "{{url('Organization/BulletinBoard/Add')}}",
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
            }).done(function (data) {
                window.location.reload();
            }).fail(function (jqXHR, textStatus, errorThrown) {
                alert("Action failed");
                window.location.reload();
            });
        });

        $("#bulletin_cancel").click(function(e) {
            $("#Bulletin-box").dialog("close");
        });

        $("#bulletin_delete").click(function(e) {

            Remove();
        });

        $("#file_upload").change(function (event) {
            event.preventDefault();

            var data = document.getElementById("file_upload").files;

            if (data[0]["size"] > 52428800) {
                alert("File size is over 50MB! Please reduce file size.");
                event.target.value = "";
            } else {
                file = data[0];
                filename = data[0]["name"];
                document.getElementById("file_name").value = filename;
                $("#delete_button").removeClass("app-disappear");
            }
        });

        $("#file_delete").click(function(e) {
            document.getElementById("file_upload").value = "";
            document.getElementById("file_name").value = "";
            file = "";
            $("#delete_button").addClass("app-disappear");
        });

        $("#Bulletin-box").dialog({
            autoOpen: false,
            width: 600,
            height: 550,
            maxHeight: 1000,
            modal: true,
            close: function () {
            },
            overlay: {
                opacity: 0.5,
                background: "black"
            },
            draggable: false,
            resizable: false,
            title: ""
        });

        window.onbeforeunload = UnLoadWindow;
    });

    function Remove() {
        if (!confirm("This action will remove selected item permanetly. Are you sure you want to continue?")) return;
        var Value = <?php echo json_encode($Bulletin); ?>;
        let form_data = new FormData();
        form_data.append('ID', Value[row_id]["ID"]);
        $.ajax({
            url: "{{url('Organization/BulletinBoard/Delete')}}",
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
        }).done(function (data) {
            window.location.reload();
        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert("Action failed");
        });
    }
</script>
@endsection