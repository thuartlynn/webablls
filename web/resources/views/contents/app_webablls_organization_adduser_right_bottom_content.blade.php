<?php
  use App\Enums\UserRole;
?>

<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr hide">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">User with this email address already exists in WebABLLS. Sharing rights can be authorized to any user within the system. Visit Contacts screen to add as contact or verify user within your Organization.</span>  
  </div>
</div>

<form action="{{url('/Organization/AddUser')}}" class="app-inline needs-validation" id="AddUserForm" method="post" role="form" novalidate>
  {{ csrf_field() }}

  <div>
    <label class="app-right-bottom-title">First Name</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="FirstName" name="FirstName" type="text" value="" required/>
    <div class="invalid-feedback">First Name field is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Last Name</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="LastName" name="LastName" type="text" value="" required/>
    <div class="invalid-feedback">Last Name field is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Email</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" data-val="true" id="New_email" name="New_email" type="text" required/>
    <div id="Required" class="invalid-feedback">Email field is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Email confirmation</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Confirm_new_email" name="Confirm_new_email" type="text" required/>
    <div id="confirmRequired" class="invalid-feedback">Email confirmation is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Account Role</label>
    <select id="Account_Role" name="Account_Role" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="{{UserRole::Standard()}}">Standard User</option>
      <option value="{{UserRole::Administrator()}}">Organization Administrator</option>
      <option value="{{UserRole::Restricted()}}">Restricted User</option>
    </select>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Preferred Language</label>
    <select id="Preferred_Language" name="Preferred_Language" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="0">English</option>
      <!--option value="1">Spanish</option-->
    </select>
  </div>

  <input type="submit" name="Add User Account" value="Add User Account" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
  <input type="submit" name="Add User + Link Share Permissions" value="Add User + Link Share Permissions" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>