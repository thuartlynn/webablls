<form action="{{url('/Organization/Manage')}}/{{$User->get('ID')}}" class="app-inline needs-validation" id="Managefrm" method="post" role="form" novalidate>
  {{ csrf_field() }}

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Details</h1>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Organization_Name">Organization Name</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr">{{$User->get('Organization')}}</p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Create_Date">Create Date</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr">{{$User->get('Create_Date')}}</p>
  </div>

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Account Information</h1>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="First_Name">First Name</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="FirstName" name="FirstName" type="text" value="{{$User->get('FirstName')}}" required/>
    <div class="invalid-feedback">First Name field is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Last_Name">Last Name</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="LastName" name="LastName" type="text" value="{{$User->get('LastName')}}" required/>
    <div class="invalid-feedback">Last Name field is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Phone_Number">Phone Number</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="PhoneNumber" name="PhoneNumber" type="text" value="{{$User->get('Phone')}}" />
  </div>

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Account Preferences</h1>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Date_Format">Date Format</label>
    <select id="Date_Format_id" name="Date_Format" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="0">mm/dd/yyyy</option>
      <option value="1">dd/mm/yyyy</option>
    </select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Name_Format">Name Format (user accounts and student profiles)</label>
    <select id="Name_Format_id" name="Name_Format" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="0">LastName, FirstName</option>
      <option value="1">FirstName LastName</option>
    </select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Hide_short_help">Hide short help</label>
    <div class ="app-right-bottom-content-2-mr">
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="HideshorthelpYes" name="Hideshorthelp" value = "1" />
      <label class="custom-control-label app-option-font" for="HideshorthelpYes">Yes</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="HideshorthelpNo" name="Hideshorthelp" value = "0" />
      <label class="custom-control-label app-option-font" for="HideshorthelpNo">No</label>
    </div> 
    </div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Login_Session_Timeout">Login Session Timeout</label>
    <select id=Timeout_id name="Timeout" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="0">15 minutes</option>
      <option value="1">30 minutes</option>
      <option value="2">60 minutes</option>
      <option value="3">2 hours</option>
      <option value="4">4 hours</option>
      <option value="5">6 hours</option>
      <option value="6">8 hours</option>
    </select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Preferred_Assessment_Edit_Mode">Preferred Assessment Edit Mode</label>
    <select id="EditMode_id" name="EditMode" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="0">Grid Mode</option>
      <option value="1">Text Mode</option>
      <option value="2">Cat Mode</option>
    </select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Time_Zone">Time Zone</label>
    <select id="TimeZone_id" name="TimeZone" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;"></select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Layout">Layout:</label>
    <select id="Layout_id" name="Layout" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="0">Collapsed</option>
      <option value="1">Expanded</option>
    </select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Notas">Notes:</label>
    <textarea class="form-control rounded-0 app-option-font app-textarea app-right-bottom-content-mr" id="Notes_id" name="Notes"></textarea>
  </div>

  <input type="submit" value="Save Details" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>