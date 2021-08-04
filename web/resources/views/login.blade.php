@extends('layouts.master')

@section('title', 'WebABLLS - Login')

@section('head')

<style>

    html {
        background-color: #ffffff;
        padding: 0;
        position:relative;
        min-height:100vh;
    }
    /* body {
        margin-bottom:270px;
    } */
    .page_header {
        position: fixed;
        top: 0;
        width: 100vw;
        z-index: 99;
        clear: both;
    }
    .top_content {
        padding-top:120px;
        z-index: 45;
        /* background-color: #e2e2e2; */
    }
    .left_content {
    }
    .right_top_content {
    }
    .right_bottom_content {
    }
    .bottom_content {
        clear: both;
        z-index: 23;
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
    #email_error_msg { 
        color: red;   
        padding:2px 5px;
    }
    #send_pwd_msg {
        width: 100%;
        text-align: left;
        line-height: 48px;
        color: rgb(50,150,250);
        margin: 0;
        padding: 0;
    }
    #pwd_set_msg {
        text-align: left;
        line-height: 1.5rem;
        color: rgb(50,150,250);
        margin: 0.3rem;
        padding: 0.5rem;
    }
</style>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/tool.js') }}"></script>

@endsection

@section('header')
<div class="page_header">
    @include('contents.login_header')
</div>
@endsection

@section('top_content')
<div class="top_content">
    @include('contents.login_content')
</div>
@endsection

@section('footer')
    <div class="page_footer">
        @include('contents.index_footer')
    </div>
@endsection

@section('script')

<script type='text/javascript'>

    if ("{{$Result->get('CheckResult')}}" === "RESETPASSWORD" && "{{$Result->get('CheckResult')}}" !== "PANDING" && "{{$Result->get('CheckResult')}}" !== "ERROR" && "{{$Result->get('CheckResult')}}" !== "PASSWORDSET") {
        document.getElementById("send_pwd_msg").innerHTML="{{$Result->get('Message')}}";
    } else {
        document.getElementById("send_pwd_msg").innerHTML="";
    }

    if ("{{$Result->get('CheckResult')}}" === "PASSWORDSET" && "{{$Result->get('CheckResult')}}" !== "PANDING" && "{{$Result->get('CheckResult')}}" !== "ERROR" && "{{$Result->get('CheckResult')}}" !== "RESETPASSWORD") {
        document.getElementById("pwd_set_msg").innerHTML="{{$Result->get('Message')}}";
    } else {
        document.getElementById("pwd_set_msg").innerHTML="";
    }

    if ("{{$Result->get('CheckResult')}}" === "ERROR" && "{{$Result->get('CheckResult')}}" !== "PANDING" && "{{$Result->get('CheckResult')}}" !== "RESETPASSWORD" && "{{$Result->get('CheckResult')}}" !== "PASSWORDSET") {
        document.getElementById("email_error_msg").innerHTML="{{$Result->get('Message')}}";
    } else {
        document.getElementById("email_error_msg").innerHTML="";
    }
    
    $("#email").keyup(function() {
        let el = document.getElementById("emailRequired");
        let el2 = document.getElementById("email");
            
            if (!isEmail(email.value)) { //isEmail 
                el.innerHTML = 'Email must be vaild';
                // email.setCustomValidity("Email must be vaild");
            }  else if (el2.value.length > 0) {
                document.getElementById("email_error_msg").innerHTML=("");
            }
    });

// Disable form submissions if there are invalid fields
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
</script>

@endsection