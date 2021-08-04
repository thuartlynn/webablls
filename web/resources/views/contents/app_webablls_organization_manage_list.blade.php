<?php  
  use App\Services\UtilsService;
  $Utils = new UtilsService();
  $title_name = $Utils->GetNameByFormat($User->get("FirstName"), $User->get("LastName"));
?>
<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>'.$title_name.' (#'.$User->get("ID").')</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>'.$title_name.' (#'.$User->get("ID").')</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="list2" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item app-left-pan-point" data-path="/Organization/Manage/{{$User->get('ID')}}">Manage User Account</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Manage/ReplaceAll/{{$User->get('ID')}}">Select Replacement for All</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Manage/Students/{{$User->get('ID')}}">Related Students</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Manage/Type/{{$User->get('ID')}}">Change Role</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Manage/UserLinks/{{$User->get('ID')}}">Share Permissions by User</li>
      <?php
        if ($User->get('Blocked') == 1) {
          echo '<li id="Blocked" class="nav-item app-left-pan-point" data-path="" onclick="BlockUserAccount('.$User->get('ID').', 1)">Unblock User Account</li>';
        } else {
          echo '<li id="Blocked" class="nav-item app-left-pan-point" data-path="" onclick="BlockUserAccount('.$User->get('ID').', 0)">Block User Account</li>';
        }
      ?>
      <li class="nav-item app-left-pan-point" data-path="" onclick="DeleteUserAccount({{$User->get('ID')}}, {{$User->get('CanDelete')}})">Delete User Account</li>
      <li class="nav-item app-left-pan-point" data-path="" onclick="ResetUserPassword({{$User->get('ID')}})">Reset User Password</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Manage/SetPassword/{{$User->get('ID')}}">Set User Password</li>
    </ul>
  </nav>
</div>

<script type="text/javascript">

    $(function () {
        $("#list2 li").click(function(e) {
          if ($(this).data("path") != "")
            location.href=$(this).data("path");
        });
    });
</script>