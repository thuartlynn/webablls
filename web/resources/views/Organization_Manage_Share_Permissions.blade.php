@extends('layouts.master')

<?php
  $name = "";
  if (Auth::user()->name_format == 0) {
    $name = "Share Permissions by User / ".Auth::user()->last_name." ".Auth::user()->first_name." (".Auth::user()->email.")";
  } else {
    $name = "Share Permissions by User / ".Auth::user()->first_name." ".Auth::user()->last_name." (".Auth::user()->email.")";
  }
?>
@section('title', $name)

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
    @include('contents.app_webablls_organization_manage_share_permissions_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_organization_manage_share_permissions_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_organization_manage_share_permissions_right_bottom_content')
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
    var time = "";

    function TriggerSubmit() {
        var $myForm = $('#userlinksfrm');
        if(!$myForm[0].checkValidity()) {
            EnableAll();
            $myForm.find(':submit').click();
        } else {
            EnableAll();
            $myForm[0].submit();
        }
    }

    function cancel() {
        window.location.href = "/Organization/Manage/UserLinks/" + {{$User->get('ID')}};
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
        if (changes == 1) {
            TriggerSubmit();
            $().save.save();
            changes = !1;
        }
    }

    function EnableAll() {
        $(".tablesorter tbody tr").each(function() {
            $(this).find(".OwnerRights").prop('disabled', false);
            $(this).find(".FullAccess").removeAttr("disabled", "disabled");
            $(this).find(".BasicInfo").removeAttr("disabled", "disabled");
            $(this).find(".AssessmentsAndReports").removeAttr("disabled", "disabled");
            $(this).find(".Files").removeAttr("disabled", "disabled");
            $(this).find(".Analytics").removeAttr("disabled", "disabled");
        });
    }

    function UnLoadWindow() {
    }

    $(function () {
        var $table = $("#UserTable");
        var select = 0;
        var listnum = {{sizeof($Seat)}};
        if (<?php echo Auth::user()->date_format ?> == 0) {
            var date_format = 'mmddyyyy';
        } else {
            var date_format = 'ddmmyyyy';
        }
        
        if (listnum > 50) {
            listnum = 50;
        }

        $table.tablesorter({
            sortReset: true,
            sortRestart: true,
            textAttribute: 'data-sort',
            dateFormat: date_format,
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
                pager_size: listnum,
                pager_startPage: 0,
                pager_savePages: false,
                pager_fixedHeight: true,
                pager_removeRows: false,
                pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                pager_updateArrows: true
            }
        });

        $("#actions li").click(function(e) {
            if ($(this).data("path") != "")
                location.href=$(this).data("path");
        });

        window.onbeforeunload = UnLoadWindow;
    });

    $(document).ready(function () {

            $(".tablesorter select, .tablesorter input").on("change", function () {
                if (!changes) {
                    changes = true;
                    $().save.change();
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
                if (owner && {{$User->get('Role')}} != 0) {
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
        });
</script>
@endsection