<?php
if ($Student->get('Name') == "") {
  $url = url('/Organization/Manage/ReplaceAll');
  echo '<form action="'.$url.'/'.$User->get('ID').'" class="app-inline" id="replaceallfrm" method="post" role="form" novalidate>';
} else {
  $url = url('Organization/Manage/Students/Replace');
  echo '<form action="'.$url.'/'.$User->get('ID').'/'.$Student->get('ID').'" class="app-inline" id="replaceallfrm" method="post" role="form" novalidate>';
}
?>
  {{ csrf_field() }}

  <?php
  if ($Student->get('Name') == "") {
    echo '<p class="app-right-bottom-content app-right-bottom-mr">Student Name: All students</p>';
  } else {
    echo '<p class="app-right-bottom-content app-right-bottom-mr">Student Name: '.$Student->get('Name').'</p>';
  }
  ?>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Rights_transfer">Select new user for rights transfer:</label>
    <select id="rights_transfer_id" name="rights_transfer" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <?php
        use App\Services\UtilsService;
        $Utils = new UtilsService();
        foreach($Member as $value) {
          $name = $Utils->GetNameByFormat($value["FirstName"], $value["LastName"]);
          echo '<option value="'.$value["ID"].'">'.$name.' ('.$value["Email"].')</option>';
        }
      ?>
    </select>
  </div>

  <input type="submit" value="Transfer rights" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>