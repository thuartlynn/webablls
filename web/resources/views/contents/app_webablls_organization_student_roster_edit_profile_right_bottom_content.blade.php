<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Note: Required fields are marked with an asterisk.</span>  
  </div>
</div>

<?php
  $url = url('/Organization/Students/EditProfile');
  echo '<form action="'.$url.'/'.$Profile["ID"].'" class="app-inline needs-validation" id="editprofilefrm" method="post" role="form" novalidate>'
?>
  {{ csrf_field() }}

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">First Name *</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="FirstName" name="FirstName" type="text" value="<?php echo $Profile["FirstName"] ?>" required/>
    <div class="invalid-feedback">First Name field is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Last Name or Student ID *</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="LastNameOrStudentID" name="LastNameOrStudentID" type="text" value="<?php echo $Profile["LastName"] ?>" required/>
    <div class="invalid-feedback">Last Name field is required</div>
    <p class="app-nopadding-nomargin text-secondary text-justify"><small>To create a Student Profile either a last name OR a unique, user-assigned student identification number (or code) must be entered. If you are a parent/guardian, entering the student's last name is an option. If you are a service provider, please follow your organization's professional guidelines regarding student confidentiality when entering identifiable information.</small></p>
  </div>

  <div class="app-right-bottom-mr">
    <?php
      if (Auth::user()->date_format == 0) {
        echo '<label class="app-right-bottom-title">Birth Date (MM/DD/YYYY) *</label>';
      } else {
        echo '<label class="app-right-bottom-title">Birth Date (DD/MM/YYYY) *</label>';
      }
    ?>
    <input id="datepicker" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="BirthDate" type="text" value="<?php echo $Profile["Birthday"] ?>" required/>
    <div id="BirthDateError" class="invalid-feedback">Birth Date field is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Gender</label>
    <select id="Gender_id" name="Gender" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="<?php echo App\Enums\Gender::male()->value ?>">Male</option>
      <option value="<?php echo App\Enums\Gender::female()->value ?>">Female</option>
    </select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Ethnicity</label>
    <select id="Ethnicity_id" name="Ethnicity" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="0" selected >Choose one</option>
      <?php
        use App\Enums\Ethnicity as Ethnicity;
        foreach(Ethnicity::getKeys() as $value) {
          echo '<option value='.Ethnicity::getValue($value).'>'.Ethnicity::getDescription(Ethnicity::getValue($value)).'</option>';
        }
      ?>
    </select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">City *</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="City" name="City" type="text" value="<?php echo $Profile["City"] ?>" required/>
    <div class="invalid-feedback">City field is required</div>
  </div>

  <?php
    $Count = 1;
    foreach($SPData as $value) {
      if ($value["Active"] == 1 && sizeof($value["Value"]) != 0) {
        echo '<div class="app-right-bottom-mr">';
        if ($value["Rrquire"] == 1) {
          echo '<label class="app-right-bottom-title">'.$value["Name"].' *</label>';
        } else {
          echo '<label class="app-right-bottom-title">'.$value["Name"].'</label>';
        }
        echo '<select id="Parameter'.$Count.'" name="Parameter'.$Count.'" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">';
        echo '<option value="0">Choose one</option>';
        $KeyArray = array();
        foreach (array_keys($value["Value"]->toArray()) as $temp) {
          $KeyArray[] = $temp;
        }
        $KeyCount = 0;
        foreach($value["Value"] as $options) {
          echo '<option value="'.$KeyArray[$KeyCount].'">'.$options.'</option>';
          $KeyCount++;
        }
        echo '</select>';
        echo '<div class="invalid-feedback">Options field is required</div>';
        echo '</div>';
      }
      $Count++;
    }
  ?>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Zip Code</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="ZipCode" type="text" value="<?php echo $Profile["ZipCode"] ?>"/>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Country</label>
    <select class="app-option-font app-right-bottom-content-mr selectpicker countrypicker custom-select" data-live-search="true" name="Country" style="width: auto;" data-default="<?php echo $Profile["Country"] ?>"></select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Is sign language a potential response form for the student? *</label>
    <select id="SignLang_id" name="SignLang" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
  </div>
 
  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Diagnostic Information</label>
    <select id="Diagnostic_Information_id" name="DiagnosticInfo" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="0">Choose one</option>
      <?php
        use App\Enums\Diagonstic as Diagonstic;
        foreach(Diagonstic::getKeys() as $value) {
          echo '<option value='.Diagonstic::getValue($value).'>'.Diagonstic::getDescription(Diagonstic::getValue($value)).'</option>';
        }
      ?>
    </select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Notes:</label>
    <textarea class="form-control rounded-0 app-option-font app-textarea app-right-bottom-content-mr" id="Notes_id" name="Notes"></textarea>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Profile Coordinator *</label>
    <?php 
      if (count($Coordinator) == 1) {
        echo '<select disabled id="Profile_Coordinator_id" name="ProfileCoordinator" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">';
      } else {
        echo '<select id="Profile_Coordinator_id" name="ProfileCoordinator" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">';
      }
      $count = 0;
      foreach($Coordinator as $value) {
        echo '<option value="'.$value["ID"].'">'.$value["Name"].'</option>';
        $count++;
      }
      echo '</select>';
    ?>
  </div>

  <div class="app-right-bottom-mr">
    <input type="submit" name="saveChange" value="Save Changes" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
  </div>
</form>