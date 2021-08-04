<?php
    include('/web/resources/views/contents/app_webablls_assessment_category_table.blade.php');

    $Filter = "A";
    if (!empty($_GET['filter'])) {
        $Filter = $_GET['filter'];
    }

    if ($AssInfo->get('Initial') == 1) {
        $page_id = 2;
    } else {
        $page_id = 3;
    }

    $color = $AssInfo->get('Color');
?>

@extends('layouts.master')

@section('title', 'Assessment Text Edit')

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
    .dialog_title {
        font-weight: 700;
        font-family: 'Roboto',sans-serif;
        font-size: 10pt;
        text-align: left;
        margin: 10px 0 0 0;
        padding: 0;
    }
    .dialog_content {
        font-weight: 400;
        font-family: 'Roboto',sans-serif;
        font-size: 10pt;
        text-align: left;
        margin: 0;
        padding: 0;
    }
    .tgv-category .b {
        margin: 2px 4px 0px 0px!important;
    }
    .tgv-category .b.se {
        margin: 6px 7px 4px 5px!important;
    }
    .tgv-category .b.p {
        margin: 6px 7px 4px 5px!important;
    }
    .tgv-category .r {
        width: 85px!important;
        height: 15px!important;
        border-left-width: 0px!important;
    }
    .tgv-category .i {
        border-width: 1px 1px 1px 1px!important;
        border-style: solid solid solid solid!important;
        border-color: gray gray gray gray!important;
    }
    .tgv-category .i.q {
        width: 15px!important;
        height: 15px!important;
        margin-right: 6px!important;
    }
    .tgv-category .i.d {
        width: 15px!important;
        height: 15px!important;
        margin-right: 6px!important;
    }
    .tgv-category .i.s {
        width: 15px!important;
        height: 15px!important;
        margin-right: 6px!important;
    }
</style>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/tool.js') }}"></script>
<script src="{{ asset('/js/ablls-tgv.js') }}"></script>
<link href="{{ asset('css/tgv.css') }}" rel="stylesheet">
<link href="http://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_assessment_text_edit_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_assessment_text_edit_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_assessment_text_edit_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    var category_table = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",];
    var category_select = 0;
    var assessmentId = {{$AssInfo->get('AssID')}};

    function UnLoadWindow() {
    }

    $.urlParam = function(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null) {
           return "";
        }
        return decodeURI(results[1]) || 0;
    }

    function init() {

        var temp = "";

        var Filter = $.urlParam('filter');
        if (Filter == "") {
            $("#A").addClass("app-disable");
        } else {
            temp = "#" + Filter;
            $(temp).addClass("app-disable");

            for (var i = 0; i<category_table.length; i++) {
                if (category_table[i] == Filter) {
                    category_select = i;

                    if (category_select == 0) {
                        $("#prev").addClass("app-disappear ");
                    } else if (category_select == (category_table.length-1)) {
                        $("#next").addClass("app-disappear ");
                        //$('#save_change_next').addClass('app-disable');
                    }
                }
            }
        }

        if (!Check_Permission("View Summary", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#list_summary').addClass('app-disable');
        }
        if (!Check_Permission("View Profile", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#list_profile').addClass('app-disable');
        }
        if (!Check_Permission("Total Grid View", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#list_tgv').addClass('app-disable');
        }
        if (!Check_Permission("Student Assessment", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#list_assessments').addClass('app-disable');
        }
        if (!Check_Permission("Share Student", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#list_share').addClass('app-disable');
        }
        if (!Check_Permission("Student History", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#list_history').addClass('app-disable');
        }
        if (!Check_Permission("Student Files", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#list_files').addClass('app-disable');
        }
        if (!Check_Permission("Student Notes", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#list_notes').addClass('app-disable');
        }
        if (!Check_Permission("Add Assessment", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#list_add_assessment').addClass('app-disable');
        }
        if (!Check_Permission("Grid Edit", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#grid_mode').addClass('app-disable');
        }
        if (!Check_Permission("Cat Edit", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#cat_mode').addClass('app-disable');
        }
        if (!Check_Permission("Assessment Details", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#assessment_details').addClass('app-disable');
        }
        if (!Can_Edit("Assessment", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#save_change').addClass('app-disable');
            $('#cancel_change').addClass('app-disable');
            $('#save_change_next').addClass('app-disable');
            edit_flag = false;
        }
    }

    $(function () {

        init();

        $("#student li").click(function(e) {
            if (!$(this).hasClass("app-disable")) {
                location.href=$(this).data("path") + <?php echo $AssInfo->get('ID') ?>;
            }
        });
        
        $("#category li").click(function(e) {
            if (!$(this).hasClass("app-disable")) {
                location.href = $(this).data("path");
            }
        });

        $("#actions li").click(function(e) {
            if (!$(this).hasClass("app-disable")) {
                if ($(this).data("index") == "Save") {
                    save();
                } else if ($(this).data("index") == "SaveAndNext") {
                    save();
                    category_select++;
                    if (category_select >= category_table.length)
                        category_select = 0;
                    location.href = "/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=" + category_table[category_select];
                } else if ($(this).data("index") == "Cancel") {
                    window.location.reload();
                } else {
                    location.href = $(this).data("index");
                }
            }
        });

        $("#StudentAssessments li").click(function(e) {
            if (!$(this).hasClass("app-disable")) {
              location.href = $(this).data("path");
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection