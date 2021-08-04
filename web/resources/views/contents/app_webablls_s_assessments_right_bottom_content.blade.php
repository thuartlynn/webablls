<div class="">
  <?php
    if ($Assessment->count() > 50) {
      echo '<div class="pager app-nopadding-nomargin">
              <div style="float: left;" class="prev pager-button"><< previous page</div>
              <div style="float: right;" class="next pager-button">next page >></div>
            </div>';
    }
  ?>
  <table id="UserTable" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th>Assigned Date</th>
        <th>Create Date</th>
        <th>User</th>
        <th>Location</th>
      </tr>
    </thead>
    <tbody >
      <?php
        foreach($Assessment as $value) {
            echo '<tr data-table-row-id="'.$value['ID'].'"  data-table-row-seat-id="'.$Student["ID"].'">';
              echo '<td>';
                echo '<div id="assessReportcolor" style="background-color:'.$value["Color"].';"></div>';
              echo '</td>';
              echo '<td class="modify">';
                if ($value["Modified"] == true) {
                  echo '<span class="app-table-span-with-background-color" >M</span>';
                } else {
                  echo '<span class="app-table-span-with-background-color" style="display:none;"></span>';
                }
              echo '</td>';
              echo "<td>";
                echo $value["Assigned_Date"];
              echo "</td>"; 
              echo "<td>";
                echo $value["Create_Date"];
              echo "</td>";
              echo '<td>';
                echo $value["User_Name"];
              echo "</td>";
              echo '<td>';
                
              echo "</td>";
            echo "</tr>";
        }
            
      ?>
    </tbody>
  </table>
</div>
