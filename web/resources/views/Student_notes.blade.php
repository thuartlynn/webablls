<?php
    $Filter = "all";
    if (!empty($_GET['filter'])) {
      $Filter = $_GET['filter'];
    }
?>

@extends('layouts.master')

@section('title', "Student Notes")

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
    .app-pager-button {
	    color: #127ebf;
	    font-family: Arial;
	    font-size: 8pt;
	    font-weight: bold;
        margin-top: 5px;
        cursor: pointer;
        display: inline;
    }

    .app-disable {
        color: gray;
    }

    .app-disappear {
        display: none;
    }

    .app-circle {
        border-radius: 3px;
        width: 6px;
        height: 6px;
        background-image: none;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
    }
    .div-overflow {
        overflow:hidden;
    }
    .edit-color {
	    text-align: center; padding-right: 1px; padding-left: 2px; font-size: 7pt; display: inline-block;
    }
    .edit-color .s {
	    width: 6px; height: 6px; float: left; margin: 7px 0px 0px 10px; border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px;
    }
    .edit-color .b {
	    width: 13px; height: 13px; float: left; margin: 3px 0px 0px 5px; background-position: center; border: 1px solid transparent; border-image: none; background-image: url("/images/tgv/bullet_off.png"); background-repeat: no-repeat;
    }
</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/tool.js') }}"></script>

<link href="{{ asset('css/theme.default.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('css/tgv.css') }}" rel="stylesheet"> -->

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_notes_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_notes_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_notes_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    var StudentID = <?php echo ''.$Students["ID"].'' ?>;
    const Permission = <?php echo $Students->get('Permission'); ?>;

    var category_table = [];
    var category_select = 0;

    function UnLoadWindow() {}

    $.urlParam = function(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null) {
           return "all";
        }
        return decodeURI(results[1]) || 0;
    }

    function init() {

        var temp = "";

        var Filter = $.urlParam('filter');

        if (Filter === "all") {
        } else {
            temp = "#" + Filter;
            $(temp).addClass("app-disable");
            $("#notesall").removeClass("app-disable");
            for (var i = 0; i<category_table.length; i++) {
                if (category_table[i] == Filter) {
                    category_select = i;
                }
            }
        }

        if(<?php echo $Students->get("HasAssessment");?> != 0){
            $('#TGV').removeClass("app-disable");
            $('#SAssess').removeClass("app-disable");
        } else {
            $('#TGV').addClass("app-disable");
            $('#SAssess').addClass("app-disable");
        }

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
    }

    $(function () {
        
        init();

        $("#showAll").click(function(){
            $(this).addClass("app-disable");
            window.history.replaceState({},0,'http://'+window.location.host + '/Student/Notes' + '/' + StudentID + '/?filter=all'); //+ '/11' student ID
            $("#showOpen").removeClass("app-disable");
            $("#showPrivate").removeClass("app-disable");
            $(".Open").show();
            $(".Private").show();
        });
        $("#showOpen").click(function(){
            $(this).addClass("app-disable");
            window.history.replaceState({},0,'http://'+window.location.host + '/Student/Notes' + '/' + StudentID + '/?filter=Open');
            $("#showAll").removeClass("app-disable");
            $("#showPrivate").removeClass("app-disable");
            $(".Open").show();
            $(".Private").hide();
            
        });
        $("#showPrivate").click(function(){
            $(this).addClass("app-disable");
            window.history.replaceState({},0,'http://'+window.location.host + '/Student/Notes' + '/' + StudentID + '/?filter=Private');
            $("#showAll").removeClass("app-disable");
            $("#showOpen").removeClass("app-disable");
            $(".Private").show();
            $(".Open").hide();
            
        });
            
        $("#category li").click(function(e) {
            location.href = $(this).data("path");
        });
 
        window.onbeforeunload = UnLoadWindow;
    });

    
</script>
@endsection