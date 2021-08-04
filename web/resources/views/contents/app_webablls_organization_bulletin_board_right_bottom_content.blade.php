<?php
if (sizeof($Bulletin) > 50) {
  echo '<div id="Bulletin_Board_Pager" class="Bulletin_Board_Pager app-nopadding-nomargin">
          <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
          <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
        </div>';
}

if (sizeof($Bulletin) > 0) {
  echo '<table id="Table" name="Bulletin_Board_Table" class="tablesorter" style="margin-bottom: 0 !important;">
          <thead>
            <tr>
              <th>Title</th>
              <th>Invisible</th>
              <th>Attachment</th>
            </tr>
          </thead>

          <tbody>';
  
  foreach($Bulletin as $key => $value) {
    echo '<tr data-table-row-id="'.$key.'">';
      echo '<td>';
        echo '<span>'.$value["Title"].'</span>';
      echo '</td>';
      echo '<td>';
        if ($value["Standard_Invisible"] == 1 && $value["Restricted_Invisible"] == 1) {
          echo '<span>Standard</span><span>, </span><span>Restricted</span>';
        } else if ($value["Standard_Invisible"] == 0 && $value["Restricted_Invisible"] == 1) {
          echo '<span>Restricted</span>';
        } else if ($value["Standard_Invisible"] == 1 && $value["Restricted_Invisible"] == 0) {
          echo '<span>Standard</span>';
        }
      echo '</td>';
      echo '<td>';
        echo '<span><a title="Click to download file" style="color: #337ab7;" href="/Organization/BulletinBoard/Download/'.$value["ID"].'">'.$value["FileName"].'</a></span>';
      echo '</td>';
    echo '</tr>';
  }
  echo '</tbody>
        </table>';
} else {
  echo '<p class="app-right-bottom-content">There is no data to show.</p>';
}
?>

<div id="Bulletin-box">
  <label style="Color: gray; font-weight: 700; font-family: 'Roboto',sans-serif; font-size: 13pt; text-align: left; margin: 0; padding: 0;">Title</label>
  <input class="form-control app-option-font app-right-bottom-content-mr" autocomplete="off" maxlength="50" id="Title" name="Title" type="text" value=""/>

  <label style="Color: gray; font-weight: 700; font-family: 'Roboto',sans-serif; font-size: 13pt; text-align: left; margin: 10px 0 0 0; padding: 0;">Content</label>
  <textarea style="min-height: 65px;" maxlength="500" class="form-control rounded-0 app-option-font app-textarea app-right-bottom-content-mr" id="Content" name="Content"></textarea>

  <label style="Color: gray; font-weight: 700; font-family: 'Roboto',sans-serif; font-size: 13pt; text-align: left; margin: 10px 0 0 0; padding: 0;">Invisible</label>

  <div>
    <label style="display: inline-block;" class="mr-2" for="Standard"><input class="mr-1" autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Standard" name="Standard" /><span style="vertical-align: middle; font-weight: 700; font-family: 'Roboto',sans-serif; font-size: 10pt;">Standard</span></label>
    <label style="display: inline-block;" for="Restricted"><input class="mr-1" autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Restricted" name="Restricted" /><span style="vertical-align: middle; font-weight: 700; font-family: 'Roboto',sans-serif; font-size: 10pt;">Restricted</span></label>
  </div>

  <label style="Color: gray; font-weight: 700; font-family: 'Roboto',sans-serif; font-size: 13pt; text-align: left; margin: 10px 0 0 0; padding: 0;">Attachment</label>
  <div class="form-inline row">
    <span style="display: inline-block;" class="mr-2 ml-3"><input disabled style="width: 400px;" class="form-control app-option-font" id="file_name" name="file_name" type="text" value=""/></span>
    <label class="btn btn-sm btn-secondary mr-2">
      <input id="file_upload" style="display:none;" type="file">
      Upload
    </label>

    <label id="delete_button" class="btn btn-sm btn-secondary">
      <input id="file_delete" style="display:none;" >
      Delete
    </label>
  </div>

  <label style="Color: gray; font-weight: 700; font-family: 'Roboto',sans-serif; font-size: 13pt; text-align: left; margin: 10px 0 0 0; padding: 0;">Date</label>
  <div class="form-inline row">
    <label style="display: inline-block;" class="mr-2 ml-3"><input id="datepicker_start" style="width: 200px;" class="form-control app-option-font" name="datepicker_start" type="text" value="" /></label>
    <label style="display: inline-block;" class="mr-2"><span style="vertical-align: middle;">~</span></label>
    <label style="display: inline-block;"><input id="datepicker_end" style="width: 200px;"  class="form-control app-option-font" name="datepicker_end" type="text" value="" /></label>
  </div>

  <div style="text-align: center; margin: 15px 0 0 0;">
    <button id="bulletin_confirm" class="btn btn-sm btn-secondary" style="margin-right: 5px;" type="button">Confirm</button>
    <button id="bulletin_cancel" class="btn btn-sm btn-secondary" type="button">Cancel</button>
    <button id="bulletin_delete" class="btn btn-sm btn-secondary" type="button">Delete</button>
  </div>
</div>