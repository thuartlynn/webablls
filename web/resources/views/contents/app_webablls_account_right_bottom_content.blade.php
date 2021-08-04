@inject('OrgService','App\Services\UtilsService')
<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr">
  <div class="row justify-content-center align-items-center mb-2" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Changes have been saved</span>  
  </div>
</div>
<div>
  <div>
    <label class="app-right-bottom-title" for="Organization_Name">Organization Name</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr"><?php echo  Auth::user()->org_name?></p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Create_Date">Create Date</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr">
      <?php
        echo $OrgService->GetDateByFormat(Auth::user()->created_at);
      ?>
    </p>
  </div>

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Account Information</h1>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="First_Name">First Name</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr"><?php echo Auth::user()->first_name?></p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Last_Name">Last Name</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr"><?php echo Auth::user()->last_name?></p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Phone_Number">Phone Number</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr"><?php echo Auth::user()->phone_number?></p>
  </div>

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Account Preferences</h1>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Date_Format">Date Format</label>
    <p id="Date_Format_id" class="app-right-bottom-content app-right-bottom-content-2-mr"></p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Name_Format">Name Format (user accounts and student profiles)</label>
    <p id="Name_Format_id" class="app-right-bottom-content app-right-bottom-content-2-mr"></p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Hide_short_help">Hide short help</label>
    <p id="Hideshorthelp_id" class="app-right-bottom-content app-right-bottom-content-2-mr"></p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Login_Session_Timeout">Login Session Timeout</label>
    <p id="Timeout_id" class="app-right-bottom-content app-right-bottom-content-2-mr"></p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Preferred_Assessment_Edit_Mode">Preferred Assessment Edit Mode</label>
    <p id="EditMode_id" class="app-right-bottom-content app-right-bottom-content-2-mr"></p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Time_Zone">Time Zone</label>
    <p id="TimeZone_id" class="app-right-bottom-content app-right-bottom-content-2-mr"></p>
  </div>
</div>

<select id="FakeTimeZone_id" class="hide"></select>