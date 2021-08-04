<?php
    $Faker_Student = array( "Name"=> "William H",
                                     "ID"=>"10772");
    $Faker_Assessment_List = array( 0=>array("Name"=>"James Partington",
                                     "Date"=>"2/15/2020",
                                     "Icon"=>"0",
                                     "Color"=>"red",
                                     "ID"=>"1"),
                            1=>array("Name"=>"James Partington",
                                     "Date"=>"2/17/2020",
                                     "Icon"=>"1",
                                     "Color"=>"green",
                                     "ID"=>"2"),
                                    );
?>

<?php
    
?>

@extends('layouts.master')

@section('title', "Status Report | Reselect Tasks")

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
    .bottom_content {
        margin-top: 5px;
    }
    .page_footer {
        margin-top: 10px;
        flex: 1;
        -webkit-flex: 1;
        -moz-flex: 1;
        -ms-flex: 1;
        -o-flex: 1;
        clear: both;
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
    @include('contents.app_webablls_status_reselecttask_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_status_reselecttask_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_status_reselecttask_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')

<script type="text/javascript">
    //var StudentID =  ''.$Student["ID"].'' ; +php echo

    function UnLoadWindow() {
    }
    
    function TriggerSubmit() {
        var $myForm = $('#worksheet_form');
        if(!$myForm[0].checkValidity()) {
            $myForm.find(':submit').click();
        } else {
            $myForm[0].submit();
        }
    }

    
    window.onbeforeunload = UnLoadWindow;
</script>
@endsection