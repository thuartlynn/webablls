@extends('layouts.master')

@section('title', 'Student_share student')

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
</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href="{{ asset('css/theme.default.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('/js/jquery.tablesorter.widgets.js') }}"></script>
<script src="{{ asset('/js/widget-pager.js') }}"></script>
<link href="{{ asset('css/jquery.tablesorter.pager.css') }}" rel="stylesheet">
<script src="{{ asset('/js/tool.js') }}"></script>  

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_shareStudent_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_shareStudent_right_top_content')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.app_webablls_shareStudent_bottom_content')
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

    var changes = false;

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

    function AddContact() {
        var str = document.getElementById("ContactEmail");
        var err = document.getElementById("addcontact_error");
        if (str.value.length == 0) {
            $("#addcontact_error").removeClass('hide');
            $("#addcontact_error").html("Enter email address.");
        } else if (!isEmail(str.value)) {
            $("#addcontact_error").removeClass('hide');
            $("#addcontact_error").html("Email must be vaild");
        } else {
            
            $.ajax({
                    url: "{{url('/Student/ShareStudent')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'Contact': str.value
                    }
            }).done(function (data) {
                $("#addcontact_error").addClass('hide');
                $("#addcontact_success").removeClass('hide');
            }).fail(function (jqXHR, textStatus, errorThrown) {
                $('#addcontact_error').removeClass('hide');
                $("#addcontact_error").html("Not success");
            });
        }
    }

    function TriggerSubmit() {
        var myForm = $('#Studentsuserlinksfrm');
        if(!myForm[0].checkValidity()) {
            myForm.find(':submit').click();
        } else {
            myForm[0].submit();
        }
    }

    function cancel() {
        window.location.reload();
    }

    $().save({
        saveCallback: save,
        cancelCallback: cancel,
        Warnign: 'There are unsaved changes. Be sure to save them before you leave this page. All unsaved changes will be lost.',
        Save: 'Save',
        Cancel: 'Cancel',
        Confirm: 'Changes have been saved'
    });

    function save() {
        TriggerSubmit();
        $().save.save();
        changes = !1;
    }

    function UnLoadWindow() {
    }

    $(function () {
        init();
        
        // var $Personal_Contacts_Table = $("#Personal_Contacts_Table");
        var $Organization_Members_Table = $("#Organization_Members_Table");
        // var $WebABLLS_Support_Table = $("#WebABLLS_Support_Table");
        // var select = 0;
        var listnumOrg = {{$OrgMember->count()}};
        if (listnumOrg > 50) {
            listnumOrg = 50;
        }

        // $Personal_Contacts_Table.tablesorter({
        //     sortReset: true,
        //     sortRestart: true,
        //     textAttribute: 'data-sort',
        //     headers: {                    
        //             3: { sorter: false },
        //             4: { sorter: false },
        //             5: { sorter: false },
        //             6: { sorter: false },
        //             7: { sorter: false },
        //             8: { sorter: false },
        //         },
        //     widgets: ["filter", "zebra", "pager"],
        //     widgetOptions: {
        //         filter_external: '.search',
        //         filter_defaultFilter: { 1: '~{query}' },
        //         filter_columnFilters: false,
        //         filter_saveFilters: false,
        //         filter_columnAnyMatch: true,
        //         filter_reset: '.reset',
        //         filter_anyMatch: true,
        //         pager_size: 10,
        //         pager_startPage: 0,
        //         pager_savePages: false,
        //         pager_fixedHeight: true,
        //         pager_removeRows: false,
        //         pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
        //         pager_updateArrows: true,
        //         pager_selectors: { 
 		// 			container   : '.Personal_Contacts_Pager',       // target the pager markup (wrapper) 
 		// 			first       : '.first',       // go to first page arrow 
 		// 			prev        : '.prev',        // previous page arrow 
 		// 			next        : '.next',        // next page arrow 
 		// 			last        : '.last',        // go to last page arrow 
 		// 			gotoPage    : '.gotoPage',    // go to page selector - select dropdown that sets the current page 
 		// 			pageDisplay : '.pagedisplay', // location of where the "output" is displayed 
 		// 			pageSize    : '.pagesize'     // page size selector - select dropdown that sets the "size" option 
 		// 		},
        //     }
        // });

        $Organization_Members_Table.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            headers: {                    
                    3: { sorter: false },
                    4: { sorter: false },
                    5: { sorter: false },
                    6: { sorter: false },
                    7: { sorter: false },
                    8: { sorter: false },
                },
            widgets: ["filter", "zebra", "pager"],
            widgetOptions: {
                filter_external: '.search',
                filter_defaultFilter: { 1: '~{query}' },
                filter_columnFilters: false,
                filter_saveFilters: false,
                filter_columnAnyMatch: true,
                filter_reset: '.reset',
                filter_anyMatch: true,
                pager_size: listnumOrg,
                pager_startPage: 0,
                pager_savePages: false,
                pager_fixedHeight: true,
                pager_removeRows: false,
                pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                pager_updateArrows: true,
                pager_selectors: { 
 					container   : '.pager',       // target the pager markup (wrapper) 
 					first       : '.first',       // go to first page arrow 
 					prev        : '.prev',        // previous page arrow 
 					next        : '.next',        // next page arrow 
 					last        : '.last',        // go to last page arrow 
 					gotoPage    : '.gotoPage',    // go to page selector - select dropdown that sets the current page 
 					pageDisplay : '.pagedisplay', // location of where the "output" is displayed 
 					pageSize    : '.pagesize'     // page size selector - select dropdown that sets the "size" option 
 				},
            }
        });

        // $WebABLLS_Support_Table.tablesorter({
        //     sortReset: true,
        //     sortRestart: true,
        //     textAttribute: 'data-sort',
        //     headers: {                    
        //             3: { sorter: false },
        //             4: { sorter: false },
        //             5: { sorter: false },
        //             6: { sorter: false },
        //             7: { sorter: false },
        //             8: { sorter: false },
        //         },
        //     widgets: ["filter", "zebra", "pager"],
        //     widgetOptions: {
        //         filter_external: '.search',
        //         filter_defaultFilter: { 1: '~{query}' },
        //         filter_columnFilters: false,
        //         filter_saveFilters: false,
        //         filter_columnAnyMatch: true,
        //         filter_reset: '.reset',
        //         filter_anyMatch: true,
        //         pager_size: 10,
        //         pager_startPage: 0,
        //         pager_savePages: false,
        //         pager_fixedHeight: true,
        //         pager_removeRows: false,
        //         pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
        //         pager_updateArrows: true,
        //         pager_selectors: { 
 		// 			container   : '.WebABLLS_Support_Pager',       // target the pager markup (wrapper) 
 		// 			first       : '.first',       // go to first page arrow 
 		// 			prev        : '.prev',        // previous page arrow 
 		// 			next        : '.next',        // next page arrow 
 		// 			last        : '.last',        // go to last page arrow 
 		// 			gotoPage    : '.gotoPage',    // go to page selector - select dropdown that sets the current page 
 		// 			pageDisplay : '.pagedisplay', // location of where the "output" is displayed 
 		// 			pageSize    : '.pagesize'     // page size selector - select dropdown that sets the "size" option 
 		// 		},
        //     }
        // });

        $("#actions li").click(function(e) {
            if (changes) {
                if ($(this).data("index") == "Save") {
                    save();
                } else {
                    cancel();
                }
            }
        });

        $(".tablesorter select, .tablesorter input").on("change", function () {
            if (!changes) {
                changes = true;
                $().save.change();
                $('#actions').removeClass('disable');
            }
        });

        $(".tablesorter .OwnerRights").on("change", function() {
            var val = $(this).is(":checked");
            if (val) {
                $(this).val("1");
                $(this).closest("tr").find(".FullAccess").attr("disabled", "disabled");
                $(this).closest("tr").find(".BasicInfo").attr("disabled", "disabled");
                $(this).closest("tr").find(".AssessmentsAndReports").attr("disabled", "disabled");
                $(this).closest("tr").find(".Files").attr("disabled", "disabled");
                $(this).closest("tr").find(".Analytics").attr("disabled", "disabled");
            } else {
                $(this).val("0");
                $(this).closest("tr").find(".FullAccess").removeAttr("disabled", "disabled");
                $(this).closest("tr").find(".BasicInfo").removeAttr("disabled", "disabled");
                $(this).closest("tr").find(".AssessmentsAndReports").removeAttr("disabled", "disabled");
                $(this).closest("tr").find(".Files").removeAttr("disabled", "disabled");
                $(this).closest("tr").find(".Analytics").removeAttr("disabled", "disabled");
            }
        });

        $(".tablesorter .FullAccess").on("change", function() {
            var val = $(this).find('option:selected').val();
            if (val == 0) {
                $(this).closest("tr").find(".OwnerRights").prop('disabled', false);
                $(this).closest("tr").find(".BasicInfo").removeAttr("disabled", "disabled");
                $(this).closest("tr").find(".AssessmentsAndReports").removeAttr("disabled", "disabled");
                $(this).closest("tr").find(".Files").removeAttr("disabled", "disabled");
                $(this).closest("tr").find(".Analytics").removeAttr("disabled", "disabled");
            } else {
                $(this).closest("tr").find(".OwnerRights").prop('disabled', true);
                $(this).closest("tr").find(".BasicInfo").attr("disabled", "disabled");
                $(this).closest("tr").find(".AssessmentsAndReports").attr("disabled", "disabled");
                $(this).closest("tr").find(".Files").attr("disabled", "disabled");
                $(this).closest("tr").find(".Analytics").attr("disabled", "disabled");
            }
        });

        $(".tablesorter tbody tr").each(function() {
            var owner = $(this).find(".OwnerRights").is(":checked");
            if (owner) {
                $(this).find(".FullAccess").attr("disabled", "disabled");
                $(this).find(".BasicInfo").attr("disabled", "disabled");
                $(this).find(".AssessmentsAndReports").attr("disabled", "disabled");
                $(this).find(".Files").attr("disabled", "disabled");
                $(this).find(".Analytics").attr("disabled", "disabled");
                return;
            }
            var fullAccess = $(this).find(".FullAccess").find('option:selected').val();
            if (fullAccess > 0) {
                $(this).find(".OwnerRights").prop('disabled', true);
                $(this).find(".BasicInfo").attr("disabled", "disabled");
                $(this).find(".AssessmentsAndReports").attr("disabled", "disabled");
                $(this).find(".Files").attr("disabled", "disabled");
                $(this).find(".Analytics").attr("disabled", "disabled");
            }
        });

        // $(".app-select-list span").on("click", function() {
        //     if (!$(this).hasClass('select')) {
        //         $('.app-select-list').find('.select').addClass('no-select');
        //         $('.app-select-list').find('.select').removeClass('select');
        //         $(this).addClass('select');
        //         $(this).removeClass('no-select');
        //         if ($(this).data("index") == "Authorized_User") {
        //             if ($('#Authorized_User_Pager').hasClass('hide')) {
        //                 $('#Authorized_User_Pager').removeClass('hide');
        //             }
        //             $('#Personal_Contacts_Pager').not('.hide').addClass('hide');
        //             $('#Organization_Members_Pager').not('.hide').addClass('hide');
        //             $('#WebABLLS_Support_Pager').not('.hide').addClass('hide');
        //             if ($('#Authorized_User_Table').hasClass('hide')) {
        //                 $('#Authorized_User_Table').removeClass('hide');
        //             }
        //             $('#Personal_Contacts_Table').not('.hide').addClass('hide');
        //             $('#Organization_Members_Table').not('.hide').addClass('hide');
        //             $('#WebABLLS_Support_Table').not('.hide').addClass('hide');
        //         } else if ($(this).data("index") == "Personal_Contacts") {
        //             $('#Authorized_User_Pager').not('.hide').addClass('hide');
        //             if ($('#Personal_Contacts_Pager').hasClass('hide')) {
        //                 $('#Personal_Contacts_Pager').removeClass('hide');
        //             }
        //             $('#Organization_Members_Pager').not('.hide').addClass('hide');
        //             $('#WebABLLS_Support_Pager').not('.hide').addClass('hide');
        //             $('#Authorized_User_Table').not('.hide').addClass('hide');
        //             if ($('#Personal_Contacts_Table').hasClass('hide')) {
        //                 $('#Personal_Contacts_Table').removeClass('hide');
        //             }
        //             $('#Organization_Members_Table').not('.hide').addClass('hide');
        //             $('#WebABLLS_Support_Table').not('.hide').addClass('hide');
        //         } else if ($(this).data("index") == "Organization_Members") {
        //             $('#Authorized_User_Pager').not('.hide').addClass('hide');
        //             $('#Personal_Contacts_Pager').not('.hide').addClass('hide');
        //             if ($('#Organization_Members_Pager').hasClass('hide')) {
        //                 $('#Organization_Members_Pager').removeClass('hide');
        //             }
        //             $('#WebABLLS_Support_Pager').not('.hide').addClass('hide');
        //             $('#Authorized_User_Table').not('.hide').addClass('hide');
        //             $('#Personal_Contacts_Table').not('.hide').addClass('hide');
        //             if ($('#Organization_Members_Table').hasClass('hide')) {
        //                 $('#Organization_Members_Table').removeClass('hide');
        //             }
        //             $('#WebABLLS_Support_Table').not('.hide').addClass('hide');
        //         } else {
        //             $('#Authorized_User_Pager').not('.hide').addClass('hide');
        //             $('#Personal_Contacts_Pager').not('.hide').addClass('hide');
        //             $('#Organization_Members_Pager').not('.hide').addClass('hide');
        //             if ($('#WebABLLS_Support_Pager').hasClass('hide')) {
        //                 $('#WebABLLS_Support_Pager').removeClass('hide');
        //             }
        //             $('#Authorized_User_Table').not('.hide').addClass('hide');
        //             $('#Personal_Contacts_Table').not('.hide').addClass('hide');
        //             $('#Organization_Members_Table').not('.hide').addClass('hide');
        //             if ($('#WebABLLS_Support_Table').hasClass('hide')) {
        //                 $('#WebABLLS_Support_Table').removeClass('hide');
        //             }
        //         }
        //         $Personal_Contacts_Table.trigger('update');
        //         $Organization_Members_Table.trigger('update');
        //         $WebABLLS_Support_Table.trigger('update');
        //     }
        // });

        $("#Student li").click(function(e) {
            location.href=$(this).data("path");
        });
        
        window.onbeforeunload = UnLoadWindow;
    });
</script>

@endsection