<div>
  <form action="{{url('/Organization/Settings')}}" class="app-inline" id="settingsfrm" method="post">
    {{ csrf_field() }}
    <div class="app-right-bottom-mr">
      <label class="app-right-bottom-title" for="Login_Session_Timeout">Login Session Timeout (minutes)</label>
      <select id=Timeout_id name="Timeout" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
        <option value="0">Set by user</option>
        <option value="1">15 minutes</option>
        <option value="2">30 minutes</option>
        <option value="3">60 minutes</option>
        <option value="4">2 hours</option>
        <option value="5">4 hours</option>
        <option value="6">6 hours</option>
        <option value="7">8 hours</option>
      </select>
    </div>

  <input type="submit" value="Save Changes" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>
</div>