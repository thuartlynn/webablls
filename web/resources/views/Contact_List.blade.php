<?php
    $Personal_Contacts_List = array( 0=>array("Name"=>"Test User 1",
                                              "ID"=>"1",
                                              "Email"=>"Test1@tecoimage.com.tw",
                                              "Organization"=>"Organization 1",
                                              "IsUser"=>"1"),
                                     1=>array("Name"=>"Test User 2",
                                              "ID"=>"2",
                                              "Email"=>"Test2@tecoimage.com.tw",
                                              "Organization"=>"Organization 2",
                                              "IsUser"=>"0"),
                                    );

    $Organization_Support_List = array( 0=>array("Name"=>"Test User 1",
                                                 "ID"=>"3",
                                                 "Email"=>"Test1@tecoimage.com.tw",
                                                 "Organization"=>"Organization 1"),
                                        1=>array("Name"=>"Test User 2",
                                                 "ID"=>"4",
                                                 "Email"=>"Test2@tecoimage.com.tw",
                                                 "Organization"=>"Organization 2"),
                                      );

    $Organization_Members_List = array( 0=>array("Name"=>"Test User 1",
                                                 "ID"=>"5",
                                                 "Email"=>"Test1@tecoimage.com.tw",
                                                 "Organization"=>"Organization 1"),
                                        1=>array("Name"=>"Test User 2",
                                                 "ID"=>"6",
                                                 "Email"=>"Test2@tecoimage.com.tw",
                                                 "Organization"=>"Organization 2"),
                                      );

    $WebABBLS_Support_List = array( 0=>array("Name"=>"Test User 1",
                                             "ID"=>"7",
                                             "Email"=>"Test1@tecoimage.com.tw",
                                             "Organization"=>"Organization 1"),
                                    1=>array("Name"=>"Test User 2",
                                             "ID"=>"8",
                                             "Email"=>"Test2@tecoimage.com.tw",
                                             "Organization"=>"Organization 2"),
                                  );
?>

@extends('layouts.master')

@section('title', "Contact List")

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
    @include('contents.app_webablls_contact_list_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_contact_list_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_contact_list_right_bottom_content')
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
        document.getElementById("Warning_message").classList.add("hide");
    });

    $(function () {
        var $table1 = $("#table1");
        var $table2 = $("#table2");
        var $table3 = $("#table3");
        var $table4 = $("#table4");
        var listnum1 = {{sizeof($Personal_Contacts_List)}};
        var listnum2 = {{sizeof($Organization_Support_List)}};
        var listnum3 = {{sizeof($Organization_Members_List)}};
        var listnum4 = {{sizeof($WebABBLS_Support_List)}};
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

        if (listnum4 > 50) {
            listnum4 = 50;
        }
        
        if (listnum1 > 0) {
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
        }

        if (listnum2 > 0) {
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
        }

        if (listnum3 > 0) {
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
        }

        if (listnum4 > 0) {
            $table4.tablesorter({
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
                    pager_size: listnum4,
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
        }

        $('#table1 td').click(function(event) {
            if ($(this).parent("tr").hasClass('selected')) {
                $("#table1 tr").removeClass("selected");
                $('#actions').addClass('disable');
            } else {
                $("#table1 tr").removeClass("selected");
                $(this).parent("tr").addClass('selected');
                $('#actions').removeClass('disable');
                select = $(this).parent().data("table-row-id");
            }
        });

        $("#pager1_collapse").on("click",function() {
            $("#table1").hasClass("app-disappear")?(
                $("#table1").removeClass("app-disappear"),
                $(this).html("Collapse")
            ):(
                $("#table1").addClass("app-disappear"),
                $(this).html("Expand")
            )
        })

        $("#pager2_collapse").on("click",function() {
            $("#table2").hasClass("app-disappear")?(
                $("#table2").removeClass("app-disappear"),
                $(this).html("Collapse")
            ):(
                $("#table2").addClass("app-disappear"),
                $(this).html("Expand")
            )
        })

        $("#pager3_collapse").on("click",function() {
            $("#table3").hasClass("app-disappear")?(
                $("#table3").removeClass("app-disappear"),
                $(this).html("Collapse")
            ):(
                $("#table3").addClass("app-disappear"),
                $(this).html("Expand")
            )
        })

        $("#pager4_collapse").on("click",function() {
            $("#table4").hasClass("app-disappear")?(
                $("#table4").removeClass("app-disappear"),
                $(this).html("Collapse")
            ):(
                $("#table4").addClass("app-disappear"),
                $(this).html("Expand")
            )
        })

        $(".table1 span.poptext:contains('No')").qtip({ content: { text: 'No user account exists for this contact. An existing user account is necessary for share permissions to be enabled.' } });

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
            $("#table4 tr").removeClass("selected");
            $('#actions').addClass('disable');
        });
 
        $('#clear').click(function() {
            $table1.trigger('filterReset').trigger('sortReset');
            $table2.trigger('filterReset').trigger('sortReset');
            $table3.trigger('filterReset').trigger('sortReset');
            $table4.trigger('filterReset').trigger('sortReset');
            var Name = document.getElementById("Name").value = "";
            var Name_hide = document.getElementById("Name_hide").value = "";
        });

        $("#contacts li").click(function(e) {
            location.href = $(this).data("path");
        });

        $("#actions li").click(function(e) {
            if ($("#table1 tr").not(this).hasClass("selected")) {
                //if (!confirm("Are you sure you want to remove this contact?")) return;
                var Url = "{{url('Contact/Remove')}}" + "/" + {{Auth::user()->user_id}} + "/" + select;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: Url,
                    cache: false
                }).done(function(data) {
                    window.location.reload();
                }).fail(function (jqXHR, textStatus, errorThrown) {
                });
            }
        });

        $("#table1 tr").mouseover(function(){
            if ($(this).children().find('span').hasClass('poptext')) {
                $(this).children().find('span').css('color','black');
            }
        });
    
        $("#table1 tr").mouseout(function(){
            if ($(this).children().find('span').hasClass('poptext')) {
                $(this).children().find('span').css('color','red');
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection