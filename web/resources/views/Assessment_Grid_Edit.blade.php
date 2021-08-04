@extends('layouts.master')

@section('title', 'Assessment Grid Edit')

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
    @include('contents.app_webablls_assessment_grid_edit_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_assessment_grid_edit_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_assessment_grid_edit_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">
    var assessmentId = {{$AssInfo->get('AssID')}};

    function UnLoadWindow() {
    }

    $(function () {
        
        $("#actions li").click(function(e) {
            if (!$(this).hasClass("app-disable")) {
                if ($(this).data("index") == "Save") {
                    save();
                } else if ($(this).data("index") == "Cancel") {
                    window.location.reload();
                } else {
                    location.href=$(this).data("index");
                }
            }
        });

        $("#StudentAssessments li").click(function(e) {
            if (!$(this).hasClass("app-disable")) {
                location.href="/Assessment/TgvGridEdit/" + $(this).data("index");
            }
        });

        $("#student li").click(function(e) {
            if (!$(this).hasClass("app-disable")) {
                location.href=$(this).data("path") + <?php echo $AssInfo->get('ID') ?>;
            }
        });

        window.onbeforeunload = UnLoadWindow;
    });

    function init() {
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
        if (!Check_Permission("Text Edit", <?php echo $AssInfo->get('Permission') ?>)) {
            $('#text_mode').addClass('app-disable');
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
            edit_flag = false;
        }
    }

    $(document).ready(function() {

        init();
    });
</script>
@endsection