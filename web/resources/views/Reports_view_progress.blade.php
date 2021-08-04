<?php
    $Faker_Student = array( "Name"=> "William H",
                                     "ID"=>"10772");
    $Filter = 1;
    if (!empty($_GET['page'])) {
        $Filter = $_GET['page'];
    }
?>

@extends('layouts.master')

@section('title', "Progress Report")

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
    @include('contents.app_webablls_progress_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_progress_right_top_content')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.app_webablls_progress_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')

<script type="text/javascript">
    var changes = false;
    //var StudentID =  ''.$Student["ID"].'' ; +php echo

    function UnLoadWindow() {
    }
    
    function TriggerSubmit() {
        var $myForm = $('#progress_form');
        if(!$myForm[0].checkValidity()) {
            $myForm.find(':submit').click();
        } else {
            $myForm[0].submit();
        }
    }

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
    })();

    $().save({
        saveCallback: save,
        cancelCallback: cancel,
        Warnign: 'There are unsaved changes. Be sure to save them before you leave this page. All unsaved changes will be lost.',
        Save: 'Save',
        Cancel: 'Cancel',
        Confirm: 'Changes have been saved'
    });

    function cancel() {
        window.location.reload();
    }

    function save() {
        TriggerSubmit();
        $().save.save();
        changes = !1;
    }

    function change() {
        if (!changes) {
                changes = true;
                $().save.change();
            }
    }

    $(function () {
        $("textarea").change(function() {
            change();
        });
        $("#datepicker").change(function() {
            change();
        });
    });

    function init() {
        if (<?php echo Auth::user()->date_format ?> == 0) {
            $( "#datepicker" ).datepicker({dateFormat: 'mm/dd/yy'});
        } else {
            $( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy'});
        }
    }
    $(document).ready(function() {
        init();
    });

    window.onbeforeunload = UnLoadWindow;
</script>
@endsection