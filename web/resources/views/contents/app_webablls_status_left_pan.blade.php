@include('contents.app_webablls_student_list')

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item" >Download PDF</li>
      <li class="nav-item" >Download CSV</li>
      <li class="nav-item" id="reselectItems" data-path="/status/reselect_items/">Reselect Items</li>
      <li class="nav-item" id="dialog-open">Set Assigned Date</li>
    </ul>
  </nav>

</div>

<div id="dialog" title="Set Assigned Date">
  <p>Input the new Assigned Date or select it using the widget below.<br>
     Current Assigned Date: 11/26/2018<br>
     New Assigned Date: <input type="text" id="datepicker" value="11/26/2018" /></p>
  <!-- <div id="datepicker" ></div> -->
  <div class="app-inline">
    <button class="">Cancel</button>
    <button class="" id="btnSubmit">Save New Assigned Date</button>
  </div>
</div>

<script>
  $(function() {
    $( "#dialog" ).dialog({
      width: 600,
      autoOpen: false,
      draggable: false,
      resizable: false,
      modal: true,
      show: {
        effect: "fade",
        duration: 300
      },
      hide: {
        effect: "fade",
        duration: 300
      },
      position: {
        my: "center bottom", 
        at: "center", 
        of: window
      },
      
    });
 
    $( "#dialog-open" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });

    if (<?php echo Auth::user()->date_format ?> == 0) {
      $( "#datepicker" ).datepicker({dateFormat: 'mm/dd/yy'});
    } else {
      $( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy'}); 
    }

    $("#btnSubmit").click(function (event) {
          // console.log(input);
          //ajax提交的話會一直重新run程式直到回傳,你可以將此行註解使用開發者工具看一下console就知道了
          event.preventDefault();

          changeAssigndate();

    });
    
    changeAssigndate = function() {

        var input = document.getElementById("datepicker").value;
    
        // $("#btnSubmit").prop("disabled", true);

        $.ajax({
            type: "POST",     //使用POST傳輸,檔案上傳只能用POST
            url: "/reportID", //要傳輸對應的接口
            data: input,      //要傳輸的資料
            cache: false,     //不做快取
            async: false,    //設為同步
            alert: confirm("app.webablls.net顯示\nAssigned Date has been updated."),
            success: function (data) {
                console.log("SUCCESS : ", data);
            },
            error: function (e) {
                console.log("ERROR : ", e);
            }
        })
    }
    
  });

</script>
