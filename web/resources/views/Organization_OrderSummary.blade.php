<?php
    $FakeOrderTable = array( 0=>array("Item"=>"Additional seats for current subscription (1 seats x 10 months x $5.00)", "Price"=>"$50.00"),
                             1=>array("Item"=>"Seat activation (46 seats x $40.00)", "Price"=>"$1840.00"),
                             2=>array("Item"=>"TOTAL", "Price"=>"$1890.00"));

    $Fake_Start_Date = "02/09/2019"; 
    $Fake_End_Date = "01/01/2020"; 
    $Fake_Seat_Count = "51"; 
?>

@extends('layouts.master')

@section('title', 'Order Summary')

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

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_organization_ordersummary_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_ordersummary_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_ordersummary_right_bottom_content')
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

    function UnLoadWindow() {
    }

    $(function () {

        var $Order_Table_1 = $("#Order_Table_1");
        var $Order_Table_2 = $("#Order_Table_2");
        if (<?php echo Auth::user()->date_format ?> == 0) {
            var date_format = 'mmddyyyy';
        } else {
            var date_format = 'ddmmyyyy';
        }

        $Order_Table_1.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            dateFormat: date_format,
            widgets: ["filter", "", "pager"],
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
                pager_size: 4,
                pager_startPage: 0,
                pager_savePages: false,
                pager_fixedHeight: true,
                pager_removeRows: false,
                pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                pager_updateArrows: true
            }
        });

        $Order_Table_2.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            dateFormat: date_format,
            widgets: ["filter", "", "pager"],
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
                pager_size: 1,
                pager_startPage: 0,
                pager_savePages: false,
                pager_fixedHeight: true,
                pager_removeRows: false,
                pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                pager_updateArrows: true
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });

    function init() {
    }

    $(document).ready(function() {

        init();
    });
</script>
@endsection