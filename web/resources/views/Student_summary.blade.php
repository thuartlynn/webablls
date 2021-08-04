@extends('layouts.master')

@section('title', 'Student_Summary')

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
        margin-top: 20px;
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

    .disabled {
        color: gray;
        pointer-events: none;
    }

</style>

<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>

<script src="{{ asset('/js/tool.js') }}"></script>

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_summary_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_summary_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_summary_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')

<script type="text/javascript">
    var StudentID = <?php echo ''.$Student["ID"].'' ?>;
    const Permission = <?php echo $Student->get('Permission'); ?>;
    var ansIv = Permission.some(function(item, index, array){
            return item === 'Iv';
        });
    //const Permission2 = "Av";

    function UnLoadWindow() {}
    
    function init() {

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
            $('.share').addClass("app-disable");
        } else {
            
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

        if (!Can_Edit("Student", Permission) && ansIv != true) {
            $(".profile").addClass("disabled");
            $(".share").addClass("disabled");
        } else {
            $(".profile").removeClass("disabled");
            $(".share").removeClass("disabled");
        }

        if (<?php echo $Student->get("HasAssessment");?> != 1) {
            $('#TGV').addClass("app-disable");
            $('#SAssess').addClass("app-disable");
            $('#StudentNotes').addClass("app-disable");
        } else {
            $('#TGV').removeClass("app-disable");
            $('#SAssess').removeClass("app-disable");
            $('#StudentNotes').removeClass("app-disable");
        }
        
    }

    function link2ArchiveS() {
            answer = confirm("app.webablls.net顯示\nThis action will archive student profile. This action can be undone only by Organization Administrator. Are you sure you want to continue?");
                if (answer) {
                    var Url = "{{url('Organization/Students/Archive')}}" + "/" + StudentID;
                    $.ajax({
                            url: Url,
                            type: 'GET',
                            processData: false, //防止jquery將data變成query String
                            cache: false
                        })
                        .done(function (data) { location.href="{{url('Student/List')}}"; })
                        .fail(function (jqXHR, textStatus, errorThrown) { });
                        } else {
                            window.location.reload();
                        }
    }

    $(document).ready(function(){
        init();

        // var ansAv = Permission.some(function(item, index, array){
        //     return item === 'Av';
        // });
        // var ansAm = Permission.some(function(item, index, array){
        //     return item === 'Am';
        // });

        // if ( ansAv === true ){
        //     $("#actions2").addClass("disable");
        //     $("a").addClass("disabled");
        // } else {
        //     $("#actions2").removeClass("disable");
        //     $("a").removeClass("disabled");
        // }
        // if ( ansAm === true ){
        //     $("#share").addClass("disabled");
        // } else {
        //     $("#share").removeClass("disabled");
        // }

        $("#hideReport").click(function(){
            $("#showReport").removeClass("text-secondary");
            $(this).addClass("text-secondary");
            $(".summary-worksheet").hide();
            $(".summary-progressreport").hide();
        });
        $("#showReport").click(function(){
            $("#hideReport").removeClass("text-secondary");
            $(this).addClass("text-secondary");
            $(".summary-worksheet").show();
            $(".summary-progressreport").show();
        });
        $("#showRecent").click(function(){
            $("#showAll").removeClass("text-secondary");
            $(this).addClass("text-secondary");
            $(".old").hide();
        });
        $("#showAll").click(function(){
            $("#showRecent").removeClass("text-secondary");
            $(this).addClass("text-secondary");
            $(".old").show();
        });

        $("a").click(function(e) {
            if ($(this).hasClass("app-disable")) {
                // e.setAttribute( "rel",e.href); // 建議增加空連結.
                // $(this).removeAttr("href");
                $('.share').setAttribute( "disabled",true);

            }
        });

    });
</script>

@endsection