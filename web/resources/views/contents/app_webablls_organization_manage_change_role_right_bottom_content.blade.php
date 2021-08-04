<?php
  use App\Enums\UserRole;
?>

<form action="{{url('/Organization/Type')}}/{{$User->get('ID')}}" class="app-inline" id="replaceallfrm" method="post" role="form" novalidate>
  {{ csrf_field() }}

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Select_new_role">Select new role for user:</label>
    <select id="Select_new_role_id" name="select_new_role" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="{{UserRole::Standard()}}">Standard User</option>
      <option value="{{UserRole::Administrator()}}">Organization Administrator</option>
      <option value="{{UserRole::Restricted()}}">Restricted User</option>
    </select>
  </div>

  <input type="submit" value="Change Role" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>