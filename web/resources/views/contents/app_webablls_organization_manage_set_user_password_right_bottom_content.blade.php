<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr hide">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">User's password has been updated</span>  
  </div>
</div>

<form action="{{url('/Organization/SetPassword')}}/{{$User->get('ID')}}" class="app-inline" id="SetPasswordfrm" method="post">
  {{ csrf_field() }}
  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="New_Password">New Password</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="NewPassword" name="NewPassword" type="password" value="" oninput="Listener(event)" onporpertychange="Listener(event)"/>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Confirm_New_Password">Confirm New Password</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="ConfirmNewPassword" name="ConfirmNewPassword" type="password" value="" oninput="Listener(event)" onporpertychange="Listener(event)"/>
  </div>
  <input id="submit" type="submit" value="Change Password" class="btn btn-sm btn-secondary app-right-bottom-mr"/>

  <p class="app-right-bottom-title app-right-bottom-mr">Password requirements</p>

  <ul class="app-list-ul app-right-bottom-mr">
    <li id="list-input-pw-9" style="margin-left: -10px; list-style-type: none; color: red;" class="app-list-item app-right-bottom-content"><i class="fas fa-times fa-lg mr-1"></i>Password must consist of at least 9 characters</li>
    <li id="list-input-pw-9-v" style="margin-left: -10px; list-style-type: none;" class="app-disappear app-list-item app-right-bottom-content list-group-item-success"><i class="fas fa-check mr-1"></i>Password must consist of at least 9 characters</li>
    <li id="list-input-pw-lower" style="margin-left: -10px; list-style-type: none; color: red;" class="app-list-item app-right-bottom-content"><i class="fas fa-times fa-lg mr-1"></i>Password must include at least 1 lower case characters</li>
    <li id="list-input-pw-lower-v" style="margin-left: -10px; list-style-type: none;" class="app-disappear app-list-item app-right-bottom-content list-group-item-success"><i class="fas fa-check mr-1"></i>Password must include at least 1 lower case character</li>
    <li id="list-input-pw-upper" style="margin-left: -10px; list-style-type: none; color: red;" class="app-list-item app-right-bottom-content"><i class="fas fa-times fa-lg mr-1"></i>Password must include at least 1 upper case character</li>
    <li id="list-input-pw-upper-v" style="margin-left: -10px; list-style-type: none;" class="app-disappear app-list-item app-right-bottom-content list-group-item-success"><i class="fas fa-check mr-1"></i>Password must include at least 1 upper case character</li>
    <li id="list-input-pw-special" style="margin-left: -10px; list-style-type: none; color: red;" class="app-list-item app-right-bottom-content"><i class="fas fa-times fa-lg mr-1"></i>Password must include at least one special character OR one digit</li>
    <li id="list-input-pw-special-v" style="margin-left: -10px; list-style-type: none;" class="app-disappear app-list-item app-right-bottom-content list-group-item-success"><i class="fas fa-check mr-1"></i>Password must include at least one special character OR one digit</li>
    <li id="list-input-pw-check" style="margin-left: -10px; list-style-type: none; color: red;" class="app-list-item app-right-bottom-content"><i class="fas fa-times fa-lg mr-1"></i>Enter confirmation password that matches new password</li>
    <li id="list-input-pw-check-v" style="margin-left: -10px; list-style-type: none;" class="app-disappear app-list-item app-right-bottom-content list-group-item-success"><i class="fas fa-check mr-1"></i>Enter confirmation password that matches new password</li>
  </ul>
</form>