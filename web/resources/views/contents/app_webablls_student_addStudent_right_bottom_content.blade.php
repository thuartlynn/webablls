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
            echo '<form action="'.$url.'/" class="app-inline needs-validation" id="addStudentfrm" method="post" role="form" novalidate autocomplete="off">';
          } 
        ?>{{ csrf_field() }}

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="studentFirstname">First Name *</label>
          <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr " name="studentFirstname" id="studentFirstname" type="text" required />
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">First Name field is required</div>
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="studentLastname">Last Name or Student ID *</label>
          <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="studentLastname" id="studentLastname" type="text" value="" required />
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Last Name field is required</div>
          <p class="text-secondary text-justify"><small>To create a Student Profile either a last name OR a unique, user-assigned student identification number (or code) must be entered. If you are a parent/guardian, entering the student's last name is an option. If you are a service provider, please follow your organization's professional guidelines regarding student confidentiality when entering identifiable information.</small></p>
        </div>

        <div class="app-right-bottom-mr">
        <?php
          if (Auth::user()->date_format == 0) {
            echo '<label class="app-right-bottom-title">Birth Date (MM/DD/YYYY) *</label>';
          } else {
            echo '<label class="app-right-bottom-title">Birth Date (DD/MM/YYYY) *</label>';
          }
        ?>
          <input id="datepicker" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="birthDate" type="text" value="" required/>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback" id="invalid-date">Birth Date field is required</div>
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="Ethnicity">Ethnicity</label>
          <select id="ethnicity" name="Ethnicity" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
            <option value="0" selected >Choose one</option>
            <?php
              use App\Enums\Ethnicity as Ethnicity;
               $RaceList = Ethnicity::getKeys();
               foreach($RaceList as $Race)
               {
                 echo '<option value='.Ethnicity::getValue($Race).'>'.Ethnicity::getDescription(Ethnicity::getValue($Race)).'</option>';
               }
            ?>
          </select>
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="Gender">Gender *</label>
          <select name="Gender" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
            <option value="<?php echo App\Enums\Gender::male()->value ?>">Male</option>
            <option value="<?php echo App\Enums\Gender::female()->value ?>">Female</option>
          </select>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Gender field is required</div>
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="City">City *</label>
          <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="City" id="City" type="text" value="" required/>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">City field is required</div>
        </div>

        <!-- From Organization Parameters -->
        <?php          
          $Count = 1;
          foreach($SPData as $value) {
            $parametersValue = sizeof($value["Value"]);
            // echo $parametersValue;
            if ($value["Active"] == 1 && $parametersValue > 0) {
              echo '<div class="app-right-bottom-mr">';
              if ($value["Rrquire"] == 1) {
                echo '<label class="app-right-bottom-title" for="Parameter'.$Count.'">'.$value["Name"].' *</label>';
                echo '<select id="Parameter'.$Count.'" name="Parameter'.$Count.'" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;" required>';
                  echo '<option value="">Choose one</option>';
                  // $KeyArray = array();
                  // foreach (array_keys($value["Value"]->toArray()) as $temp) {
                  //   $KeyArray[] = $temp;
                  // }
                  // $KeyCount = 0;
                  // foreach($value["Value"] as $options) {
                  //   echo '<option value="'.$KeyArray[$KeyCount].'">'.$options.'</option>';
                  //   $KeyCount++;
                  // }
                  foreach($value["Value"] as $k => $v) {
                    echo '<option value="'.$k.'">'.$v.'</option>';
                  }
                  echo '</select>';
                  echo '<div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Options field is required</div>';
                  echo '</div>';
              } else {
                echo '<label class="app-right-bottom-title" for="Parameter'.$Count.'">'.$value["Name"].'</label>';
                echo '<select id="Parameter'.$Count.'" name="Parameter'.$Count.'" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">';
                  echo '<option value="">Choose one</option>';
                  // $KeyArray = array();
                  // foreach (array_keys($value["Value"]->toArray()) as $temp) {
                  //   $KeyArray[] = $temp;
                  // }
                  // $KeyCount = 0;
                  // foreach($value["Value"] as $options) {
                  //   echo '<option value="'.$KeyArray[$KeyCount].'">'.$options.'</option>';
                  //   $KeyCount++;
                  // }
                  foreach($value["Value"] as $k => $v) {
                    echo '<option value="'.$k.'">'.$v.'</option>';
                  }
                  echo '</select>';
              }
            } else {
              echo '';
            }
            $Count++;
          }
        ?>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="zipCode">Zip Code</label>
          <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="zipCode" type="text" />
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="Country">Country</label>
          <select class="selectpicker countrypicker custom-select " data-live-search="true" name="Country" style="width: auto;" data-default="TW"></select>
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="signLang">Is sign language a potential response form for the student? *</label>
          <select name="signLang" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;" required>
            <option value="YES">Yes</option>
            <option value="NO">No</option>
          </select>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
 
        <div class="app-right-bottom-mr">      
          <label class="app-right-bottom-title" for="diagnosticInfo">Diagnostic Information</label>
          <select name="diagnosticInfo" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
            <option value="0">Choose one</option>   
            <?php
              use App\Enums\Diagonstic as Diagonstic;
               $TypeList = Diagonstic::getKeys();
               foreach($TypeList as $Type)
               {
                 echo '<option value='.Diagonstic::getValue($Type).'>'.Diagonstic::getDescription(Diagonstic::getValue($Type)).'</option>';
               }
            ?>
          </select>
        </div>
        
        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="fileCoordinator">Profile Coordinator * </label>
          <?php
            use App\Services\UtilsService;
            if ($Coordinator -> count() == 1) {
              echo '<select name="fileCoordinator" class="fileCoordinator custom-select app-option-font app-right-bottom-content-mr" style="width: auto;" disabled="disabled">';
                foreach ($Coordinator as $value) {
                  $Utils = new UtilsService();
                  $Coordinator_name = $Utils->GetNameByFormat($value["FirstName"], $value["LastName"]);
                  echo '<option value="'.$value["ID"].'">'.$Coordinator_name.'</option>';
                }
              echo '</select>';
            } else if ($Coordinator -> count() > 1) {
              echo '<select name="fileCoordinator" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;" required>';
              foreach ($Coordinator as $value) {
                $Utils = new UtilsService();
                $Coordinator_name = $Utils->GetNameByFormat($value["FirstName"], $value["LastName"]);
                echo '<option value="'.$value["ID"].'">';
                echo $Coordinator_name;
                echo '</option>';
              }
              echo '</select>';
              echo '<div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>';
           }
          ?>
          
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="Notes">Notes</label>
          <textarea rows="4" style="border: 1px solid rgb(210,210,210); width: 95%;" name="Notes"></textarea>
        </div>
        
        <button type="submit" id="saveaddstudent" name="saveStudent" value="1" class="btn btn-sm btn-secondary app-right-bottom-mr">Save</button>
        <button type="submit" id="saveS&newassess" name="saveStudent" value="2" class="btn btn-sm btn-secondary app-right-bottom-mr">Save student and start new assessment</button>
        <?php    
          $newstudent1 = $OrgService->GetInfo();
          $newstudent2 = $newstudent1->get("TotalSeats");
          $newstudent3 = $newstudent1->get("UsedSeats");
          $newstudent4 = $newstudent2-$newstudent3;    
          if($newstudent4 >= 2) {
            echo '<button type="submit" id="saveS&newstudent" name="saveStudent" value="3" class="btn btn-sm btn-secondary app-right-bottom-mr">Save and Add another student</button>';  
          } else {
            echo '';
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
