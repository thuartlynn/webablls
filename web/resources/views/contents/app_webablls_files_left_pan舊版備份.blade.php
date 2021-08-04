@include('contents.app_webablls_student_list')

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <form id="UploadForm" class="" method="post" action="/somewhere/to/upload" enctype="multipart/form-data"> {{ csrf_field() }}
        <div>
        <label for="fileinput">
          <input type="button" class="btn btn-outline-secondary btn-sm mr-2" value="Choose File" /><span id="text"></span>
          <input type="file" id="fileinput" accept="image/*" />
        </label>
        </div>
        <div>
          <input id="btnSubmit" type="submit" value="Upload" class="btn btn-secondary btn-sm" />
        </div>
      </form>
    </ul>
    
    <ul id="actions2" class="navbar-nav app-left-pan-list-mr-pd disable">
      <li class="nav-item" data-path="/Organization/Manage/">Download File</li>
      <li class="nav-item" data-path="" onclick="removeFile()"><a>Remove File<a></li>
      <li class="nav-item" data-path="" onclick="setDescription()"><a>Set Description</a></li>
    </ul>

  </nav>
</div>

<script type="text/javascript">
    $("#fileinput").change(function () {
      $("#text").html($("#fileinput").val());
    })

  $(function(){
    $("#btnSubmit").click(function (event) {
          console.log('test upload ajax');
          //ajax提交的話會一直重新run程式直到回傳,你可以將此行註解使用開發者工具看一下console就知道了
          event.preventDefault();

          uploadFile();

    });
    
    uploadFile = function() {

        // 取得form
        var form = $('#UploadForm')[0]; //取得HTML中第一個form id為UploadForm

        var input = document.getElementById("fileinput");

        var data = input.files.name; //帶入檔案名
    
        $("#btnSubmit").prop("disabled", true);

        $.ajax({
            type: "POST",               //使用POST傳輸,檔案上傳只能用POST
            url: "/somewhere/to/upload", //要傳輸對應的接口
            data: data,         //要傳輸的資料,我們將form 內upload打包成data
            processData: false, //防止jquery將data變成query String
            contentType: false, 
            cache: false,  //不做快取
            async : false, //設為同步
            timeout: 1000000, //設定傳輸的timeout,時間內沒完成則中斷
            success: function (data) {

                $("#AnswerBox").text(data);//填入提示訊息到result標籤內
                console.log("SUCCESS : ", data);
                $("#btnSubmit").prop("disabled", false);
    
            },
            error: function (e) {

                $("#AnswerBox").text('error'); //填入提示訊息到result標籤內
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }
      })
    }
  })

    function removeFile() {
	      answer = confirm("app.webablls.net顯示\nThis action will remove selected file permanetly. Are you sure you want to continue?");
	      if (answer)
		        location.href="{{ route('index') }}";
        }

    function setDescription () {  
      var description = prompt("app.webablls.net顯示\nEnter description for file: ", "");  
      if (description)
          {  
            location.href="{{ route('index') }}";
          }  
    }  

</script>
