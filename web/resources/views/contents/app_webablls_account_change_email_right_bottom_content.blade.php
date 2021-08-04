<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Warning: After changing email address you will be logged out. You will need to relogin to continue.</span>  
  </div>
</div>

<form action="{{url('/Account/ChangeEmail')}}" class="app-inline needs-validation" id="ChangeEmailfrm" method="post" novalidate>
  {{ csrf_field() }}
  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Current email</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr"><?php echo Auth::user()->email?></p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">New email</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" data-val="true" id="New_email" name="New_email" type="text" required autocomplete="off"/>
    <div id="Required" class="invalid-feedback">Email field is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Confirm new email</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Confirm_new_email" name="Confirm_new_email" type="text" required autocomplete="off"/>
    <div id="confirmRequired" class="invalid-feedback">Email confirmation is required</div>
  </div>

  <input type="submit" value="Change Email" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>

<input type="submit" value="Cancel" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="javascript:location.href='{{url('/Account')}}'"/>