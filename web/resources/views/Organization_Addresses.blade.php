@extends('layouts.master')

@section('title', 'Addresses')

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
    @include('contents.app_webablls_organization_addresses_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_addresses_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_addresses_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<script src="{{ asset('js/bootstrap-select-country.min.js') }}"></script>

<script type="text/javascript">
    var Lock = false;

    function Addr_edit_save(v) {
    }

    function Addr_cancel_delete(v) {
        if (v.classList.contains("delete")) {
            if (Lock) return;
            if (!confirm("Are you sure you want to delete this address?")) return;
            var Url = "{{url('Organization/AddressDelete')}}" + "/" + v.parentElement.id;
            $.ajax({
                url: Url,
                cache: false
            }).done(function(data) {
                //v.parentElement.remove();
                window.location.reload();
            });
        } else {
            window.location.reload();
            /*var element = v.parentElement.querySelectorAll('input, select');
            for (var i = 0; i < element.length; i++) {
                if (element[i].type != "button" && element[i].type != "submit") {
                    element[i].classList.add("disabled-item");
                } else {
                    if (element[i].classList.contains("save")) {
                        element[i].classList.remove("save");
                        element[i].classList.add("edit");
                        element[i].value = "Edit";
                        Lock = false;
                    } else if (element[i].classList.contains("cancel")) {
                        element[i].classList.remove("cancel");
                        element[i].classList.add("delete");
                        element[i].value = "Delete";
                        Lock = false;
                   }
                }
            }*/
        }
    }

    function Addr_cancel() {
        /*if (!$("#Addr_add_part").hasClass("hide")) {
            $("#AddressAddfrm").removeClass("was-validated");
            $("#Addr_add_part").addClass("hide");
        }*/
        window.location.reload();
    }

    function Addr_add() {
        if (Lock) return;
        Lock = true;
        if ($("#Addr_add_part").hasClass("hide")) {
            $("#Addr_add_part").removeClass("hide");
        } else {
            $("#AddressAddfrm").removeClass("was-validated");
            $("#Addr_add_part").addClass("hide");
        }
    }

    function Checkfunc(v) {
        var Item = document.getElementById(v.id);
        if (!Item.value.trim()) {
            Item.setCustomValidity("Item field is required");
        } else {
            Item.setCustomValidity("");
        }
    }

    function CheckOptions() {
        var Name = document.getElementById("Name");
        if (!Name.value.trim()) {
            Name.setCustomValidity("Name field is required");
        }

        var Street = document.getElementById("Street");
        if (!Street.value.trim()) {
            Street.setCustomValidity("Street field is required");
        }

        var City = document.getElementById("City");
        if (!City.value.trim()) {
            City.setCustomValidity("City field is required");
        }

        var Zip = document.getElementById("Zip");
        if (!Zip.value.trim()) {
            Zip.setCustomValidity("Zip field is required");
        }

        var State = document.getElementById("State");
        if (!State.value.trim()) {
            State.setCustomValidity("State field is required");
        }

        var PhoneNumber = document.getElementById("PhoneNumber");
        if (!PhoneNumber.value.trim()) {
            PhoneNumber.setCustomValidity("Phone Number field is required");
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
                    if (form.id != "AddressAddfrm") {
                        var element = form.querySelectorAll('input');
                        for (var i = 0; i < element.length; i++) {
                            if (element[i].type == "text") {
                                var Item = document.getElementById(element[i].id);
                                if (!Item.value.trim()) {
                                    Item.setCustomValidity("Item field is required");
                                }
                            }
                            if ((element[i].type == "submit") && (element[i].classList.contains("edit"))) {
                                if (!Lock) {
                                    form.classList.remove('was-validated');
                                    var element2 = form.parentElement.querySelectorAll('input, select');
                                    for (var j = 0; j < element2.length; j++) {
                                        if (element2[j].type != "button" && element2[j].type != "submit") {
                                            element2[j].classList.remove("disabled-item");
                                        } else {
                                            if (element2[j].classList.contains("edit")) {
                                                element2[j].classList.remove("edit");
                                                element2[j].classList.add("save");
                                                element2[j].value = "Save";
                                                Lock = true;
                                            } else if (element2[j].classList.contains("delete")) {
                                                element2[j].classList.remove("delete");
                                                element2[j].classList.add("cancel");
                                                element2[j].value = "Cancel";
                                            }
                                        }
                                    }
                                };
                                event.preventDefault();
                                event.stopPropagation();
                            } else if ((element[i].type == "submit") && (element[i].classList.contains("save"))) {
                                var checkValidity = true;
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                    checkValidity = false;
                                }
                                form.classList.add('was-validated');
                                var element2 = form.parentElement.querySelectorAll('input, select');
                                for (var j = 0; j < element2.length; j++) {
                                    if (checkValidity) {
                                        if (element2[j].type != "button" && element2[j].type != "submit") {
                                            element2[j].classList.add("disabled-item");
                                        } else {
                                            if (element2[j].classList.contains("save")) {
                                                element2[j].classList.remove("save");
                                                element2[j].classList.add("edit");
                                                element2[j].value = "Edit";
                                                Lock = false;
                                            } else if (element2[j].classList.contains("cancel")) {
                                                element2[j].classList.remove("cancel");
                                                element2[j].classList.add("delete");
                                                element2[j].value = "Delete";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        CheckOptions();
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }
                }, false);
            });
        }, false);
    })();

    function UnLoadWindow() {
    }

    $(function () {
        window.onbeforeunload = UnLoadWindow;
    });
</script>
@endsection