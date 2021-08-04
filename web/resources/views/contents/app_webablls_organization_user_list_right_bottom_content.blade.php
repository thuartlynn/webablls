<?php
  if (sizeof($Member) > 50) {
    echo '<div id="pager" class="pager app-nopadding-nomargin">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }
?>

<table id="UserTable" class="tablesorter" style="margin-bottom: 0 !important;">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Role</th>
    </tr>
  </thead>

  <tbody>
    <?php
      foreach($Member as $value) {
        echo '<tr data-table-row-id="'.$value['ID'].'">
                <td>'.$value['FirstName'].'</td>
                <td>'.$value['LastName'].'</td>
                <td>'.$value['Email'].'</td>
                <td>'.$value['Role'].'</td>
              </tr>';
      }
    ?>
  </tbody>
</table>