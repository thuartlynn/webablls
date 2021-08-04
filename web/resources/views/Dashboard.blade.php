<?php
    $System_Messages = array( 0=>array("Date"=>"12/19/2019",
                                       "Subject"=>"Student coordinator set.",
                                       "Messgae"=>"You have been set as the coordinator for student Michael lmitation",),
                              1=>array("Date"=>"04/09/2018",
                                       "Subject"=>"Student coordinator set.",
                                       "Messgae"=>"You have been set as the coordinator for student Michael lmitation",),
                            );

    $Name = $Login_History[0]->get('Name');
    $Last_Logged = $Login_History[0]->get('Last_Login');
?>
@extends('layouts.master')

@section('title', 'Dashboard')

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
    @include('contents.app_webablls_dashboard_left_pan')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_dashboard_right_bottom_content')
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
    
    $(document).ready(function() {
        if (sessionStorage.getItem("display") != null) {
            $("#message").addClass("app-disappear");
        }
    });

    $(function () {
        var $table1 = $("#table1");
        var $table2 = $("#table2");
        var $table3 = $("#table3");
        var listnum1 = 50;
        var listnum2 = {{sizeof($System_Messages)}};
        var listnum3 = {{sizeof($Login_History)}};
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

        $table1.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            dateFormat: date_format,
            widgets: ["filter", "zebra", "pager"],
            cssChildRow: "tablesorter-childRow",
            headers: {                    
                    0: { sorter: false },
                    1: { sorter: false },
                    2: { sorter: false },
                    3: { sorter: false },
                },
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
                pager_fixedHeight: false,
                pager_removeRows: false,
                pager_output: '{startRow}–{endRow}/{totalRows}',
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

        $table1.delegate('.toggle', 'click' ,function() {

            if ($(this).closest('tr').hasClass("tablesorter-hasChildRow")) {
                $(this).html("more");
                $(this).closest('tr').removeClass("tablesorter-hasChildRow")
                $(this).closest('tr').nextUntil('tr:not(.tablesorter-childRow)').remove();
            } else {
                $(this).html("less");
                var index = $(this).data("index");
                var string = "";
                var Bulletin_Board_Array = <?php echo json_encode($Bulletin); ?>;
                if (Bulletin_Board_Array[index]["Content"].trim()) {
                    string = string + "<div>" + Bulletin_Board_Array[index]["Content"] + "</div>";
                }
                $(this).parent().parent()[0].outerHTML = $(this).parent().parent()[0].outerHTML + '<tr class="tablesorter-childRow"> <td colspan="4">' + string +' </td> </tr>';
            }
            $table1.trigger('updateAll');

            return false;
        });

        $table2.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            dateFormat: date_format,
            widgets: ["filter", "zebra", "pager"],
            cssChildRow: "tablesorter-childRow",
            headers: {                    
                    0: { sorter: false },
                    1: { sorter: false },
                },
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
                pager_output: '{startRow}–{endRow}/{totalRows}',
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
            cssChildRow: "tablesorter-childRow",
            headers: {                    
                    0: { sorter: false },
                    1: { sorter: false },
                },
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
                pager_output: '{startRow}–{endRow}/{totalRows}',
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

        if (<?php echo Auth::user()->layout_format?> == 0) {
            $("#pager1").css('display', '');
            $("#table1").addClass("app-disappear");
            $("#pager1").addClass("app-disappear");
            $("#pager1_collapse").html("Expand");

            $("#pager2").css('display', '');
            $("#table2").addClass("app-disappear");
            $("#pager2").addClass("app-disappear");
            $("#pager2_collapse").html("Expand");

            $("#pager3").css('display', '');
            $("#table3").addClass("app-disappear");
            $("#pager3").addClass("app-disappear");
            $("#pager3_collapse").html("Expand");
        }

        $("#pager1_collapse").on("click",function() {
            $("#table1").hasClass("app-disappear")?(
                $("#pager1").css('display', ''),
                $("#table1").removeClass("app-disappear"),
                $("#pager1").removeClass("app-disappear"),
                $(this).html("Collapse")
            ):(
                $("#pager1").css('display', ''),
                $("#table1").addClass("app-disappear"),
                $("#pager1").addClass("app-disappear"),
                $(this).html("Expand")
            )
        })

        $("#pager2_collapse").on("click",function() {
            $("#table2").hasClass("app-disappear")?(
                $("#table2").removeClass("app-disappear"),
                $("#pager2").removeClass("app-disappear"),
                $(this).html("Collapse")
            ):(
                $("#table2").addClass("app-disappear"),
                $("#pager2").addClass("app-disappear"),
                $(this).html("Expand")
            )
        })

        $("#pager3_collapse").on("click",function() {
            $("#table3").hasClass("app-disappear")?(
                $("#table3").removeClass("app-disappear"),
                $("#pager3").removeClass("app-disappear"),
                $(this).html("Collapse")
            ):(
                $("#table3").addClass("app-disappear"),
                $("#pager3").addClass("app-disappear"),
                $(this).html("Expand")
            )
        })

        $("#add").on("click",function() {
            var Body = document.getElementById("todo");

            if (Body.parentElement.querySelectorAll('li').length >= 5) {
                return;
            }
            $("#add_item").hasClass("app-disappear")?(
                $("#add_item").removeClass("app-disappear")
            ):(
                $("#add_item").addClass("app-disappear")
            )

            document.getElementById("title").value = "";
            document.getElementById("details").value = "";
            if ($('#finish').attr('disabled') == undefined) {
                $('#finish').attr('disabled', 'disabled');
            }
        })

        $("#finish").on("click",function() {
            var title = document.getElementById("title").value;
            var details = document.getElementById("details").value;
            //var Body = document.getElementById("todo");

            $.ajax({
                url: "{{url('Dashboard/Add')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'User': {{Auth::user()->user_id}},
                    'Title': title,
                    'Details': details,
                }
            }).done(function (data) {
                /*var count = 1;
                var Body = document.getElementById("todo");
                Body.parentElement.querySelectorAll('li').forEach(element => {
                    count++;
                });
                var string = '<li class="app-nopadding-nomargin">'+title+'<br>'+details+'<br><p data-index="'+count+'" onclick="clickFunction(this)" style="margin: 0; text-decoration: underline; cursor: pointer;">Remove this item</p></li>';
                Body.innerHTML+=string;*/
                window.location.reload();
            }).fail(function (jqXHR, textStatus, errorThrown) {
                alert("Action failed");
            });
        })

        $("#dismiss").on("click",function() {
            $("#message").addClass("app-disappear");

            if (typeof(Storage) !== "undefined") {
                sessionStorage.setItem("display", 1);
            }
        })

        window.onbeforeunload = UnLoadWindow;
    });

    function Listener(event) {
        var title = document.getElementById("title").value;
        var details = document.getElementById("details").value;
        if (!title.trim() || !details.trim()) {
            if ($('#finish').attr('disabled') == undefined) {
                $('#finish').attr('disabled', 'disabled');
            }
        } else {
            if ($('#finish').attr('disabled') !== undefined) {
                $('#finish').removeAttr('disabled');
            }
        }
    }

    function clickFunction(v) {

        $.ajax({
            url: "{{url('Dashboard/Remove')}}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'User': {{Auth::user()->user_id}},
                'ID': $(v).data('index')
            }
        }).done(function (data) {
            //v.parentElement.remove();
            window.location.reload();
        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert("Action failed");
        });
    }
</script>
@endsection