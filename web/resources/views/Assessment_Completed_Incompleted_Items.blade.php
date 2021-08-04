<?php                       
    $Page = 1;
    if (!empty($_GET['page'])) {
        $Page = $_GET['page'];
    }

    if ($Page == 1) {
        $Title = "Completed Items";
    } else {
        $Title = "Incompleted Items";
    }

    $Filter = "all";
    if (!empty($_GET['filter'])) {
      $Filter = $_GET['filter'];
    }

    $From = "total";
    if (!empty($_GET['from'])) {
      $From = $_GET['from'];
    }

    if ($From == "total") {
      $ID = $AssInfo->get('ID');
    } else {
      $ID = $AssInfo->get('AssID');
    }
?>

@extends('layouts.master')

@section('title', 'Assessment '.$Title.'')

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

    .app-pager-button {
	    color: #127ebf;
	    font-family: Arial;
	    font-size: 8pt;
	    font-weight: bold;
        margin-top: 5px;
        cursor: pointer;
    }

    .app-circle {
        border-radius: 3px;
        width: 6px;
        height: 6px;
        background-image: none;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
    }

</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/tool.js') }}"></script>
@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_assessment_completed_incompleted_items_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_assessment_completed_incompleted_items_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_assessment_completed_incompleted_items_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    var category_table = [];
    var category_select = 0;

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

        var Value = <?php echo json_encode($CompleteItems); ?>;          
        var temp = "";

        Object.keys(Value).forEach(function(key, value) {
            var Signlanguageflg = 0;
            if (key == "H") {
                for (var i = 0; i < Value[key].length; i++) {
                    if (Value[key].length == 1 && Value[key][i]["Index"] == "H3" && <?php echo $AssInfo->get('Signlanguage') ?> == 0) {
                        Signlanguageflg = 1;
                    }
                }
            }
            if (Signlanguageflg == 0) {
                category_table.push(key);
                temp = "#" + key;
                $(temp).removeClass("app-disappear"); 
            }
        });

        var Filter = $.urlParam('filter');
        if (Filter == "all") {
            $("#all").addClass("app-disable");
        } else {
            temp = "#" + Filter;
            $(temp).addClass("app-disable");

            for (var i = 0; i<category_table.length; i++) {
                if (category_table[i] == Filter) {
                    category_select = i;

                    if (category_table.length == 1) {
                        $("#prev").addClass("app-disappear");
                        $("#prev2").addClass("app-disappear");
                        $("#prev3").addClass("app-disappear");
                        $("#next").addClass("app-disappear");
                        $("#next2").addClass("app-disappear");
                        $("#next3").addClass("app-disappear");
                    } else if (category_select == 0) {
                        $("#prev").addClass("app-disappear");
                        $("#prev2").addClass("app-disappear");
                        $("#prev3").addClass("app-disappear");
                    } else if (category_select == (category_table.length-1)) {
                        $("#next").addClass("app-disappear");
                        $("#next2").addClass("app-disappear");
                        $("#next3").addClass("app-disappear");
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
    }

    $(function () {

        init();
        
        $("#category li").click(function(e) {
            if (!$(this).hasClass("app-disable")) {
                location.href = $(this).data("path");
            }
        });

        $("#actions li").click(function(e) {
            if (!$(this).hasClass("app-disable") && $(this).data("index") != "Pre" & $(this).data("index") != "Next") {
                location.href="{{url('Assessment/CompletedItemsIncompletedItems/Report')}}" + "/" + "{{$ID}}" + "?from=" + "{{$From}}" + "&page=" + "{{$Page}}" + "&filter=" + $(this).data("index");
            }
        });

        $("#student li").click(function(e) {
            if (!$(this).hasClass("app-disable")) {
                location.href=$(this).data("path") + <?php echo $AssInfo->get('ID') ?>;
            }
        });

        $(".prev, .next").click(function(e) {
            if ($(this).hasClass("next")) {
                if (category_select == (category_table.length-1)) {
                    return;
                }
                category_select++;
            } else {
                if (category_select == 0) {
                    return;
                }
                category_select--;
            }
            if ({{$Page}} == 1) {
                location.href = "/Assessment/CompletedItems/{{$ID}}/?from={{$From}}&page={{$Page}}&filter=" + category_table[category_select];
            } else {
                location.href = "/Assessment/IncompletedItems/{{$ID}}/?from={{$From}}&page={{$Page}}&filter=" + category_table[category_select];
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection