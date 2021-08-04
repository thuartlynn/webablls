@extends('layouts.master')

@section('title', 'Organization Parameters')

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
    @include('contents.app_webablls_organization_student_parameters_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_student_parameters_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_student_parameters_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script type="text/javascript">

    function TriggerSubmit() {
        var $myForm = $('#studentparametersfrm');
        /*var validation = Array.prototype.filter.call($myForm, function(form) {
            var element = form.querySelectorAll('input');
            for (var i = 0; i < element.length; i++) {
                if (element[i].type == "text" && element[i].classList.contains("check")) {
                    var Item = document.getElementById(element[i].id);
                    if (!Item.value.trim()) {
                        Item.setCustomValidity("Item field is required");
                    }
                }
            }
        });*/
        if(!$myForm[0].checkValidity()) {
            $myForm.find(':submit').click();
        } else {
            $myForm[0].submit();
        }
    }

    function clickFunction(v) {
        if (v.checked == true){
            v.value = "1";
        } else {
            v.value = "0";
        }
    }

    function AddItem(v) {
        var count = 0;
        var Body = document.getElementById(v.value);
        var a = "";
        var addflag = false;
        var element = v.parentElement.querySelectorAll('input');
        for (var i = 0; i < element.length; i++) {
            if (element[i].value.trim()) {
                addflag = true;
            }
            a = '<div style="margin-top: 10px;"> <input value="' + element[i].value + '"style="display: inline;" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="SP[2][Values][2]" id="SP[2].Values[2]" type="text" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/> <button class="btn btn-sm btn-secondary" onclick="Remove(this)" type="button">Remove</button><div class="invalid-feedback">Values field is required</div></div>';
            element[i].value = "";
        }

        if (addflag) {
            Body.innerHTML += a;
            var element = Body.querySelectorAll('input');
            for (var i = 0; i < element.length; i++) {
                if (Body.id == "part-0") {
                    element[i].id = "SP[0].Values[" + count +"]";
                    element[i].name = "SP[0][Values][" + count +"]";
                } else if (Body.id == "part-1") {
                    element[i].id = "SP[1].Values[" + count +"]";
                    element[i].name = "SP[1][Values][" + count +"]";
                } else {
                    element[i].id = "SP[2].Values[" + count +"]";
                    element[i].name = "SP[2][Values][" + count +"]";
                }
                count++;
            }
        }
    }

    function Remove(v) {
        var count = 0;
        var parent = v.parentElement.parentElement;
        v.parentElement.remove();
        var element = parent.querySelectorAll('input');
        for (var i = 0; i < element.length; i++) {
            if (parent.id == "part-0") {
                element[i].id = "SP[0].Values[" + count +"]";
                element[i].name = "SP[0][Values][" + count +"]";
            } else if (parent.id == "part-1") {
                element[i].id = "SP[1].Values[" + count +"]";
                element[i].name = "SP[1][Values][" + count +"]";
            } else {
                element[i].id = "SP[2].Values[" + count +"]";
                element[i].name = "SP[2][Values][" + count +"]";
            }
            count++;
        }
    }

    function UnLoadWindow() {
    }

    $(function () {
        $("#actions li").click(function(e) {
            if ($(this).data("path") != "")
                location.href=$(this).data("path");
        });
        
        window.onbeforeunload = UnLoadWindow;
    });

    function Checkfunc(v) {
        var Item = document.getElementById(v.id);
        Item.defaultValue = Item.value;
        if (!Item.value.trim()) {
            Item.setCustomValidity("Item field is required");
        } else {
            Item.setCustomValidity("");
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
                    /*var element = form.querySelectorAll('input');
                    for (var i = 0; i < element.length; i++) {
                        if (element[i].type == "text" && element[i].classList.contains("check")) {
                            var Item = document.getElementById(element[i].id);
                            if (!Item.value.trim()) {
                                Item.setCustomValidity("Item field is required");
                            }
                        }
                    }*/
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection