<div class="container-fluid bg-gray" id="download">
    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">Trigger popup</button>

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info" id="exampleModalLabel">Watch Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="video-container">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/xWxhxlKCbzk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <h4 id="time" style="color:red;"></h4> 
秒鐘之後自動跳轉，如果不跳轉，請點選下面連結 
<a href="{{ url('/password/reset') }}">目標頁面</a>

<a href="/download" class="btn btn-md"><i class="fas fa-cloud-download-alt fa-lg mr-2 for_i_tag"> </i> Download Brochure </a><br>

<input type="text" id="test" value="2018/05/17"></input>

<a href="{{ URL::asset('images/webablls_logo_new.png') }}" download="webablls_logo_new">Download</a>

<button class="btn btn-secondary" type="button" id="e"> print to PDF </button>


<script>

function add_iframe(){
  var html_content = $('#html_content').html();
  $("#download").contents().find("#wrapper").html(html_content); //將選擇的區塊push到iframe上
  setTimeout(function(){ //設置轉換時間
    $("#download").get(0).contentWindow.print_html();
  },500);
}

document.getElementById('e').addEventListener('click', function() {
        var random = new Date().toLocaleDateString();
        var pdf = new jsPDF('p','pt','a4');
        pdf.internal.scaleFactor = 3; // 設置輸出比例 數值越大比列越小
        var options = {
            pagesplit: true, //設置是否自動分頁
            "background": '#ffffff'   //如果導出的pdf為黑色背景，需要將導出的html模塊內容背景 設置成白色。
        };
        var printHtml = $('#download').get(0);   // 頁面某一個div裏面的內容，通過id獲取div內容
        pdf.addHTML(printHtml,15, 15, options,function() { 
            pdf.save('Assessment_編號_'+random+'.pdf'); 
            // parent.closeLoading(); //用意？
        });
  
});
</script>


<form id="myForm">
  <table>
    <tr>
      <td><input type="file" name="file" id="file"/></td>
    </tr>
    <tr>
      <td><input name="submit" type="submit" value="submit" id="submit" /></td>
    </tr>
  </table>
</form>

<!-- 進度條 -->
<div class='progress' id="progress-div">
  <div class='bar' id='bar'></div>
  <div class='percent' id='percent'>0%</div>
</div>

<script>
$(function(){
  $("#myForm").submit(function(e){
    e.preventDefault();
    
    if($("#file").val() === ""){
      alert('請選擇上傳檔案');
      return;
    }

    var formData = new FormData($("#myForm")[0]);
    $.ajax({
      type: "POST",
      url: "upload",
      data:formData,
      cache:false,
      processData: false,
      contentType: false,
      dataType: 'text',   // 回傳的資料格式
      success: function (data){
        alert(data);
      },
      xhr:function(){
        var xhr = new window.XMLHttpRequest(); // 建立xhr(XMLHttpRequest)物件
        xhr.upload.addEventListener("progress", function(progressEvent){ // 監聽ProgressEvent
            if (progressEvent.lengthComputable) {
              var percentComplete = progressEvent.loaded / progressEvent.total;
              var percentVal = Math.round(percentComplete*100) + "%";
              $("#percent").text(percentVal); // 進度條百分比文字
              $("#bar").width(percentVal);    // 進度條顏色
            }
        }, false);
        return xhr; // 注意必須將xhr(XMLHttpRequest)物件回傳
      }
    }).fail(function(){
      alert('有錯');
      $("#percent").text("0%"); // 錯誤發生進度歸0%
      $("#bar").width("0%");
    });
        
  });

});
</script>


</div>

<!-- style="background-color:#F8553B;" -->


