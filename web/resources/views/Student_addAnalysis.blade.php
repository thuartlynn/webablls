@extends('layouts.master')

@section('title', "Add Analysis")

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
    @include('contents.app_webablls_addAnalysis_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_addAnalysis_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_addAnalysis_right_bottom_content')
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
    var StudentID = <?php echo ''.$Student["ID"].'' ?>;
    
    function UnLoadWindow() {
    }

    function init() {
        if (<?php echo Auth::user()->date_format ?> == 0) {
            $( "#datepicker" ).datepicker({dateFormat: 'mm/dd/yy'});
        } else {
            $( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy'});
        }
    }
    $(document).ready(function() {
        init();
        //盡量使用prop, attr 可以加屬性, 取值的時候attr會取不到

        $("#CheckAllassess").click(function() {
            $("#assess input:checkbox").prop('checked',true);
            var x = $("#assess input:checkbox").prop('checked',true);
            if (x.length > 4) { alert("Quantity is over. You just can choose 4."); }
        });
        $("#ClearAllassess").click(function() {
            $('#assess input:checkbox').prop('checked',false);
        });

        $("#CheckAllcategorya").click(function() {
          $("#Contentut_Options input:checkbox").prop('checked',true);
        });
        $("#ClearAllcategorya").click(function() {
          $("#Contentut_Options input:checkbox").prop('checked',false);
        });
        $("#Contentut_Options input:checkbox").change(function() {
          if (this.checked) {
            $("#select2").hide();
          } else {
            $("#select2").show();
          }
        });

        $("#allGraph").click(function() {
          $("#Graphing_Options_Group input:checkbox").prop('checked',true);
        });
        $("#clearGraph").click(function() {
          $("#Graphing_Options_Group input:checkbox").prop('checked',false);
        });
    });

    $("#assess input:checkbox").change(function() {
        if (this.checked) {
          $("#select1").hide();
        } else {
          $("#select1").show();
        }
    });

    var maxChoices = 4;
    var flag = 0;
    function onCheckBox(checkbox) {
        var items = document.getElementsByName("assess");
        if(checkbox.checked) {
          flag ++;
        } else {
          flag --;
        }
              
        if(flag < maxChoices) {
          for(var i=0; i<items.length; i++) {
            if(!items[i].checked) {
              items[i].disabled = false;
            }
          }
        } else {
          for(var i=0; i<items.length; i++) {
            if(!items[i].checked) {
              items[i].disabled = true;
            }
          }
        }
    }

    function check_AtoP() {
      $(".AtoP").each(function(){
        $(this).prop("checked",true);
      })
      var isChecked = $("#A-P").prop("checked");
        if (isChecked === false) {
          $(".AtoP").each(function(){
            $(this).prop("checked",false);
          })
        }
    }
    function check_CtoJ() {
      $(".CtoJ").each(function(){
        $(this).prop("checked",true);
      })
      var isChecked = $("#C-J").prop("checked");
        if (isChecked === false) {
          $(".CtoJ").each(function(){
            $(this).prop("checked",false);
        })
      }
    }
    function check_QtoT() {
      $(".QtoT").each(function(){
        $(this).prop("checked",true);
      })
      var isChecked = $("#Q-T").prop("checked");
        if (isChecked === false) {
          $(".QtoT").each(function(){
            $(this).prop("checked",false);
        })
      }
    }
    function check_UtoX() {
      $(".UtoX").each(function(){
        $(this).prop("checked",true);
      })
      var isChecked = $("#U-X").prop("checked");
        if (isChecked === false) {
          $(".UtoX").each(function(){
            $(this).prop("checked",false);
        })
      }
    }
    function check_YtoZ() {
      $(".YtoZ").each(function(){
        $(this).prop("checked",true);
      })
      var isChecked = $("#Y-Z").prop("checked");
        if (isChecked === false) {
          $(".YtoZ").each(function(){
            $(this).prop("checked",false);
        })
      }
    }

    function check_AtoZ() {
      $("input[name='categoryA[]']").each(function(){
        $(this).prop("checked",true);
      })
      var isChecked = $("#A-Z").prop("checked");
      if (isChecked === false) {
        $("input[name='categoryA[]']").each(function(){
          $(this).prop("checked",false);
        })
      }
    }

    $("#Graphing_Options_Group input:checkbox").change(function() {
        if (this.checked) {
          $("#select3").hide();
        } else {
          $("#select3").show();
        }
      });

    $("#options").qtip({

        content: {
            text: '<span>The full text of Shakespeare\'s plays and sonnets side-by-side with translations into modern English.<br>No fear Shakespeare is available online and in book form at barnesandnoble.com.</span>'
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

    $("#section_Analysis").qtip({

        content: {
            text: '<span>This is section analysis\'s text area.<br>No content.<br>No content.</span>'
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

    $("#percentage_Scale").qtip({

        content: {
            text: '<span>This is section Percentage Scale\'s text area.<br>No content.<br>No content.</span>'
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

    $("#totalscore_Scale").qtip({

        content: {
            text: '<span>This is section Total Scores\'s text area.<br>No content.<br>No content.</span>'
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

    $("#totalitem_Scale").qtip({

        content: {
            text: '<span>This is section Total Items\'s text area.<br>No content.<br>No content.</span>'
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

    $("#saveAnalysis1").click(function(){
	    var check=$("input[type='checkbox']:checked").length;//判斷有多少個方框被勾選
        var isChecked1 = $("#assess input:checkbox").prop("checked").length;//判斷各區域有沒有被勾到
        var isChecked2 = $("#Contentut_Options input:checkbox").prop("checked").length;
        var isChecked3 = $("#Graphing_Options_Group input:checkbox").prop("checked").length;
			if(check==0){
				$("#select1").removeClass("hide");
                $("#select2").removeClass("hide");
                $("#select3").removeClass("hide");
                $('html,body').animate({scrollTop:0}, 100);
				return false;//不要提交表單
			}else if(isChecked1>0 && isChecked2>0 && isChecked3>0) {
				return true;//提交表單
			}
	});

    $("#saveAnalysis2").click(function(){
			var check=$("input[type='checkbox']:checked").length;
        var isChecked1 = $("#assess input:checkbox").prop("checked").length;
        var isChecked2 = $("#Contentut_Options input:checkbox").prop("checked").length;
        var isChecked3 = $("#Graphing_Options_Group input:checkbox").prop("checked").length;
			if(check==0){
				$("#select1").removeClass("hide");
                $("#select2").removeClass("hide");
                $("#select3").removeClass("hide");
                $('html,body').animate({scrollTop:0}, 100);
				return false;
			}else if(isChecked1>0 && isChecked2>0 && isChecked3>0) {
				return true;
			}
	});

    window.onbeforeunload = UnLoadWindow;
</script>
@endsection