@inject('OrgService','App\Services\OrganizationService')

<div>
  <div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr">
    <div class="row justify-content-center align-items-center" style="text-align: center;">
      <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Note: Required fields are marked with an asterisk.</span>  
    </div>
  </div>

  <div class="col">
    <div class="mt-5">
        <?php
          if ($OrgService->CanAddSeats()) {
            $url = url('Student/addstudent');
            echo '<form action="'.$url.'/" class="app-inline needs-validation" id="addStudentfrm" method="post" role="form" novalidate>';
          } 
        ?>{{ csrf_field() }}

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="">checkbox1</label>
          <!-- <input class="mr-1" type="checkbox" name="scale[]" value="Include Section Graphs 1" checked="checked" />Include Section Graphs 1
          <input class="mr-1" type="checkbox" name="scale[]" value="Include Section Graphs 2" checked="checked" />Include Section Graphs 2 -->
          <input class="mr-2" type="checkbox" name="Assessments[0]" value="true"/>Assess1

          <input class="mr-2" type="checkbox" name="Assessments[1]" value="true"/>Assess2


          <!-- <input class="mr-2" type="checkbox" name="Assessment-no[1]" value="no" /> -->
          
        </div>
        
        <button type="submit" id="saveaddstudent" name="saveStudent" value="1" class="btn btn-sm btn-secondary app-right-bottom-mr">Save</button>
        <button type="submit" id="saveS&newassess" name="saveStudent" value="2" class="btn btn-sm btn-secondary app-right-bottom-mr">Save student and start new assessment</button>
        <?php        
          if($OrgService->CanAddSeats()) {
            echo '<button type="submit" id="saveS&newstudent" name="saveStudent" value="3" class="btn btn-sm btn-secondary app-right-bottom-mr">Save and Add another student</button>';  
          } else {
            echo '<button type="submit" id="saveS&newstudent" name="saveStudent" value="3" class="btn btn-sm btn-secondary app-right-bottom-mr" style="display:none;">Save and Add another student</button>';
          } 
        ?>
      </form>
    </div>
  </div>
</div>
<!-- 三submit暫放 
<script>

        assessSubmit = function() {
            if (form.checkValidity() === true) {
            var form = $('#addStudent'); //取得form
            var UserID = Auth::user()->user_id; //導入目前帳號的ID，寫法會使JS偵測多個：尚需要檢測。get('ID')此寫法會undefined。
            var Url = "{{url('Student/addStudent')}}" + UserID;
            $.ajax({
                type: "POST",
                url: Url, //存入userid下
                dataType: "json", //預期傳輸的數據類型，因之前payment沒有使用ajax方式，這需要confirm。
                data: $('#addStudent').serialize(), //輸出序列化表單值
                // async : false, 設為同步
                // timeout: 1000000, 設定傳輸的timeout,時間內沒完成則中斷
                success: function (result) {
                    console.log(result);
                    if (result.resultCode == 200) {
                        alert("Success"); //測試有沒有成功到資料庫，可移除。
                    }
                },
                error: function (result) {
                    alert("NO, something went wrong!");//測試
                }
            })
            }
        }

        newstudentSubmit = function() {
            if (form.checkValidity() === true) {
            var form = $('#addStudent'); //取得form
            var UserID = Auth::user()->user_id;
            var Url = "{{url('Student/addStudent')}}" + UserID;
            $.ajax({
                type: "POST",
                url: Url, //存入userid下
                dataType: "json", //預期傳輸的數據類型，因之前payment沒有使用ajax方式，這需要confirm。
                data: $('#addStudent').serialize(), //輸出序列化表單值
                // async : false, 設為同步
                // timeout: 1000000, 設定傳輸的timeout,時間內沒完成則中斷
                success: function (result) {
                    console.log(result);
                    if (result.resultCode == 200) {
                        alert("Success"); //測試有沒有成功到資料庫，可移除。
                    }
                },
                error: function (result) {
                    alert("NO, something went wrong!");//測試
                }
            })
            }
        }
</script> -->
