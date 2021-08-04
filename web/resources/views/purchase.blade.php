@extends('layouts.master')

@section('title', 'WebABLLS - Purchase')

@section('head')
<link href="{{ asset('css/bootstrap-select-country.min.css') }}" rel="stylesheet">

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
</style>

@endsection

@section('header')
<div class="page_header">
  @include('contents.index_header')
</div>
@endsection

@section('top_content')
<div class="top_content">
    @include('contents.purchase_topcontent')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.purchase_bcontent')
</div>
@endsection

@section('footer')
    <div class="page_footer">
        @include('contents.index_footer')
    </div>
@endsection

@section('script')

<script src="{{ asset('js/bootstrap-select-country.min.js') }}"></script>

<script type='text/javascript'>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        CheckSpace();
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

    if ("{{$OrgNameCheck->get('CheckResult')}}" === "Error" ) {
        document.getElementById("invalid-orgname").innerHTML=("{{$OrgNameCheck->get('Message')}}");
    } else {
        document.getElementById("invalid-orgname").innerHTML=("");
    }
    function orgNamechange() {
        document.getElementById("invalid-orgname").innerHTML=("");
    }
        
    $(function () {

        $("input[type='text']").change(function() {
            orgNamechange();
            CheckSpace();
        });

        $("input[type='text']").keyup(function() {
            orgNamechange();
            CheckSpace();
        });

    });

    function CheckSpace() {
        let orgName = document.getElementById("organization_name");
        if (!orgName.value.trim()) {
            orgName.setCustomValidity("Organization or Registered Name field is required.");
        } else {
                orgName.setCustomValidity("");
        }

        let addressName = document.getElementById("Address_name");
        if (!addressName.value.trim()) {
            addressName.setCustomValidity("Name / Company name field is required.");
        } else {
            addressName.setCustomValidity("");
        }

        let streetName = document.getElementById("Address_street");
        if (!streetName.value.trim()) {
            streetName.setCustomValidity("Street field is required.");
        } else {
            streetName.setCustomValidity("");
        }

        let cityName = document.getElementById("Address_city");
        if (!cityName.value.trim()) {
            cityName.setCustomValidity("City field is required.");
        } else {
            cityName.setCustomValidity("");
        }

        let zipcodeName = document.getElementById("Address_zipcode");
        if (!zipcodeName.value.trim()) {
            zipcodeName.setCustomValidity("Zip/Postal code field is required.");
        } else {
            zipcodeName.setCustomValidity("");
        }

        let stateName = document.getElementById("Address_state");
        if (!stateName.value.trim()) {
            stateName.setCustomValidity("Zip/Postal code field is required.");
        } else {
            stateName.setCustomValidity("");
        }

        let phoneName = document.getElementById("phone");
        if (!phoneName.value.trim()) {
            phoneName.setCustomValidity("Phone Number field is required.");
        } else {
            phoneName.setCustomValidity("");
        }
    }

</script>

@endsection