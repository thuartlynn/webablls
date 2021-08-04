@extends('layouts.master')

@section('title', 'WebABLLS - Details')

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
        background-color: #e2e2e2;
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
    #seatquantity { width: 15rem; }

</style>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/tool.js') }}"></script>

@endsection

@section('header')
<div class="page_header">
  @include('contents.index_header')
</div>
@endsection

@section('top_content')
<div class="top_content">
    @include('contents.details_topcontent')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.details_bcontent')
</div>
@endsection

@section('footer')
  <div class="page_footer">
    @include('contents.index_footer')
  </div>
@endsection

@section('script')

<script type='text/javascript'>
$(function () {
  $("#administrator_email").keyup(function() {
        var email = document.getElementById("administrator_email");
        if (email.value.length === 0) {
            $("#Required").html("Please fill out this field.");
            email.setCustomValidity("Please fill out this field.");
        } else if (!isEmail(email.value)) { //isEmail 
            $("#Required").html("Email must be vaild");
            email.setCustomValidity("Email must be vaild");
        }  else {
            email.setCustomValidity("");
        }
  });

  $("#a_confirm_email").keyup(function() {
        var email = document.getElementById("administrator_email");
        var confirmemail = document.getElementById("a_confirm_email");
        if (confirmemail.value.length === 0) {
            $("#confirmRequired").html("Email confirmation is required");
            confirmemail.setCustomValidity("Email confirmation is required");
        } else if (!isEmail(confirmemail.value)) {
            $("#confirmRequired").html("Email must be vaild");
            confirmemail.setCustomValidity("Email must be vaild");
        } else if (confirmemail.value !== email.value) {
            $("#confirmRequired").html("Email and confirmation must match");
            confirmemail.setCustomValidity("Email and confirmation must match");
        } else {
            $("#confirmRequired").html("");
            confirmemail.setCustomValidity("");
        }
  });

   $("input[type='text']").change(function() {
        CheckSpace();
    });

    $("input[type='text']").keyup(function() {
        CheckSpace();
    });
});

    function CheckSpace() {
        let firstName = document.getElementById("administrator_first_name");
        if (!firstName.value.trim()) {
            firstName.setCustomValidity("Please fill out this field.");
        } else {
            firstName.setCustomValidity("");
        }

        let lastName = document.getElementById("administrator_last_name");
        if (!lastName.value.trim()) {
            lastName.setCustomValidity("Please fill out this field.");
        } else {
            lastName.setCustomValidity("");
        }

    }

  // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        var email = document.getElementById("administrator_email");        
        var confirmemail = document.getElementById("a_confirm_email");
        
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            
            form.addEventListener('submit', function(event) {
                CheckSpace();
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                } else if (email.value != confirmemail.value) {
                    confirmemail.setCustomValidity("Email and confirmation must match");
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