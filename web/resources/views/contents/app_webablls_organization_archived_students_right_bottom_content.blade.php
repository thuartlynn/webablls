<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Warning: All reserved and extra seats are taken. Unarchiving student is not available. Contact WebABLLS support to unarchive student.</span>  
  </div>
</div>

<?php
  if (sizeof($ArchivedData) > 50) {
    echo '<div id="pager" class="pager app-nopadding-nomargin">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }

  if (sizeof($ArchivedData) > 0) {
    echo '<table id="UserTable" class="tablesorter" style="margin-bottom: 0 !important;">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Archived at</th>
                <th>Archived by</th>
              </tr>
            </thead>

            <tbody>';
            
    foreach($ArchivedData as $value) {
      echo '<tr data-table-row-id="'.$value["ID"].'">';
        echo "<td>";
          echo $value["ID"];
        echo "</td>";
        echo "<td>";
          echo $value["Name"];
        echo "</td>";
        echo "<td>";
          echo $value["Archived_Date"];
        echo "</td>";
        echo "<td>";
          echo $value["Archived_by"];
        echo "</td>";
      echo "</tr>";
    }
    echo '</tbody>
    </table>';
  } else {
    echo '<p class="app-right-bottom-content">There is no data to show.</p>';
  }
?>