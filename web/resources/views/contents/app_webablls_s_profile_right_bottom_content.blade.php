<?php
  use App\Enums\UserRole;
?>

<div>
  <div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr">
    <div class="row justify-content-center align-items-center" style="text-align: center;">
      <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Note: Required fields are marked with an asterisk.</span>  
    </div>
  </div>

  <div class="col">
    <div class="mt-5">
      <?php
        $Id = $Profile->get("ID");
        $Url = url('Student/profile');
        echo '<form action="'.$Url.'/'.$Id.'" class="app-inline needs-validation" id="Profilefrm" method="post" role="form" novalidate>';
      ?>  
        {{ csrf_field() }}
        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="studentFirstname">First Name *</label>
          <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="FirstName" id="studentFirstname" type="text" value="<?php echo $Profile->get("FirstName"); ?>" required />
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">First Name field is required</div>
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="studentLastname">Last Name or Student ID *</label>
          <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="LastName" id="studentLastname" type="text" value="<?php echo $Profile->get("LastName"); ?>" required />
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
          <input id="datepicker" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="Birthday" type="text" value=<?php echo $Profile->get("Birthday")?> required/>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback" id="invalid-date">Birth Date field is required</div>
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="Ethnicity">Ethnicity</label>
          <select id="ethnicity" name="Ethnicity" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
            <option value="0">Choose one</option>
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
          <select id="Gender" name="Gender" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
            <option value="<?php echo App\Enums\Gender::male()->value ?>">Male</option>
            <option value="<?php echo App\Enums\Gender::female()->value ?>">Female</option>
          </select>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Gender field is required</div>
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="City">City *</label>
          <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="City" id="City" type="text" value="<?php echo $Profile->get("City")?>" required/>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">City field is required</div>
        </div>

        <!-- From Organization Parameters -->

        <?php
          
          $Count = 1;
          foreach($SPData as $value) {
            $parametersValue = sizeof($value["Value"]);
            if ($value["Active"] == 1 && $parametersValue > 0) {
              echo '<div class="app-right-bottom-mr">';
              if ($value["Rrquire"] == 1) {
                echo '<label class="app-right-bottom-title" for="Parameter'.$Count.'">'.$value["Name"].' *</label>';
                echo '<select id="Parameter'.$Count.'" name="Parameter'.$Count.'" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;" required>';
                  echo '<option value="">Choose one</option>';
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
          <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="zipCode" type="text" value="<?php echo $Profile->get("ZipCode")?>" />
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="Country">Country</label>
          <select class="app-option-font app-right-bottom-content-mr selectpicker countrypicker custom-select" name="Country" data-default="<?php echo $Profile->get("Country")?>" data-live-search="true" style="width: auto;"></select>  
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="SingLanguage">Is sign language a potential response form for the student? *</label>
          <select id="SingLanguage_id" name="SingLanguage" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;" required>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
 
        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="Dignostic">Diagnostic Information</label>
          <select id="Dignostic_id" name="Dignostic" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
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
          <label class="app-right-bottom-title" for="fileCoordinator">Profile Coordinator *</label>
          <?php
            if ($PC_List -> count() == 1 || Auth::user()->role == 1 || Auth::user()->role == 0) {
              echo '<select name="fileCoordinator" class="fileCoordinator custom-select app-option-font app-right-bottom-content-mr" style="width: auto;" disabled="disabled">';
              foreach ($PC_List as $value) {
                echo '<option value="'.$value["ID"].'">'.$value["Name"].'</option>';
              }
              echo '</select>';
            } else if ($PC_List -> count() > 1 || strpos($Profile->get('Permission'), 'CO') !== false) {
              echo '<select name="fileCoordinator" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;" required>';
              foreach ($PC_List as $value) {
                echo '<option value="'.$value["ID"].'">'.$value["Name"].'</option>';
              }
              echo '</select>';
              echo '<div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>';
           }
          ?>
          </select>
        </div>

        <div class="app-right-bottom-mr">
          <label class="app-right-bottom-title" for="Notes">Notes</label>
          <textarea id="Notes_id" name="Notes" rows="4" style="border: 1px solid rgb(210,210,210); width: 95%;" value="<?php echo $Profile->get("Notes"); ?>"></textarea>
        </div>
        
        <input type="submit" name="saveChange" value="Save Changes" class="btn btn-sm btn-secondary app-right-bottom-mr"/>

      </form>
    </div>
  </div>
</div>


          <!-- $Count = 1; 原導入Org / Parameters 方式
          foreach($SPData as $value) {
            if ($value["Active"] == 1) {
              echo '<div class="app-right-bottom-mr">';
              if ($value["Rrquire"] == 1) {
                echo '<label class="app-right-bottom-title" for="Parameter'.$Count.'">'.$value["Name"].' *</label>';
              } else {
                echo '<label class="app-right-bottom-title" for="Parameter'.$Count.'">'.$value["Name"].'</label>';
              }
              echo '<select id="Parameter'.$Count.'" name="Parameter'.$Count.'" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;" required>';
              echo '<option value="">Choose one</option>';
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
              echo '<div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Options field is required</div>';
              echo '</div>';
            }
            $Count++;
          } -->

