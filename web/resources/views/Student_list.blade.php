@extends('layouts.master')

@section('title', 'Student List')

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

  .app-disable {
    color: gray;
  }

  .app-disable2 {
    color: gray;
  }
</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href="{{ asset('css/theme.default.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('/js/jquery.tablesorter.widgets.js') }}"></script>
<script src="{{ asset('/js/widget-pager.js') }}"></script>

<script src="{{ asset('/js/tool.js') }}"></script>

<link href="{{ asset('css/jquery.tablesorter.pager.css') }}" rel="stylesheet">

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_student_list_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_student_list_right_top_content')
</div>
@endsection

@section('bottom_content')
<div class="bottom_content">
    @include('contents.app_webablls_student_list_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.js"></script>

<script type="text/javascript">

    function init() {
      $("#UserTable tr").removeClass("selected");
      $('#ViewSummary').addClass("app-disable");
      $('#ViewProfile').addClass("app-disable");
      $('#TGV').addClass("app-disable");
      $('#SAssess').addClass("app-disable");
      $('#ShareStudent').addClass("app-disable");
      $('#StudentHistory').addClass("app-disable");
      $('#StudentFiles').addClass("app-disable");
      $('#StudentNotes').addClass("app-disable");
      $('#AddAssessment').addClass("app-disable");
    }

    function UnLoadWindow() {
    }

    $(function () {
      init();
      document.getElementById("registered").innerHTML=("");

      var $tableTest = $("#test");
      
      $tableTest.tablesorter({
            sortReset: true,
            sortRestart: true,
            dateFormat: date_format,
            textAttribute: 'data-sort',
            sortList: [[0,0]],
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
 				}
            }
      });

      
      var $table = $("#UserTable");
      var select = 0;
      if (<?php echo Auth::user()->date_format ?> == 0) {
            var date_format = 'mmddyyyy';
        } else {
            var date_format = 'ddmmyyyy';
        }
      var listnum = {{$Students->count()}};
      if (listnum > 50) {
            listnum = 50;
      }
      
      $table.tablesorter({
            sortReset: true,
            sortRestart: true,
            dateFormat: date_format,
            textAttribute: 'data-sort',
            sortList: [[0,0]],
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
 				}
            }
      });
    
        $("#male, #female").change(function() {
            var male = document.getElementById("male").checked;
            var female = document.getElementById("female").checked;
            var M_or_F_ID_hide = document.getElementById("M_or_F_ID_hide");

            if (male && female) {
                M_or_F_ID_hide.value = "";
            } else if (male) {
                M_or_F_ID_hide.value = "1";
            } else if (female) {
                M_or_F_ID_hide.value = "0";
            } else {
                M_or_F_ID_hide.value = "";
            }
            // M_or_F_ID_hide.dispatchEvent(new Event('change'));
            if (document.createEventObject) {
                M_or_F_ID_hide.fireEvent("onchange");
            } else {
                var evt = document.createEvent("HTMLEvents");
                evt.initEvent("change", false, true);
                M_or_F_ID_hide.dispatchEvent(evt);
            }
        });

        $("#org_all, #org_my, #org_other").change(function() {
            var org_my = document.getElementById("org_my").checked;
            var org_other = document.getElementById("org_other").checked;
            var My_or_Other_ID_hide = document.getElementById("My_or_Other_ID_hide");

            if (org_my) {
                My_or_Other_ID_hide.value = "0";
            } else if (org_other) {
                My_or_Other_ID_hide.value = "1";
            } else {
                My_or_Other_ID_hide.value = "";
            }
            //My_or_Other_ID_hide.dispatchEvent(new Event('change'));
            if (document.createEventObject) {
                My_or_Other_ID_hide.fireEvent("onchange");
            } else {
                var evt = document.createEvent("HTMLEvents");
                evt.initEvent("change", false, true);
                My_or_Other_ID_hide.dispatchEvent(evt);
            }
        });

        $("#role_all, #role_oc, #role_s").change(function() {
            var role_oc = document.getElementById("role_oc").checked;
            var role_s = document.getElementById("role_s").checked;
            var role_all = document.getElementById("role_all").checked;
            var OC_or_S_ID_hide = document.getElementById("OC_or_S_ID_hide");

            if (role_oc) {
                OC_or_S_ID_hide.value = "1";
                // $("table#UserTable td.roles").each(function () {
                //   if ($(this).find("span:contains('O')").length == 0) $(this).parent().addClass("hide");
                // }); 原方法會無法清空篩選值再篩
            } else if (role_s) {
                OC_or_S_ID_hide.value = "0";
                // $("table#UserTable td.roles").each(function () {
                //   if ($(this).find("span:contains('O')").length > 0) $(this).parent().addClass("hide");
                // });
            } else {
                OC_or_S_ID_hide.value = "";
            }
            //OC_or_S_ID_hide.dispatchEvent(new Event('change'));
            if (document.createEventObject) {
                OC_or_S_ID_hide.fireEvent("onchange");
            } else {
                var evt = document.createEvent("HTMLEvents");
                evt.initEvent("change", false, true);
                OC_or_S_ID_hide.dispatchEvent(evt);
            }
        });
        
        $("#UserTable td").click(function(event) {
          
            if ($(this).parent("tr").hasClass("selected")) {
                $("#UserTable tr").removeClass("selected");
                $('#ViewSummary').addClass("app-disable");
                $('#ViewProfile').addClass("app-disable");
                $('#TGV').addClass("app-disable");
                $('#SAssess').addClass("app-disable");
                $('#ShareStudent').addClass("app-disable");
                $('#StudentHistory').addClass("app-disable");
                $('#StudentFiles').addClass("app-disable");
                $('#StudentNotes').addClass("app-disable");
                $('#AddAssessment').addClass("app-disable");
            } else {
                select = $(this).parent().data("table-row-id");

                let HasAssessment = $(this).parent().data("table-row-assess");

                if(HasAssessment !== 0){
                  $('#TGV').removeClass("app-disable2");
                  $('#SAssess').removeClass("app-disable2");
                  $('#StudentNotes').removeClass("app-disable2");
                } else {
                  $('#TGV').addClass("app-disable2"); //無法沿用原app-disable，會與下面的permission互相干擾，只好再設一個css
                  $('#SAssess').addClass("app-disable2");
                  $('#StudentNotes').addClass("app-disable2");
                }

                $("#UserTable tr").removeClass("selected");
                $(this).parent("tr").addClass("selected");
                
                if (Check_Permission("View Summary", $(this).parent().data("table-row-per"))) {
                    $('#ViewSummary').removeClass("app-disable");
                } else {
                    $('#ViewSummary').addClass("app-disable");
                }

                if (Check_Permission("View Profile", $(this).parent().data("table-row-per"))) {
                    $('#ViewProfile').removeClass("app-disable");
                } else {
                    $('#ViewProfile').addClass("app-disable");
                }

                if (Check_Permission("Total Grid View", $(this).parent().data("table-row-per"))) {
                    $('#TGV').removeClass("app-disable");
                } else {
                    $('#TGV').addClass("app-disable");
                }

                if (Check_Permission("Student Assessment", $(this).parent().data("table-row-per"))) {
                    $('#SAssess').removeClass("app-disable");
                } else {
                    $('#SAssess').addClass("app-disable");
                }

                if (Check_Permission("Share Student", $(this).parent().data("table-row-per"))) {
                    $('#ShareStudent').removeClass("app-disable");
                } else {
                    $('#ShareStudent').addClass("app-disable");
                }
                
                if (Check_Permission("Student History", $(this).parent().data("table-row-per"))) {
                    $('#StudentHistory').removeClass("app-disable");
                } else {
                    $('#StudentHistory').addClass("app-disable");
                }

                if (Check_Permission("Student Files", $(this).parent().data("table-row-per"))) {
                    $('#StudentFiles').removeClass("app-disable");
                } else {
                    $('#StudentFiles').addClass("app-disable");
                }

                if (Check_Permission("Student Notes", $(this).parent().data("table-row-per"))) {
                    $('#StudentNotes').removeClass("app-disable");
                } else {
                    $('#StudentNotes').addClass("app-disable");
                }

                if (Check_Permission("Add Assessment", $(this).parent().data("table-row-per"))) {
                    $('#AddAssessment').removeClass("app-disable");
                } else {
                    $('#AddAssessment').addClass("app-disable");
                }
                
            }

        });

      $("#student li").click(function(e) {
          if ($("#UserTable tr").not(this).hasClass("selected") && !$(this).hasClass("app-disable") && !$(this).hasClass("app-disable2")) {
            location.href=$(this).data("path") + select;
          } 
      });

      $("#addStudent li").click(function(e) {
        location.href=$(this).data("path");
      });

      $(".roles span:contains('O')").qtip({

        content: {
            text: '<span>Owner rights.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });

      $(".roles span:contains('CO')").qtip({

        content: {
            text: '<span>Coordinator (or Profile Coordinator)</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });

      $(".roles span:contains('FA')").qtip({
        content: {
            text: '<span>Full access.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });

      $(".roles span:contains('FAs')").qtip({
        content: {
            text: '<span>Full access with authorization to manage share links.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });

      $(".roles span:contains('Iv')").qtip({
        content: {
            text: '<span>Basic INFO view (Student Profile screen).</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });

      $(".roles span:contains('Im')").qtip({
        content: {
            text: '<span>Basic INFO modify (Student Profile screen).</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });

      $(".roles span:contains('Av')").qtip({
        content: {
            text: '<span>Assessments and Report View.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });

      $(".roles span:contains('Am')").qtip({
        content: {
            text: '<span>Assessments and Report modify.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });

      $(".roles span:contains('Fv')").qtip({
        content: {
            text: '<span>File view.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });

      $(".roles span:contains('Fm')").qtip({
        content: {
            text: '<span>File modify.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
      });
      
        const Body = document.getElementById("UserTable");
        const element = Body.querySelectorAll('span');
        for (let i = 0; i < element.length; i++) {
            if (element[i].classList.contains("addcontent")) {
                let elementBody = document.getElementById(element[i].id);
                let id = "#" + element[i].id;
                let string1 = "";
                if ($(id).data("index") == "View Profile") {
                    string1 = '<a title="Click to see student profile" class="webablls_href" href="' + $(id).data("path") + '">' + $(id).data("display") + '</a>';
                } else if ($(id).data("index") == "View Summary") {
                    string1 = '<a title="Click to see student summary" class="webablls_href" href="' + $(id).data("path") + '">' + $(id).data("display") + '</a>';
                }
                let string2 = $(id).data("display");
                if (Check_Permission($(id).data("index"), $(id).parent().parent().data("table-row-per"))) {
                    elementBody.innerHTML = string1;
                } else {
                    elementBody.innerHTML = string2;
                }
            }
        }
        $table.trigger('update');

    });
    function getAge(dob) {
        var vals = dob.split('/');
        if ( <?php echo Auth::user()->date_format?> == 0 ) {
            var diff = new Date - new Date(vals[2], vals[0], vals[1]);
        } else {
            var diff = new Date - new Date(vals[2], vals[1], vals[0]);
        }
        var year = 1000 * 60 * 60 * 24 * 365.25;
        //var integer = Math.abs(diff / year); 絕對正數
        return Math.ceil(diff / year); //取最大整數。
    }

    function CheckAge() {
        var ageFrom = parseInt(document.getElementById("ageFrom").value);
        var ageTo = parseInt(document.getElementById("ageTo").value);
        var Age_ID_hide = document.getElementById("Age_ID_hide");
        var $table = $("#UserTable");
        var search = "";
        var registered = document.getElementById("registered");

        if (ageFrom > ageTo || ageFrom == ageTo) {
            registered.innerText = "The right number should bigger than left one.";
        } else if (isNaN(ageFrom) == false && isNaN(ageTo) == true) {
            registered.innerText= "The right number should bigger than left one.";
        } else if (isNaN(ageFrom) == true && isNaN(ageTo) == false) {
            registered.innerText= "The right number should bigger than left one.";
        } else {
            registered.innerText= "";
        }

        $("#UserTable td.age").each(function () {
            $(this).parent().find('.hide_age').html("1");
                var age = getAge($(this).html());

            if ((age < ageFrom) && (ageFrom != 0)) { 
                $(this).parent().find('.hide_age').html("0");
            }

            if ((age > ageTo) && (ageTo != 0)) {
                $(this).parent().find('.hide_age').html("0");
            }
                // if ((age < ageFrom) && (ageFrom != "0")) { 
                //     $(this).parent().find('.hide_age').html("0");
                // }

                // if ((age > ageTo) && (ageTo != "0")) {
                //     $(this).parent().find('.hide_age').html("0");
                // }

            if ((ageFrom == ageTo) && (ageFrom >= 0) && (ageTo >= 0)) {
                $(this).parent().find('.hide_age').html("1");
            } else if (ageFrom > ageTo) {
                $(this).parent().find('.hide_age').html("1");
            }

            $table.trigger('update');
        });
        
        if (ageFrom === ageTo) {
            Age_ID_hide.value = "";
        }else if (isNaN(ageFrom) == true || isNaN(ageTo) == true){
            Age_ID_hide.value = "";
        } else {
            Age_ID_hide.value = "1";
        }

        // if ((ageFrom === ageTo) && (ageFrom != "") && (ageTo != "")) {
        //     Age_ID_hide.value = "0";
        // } else if ((ageFrom == "") && (ageTo == "")) {
        //     Age_ID_hide.value = "";
        // } else {
        //     Age_ID_hide.value = "1";
        // }

        //  Age_ID_hide.dispatchEvent(new Event('change'));
        if (document.createEventObject) {
            Age_ID_hide.fireEvent("onchange");
        } else {
            var evt = document.createEvent("HTMLEvents");
            evt.initEvent("change", false, true);
            Age_ID_hide.dispatchEvent(evt);
        }

    }

    // document.getElementById('ageFrom').addEventListener('blur', function(e) {
    //     document.getElementById("registered").innerHTML=("");
    // }, true);
    // document.getElementById('ageTo').addEventListener('blur', function(e) {
    //     document.getElementById("registered").innerHTML=("");
    // }, true);
</script>


@endsection