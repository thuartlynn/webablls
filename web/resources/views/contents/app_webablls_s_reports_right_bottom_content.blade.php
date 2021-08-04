<div class="">

  <?php
    if (sizeof($Report) > 50) {
      echo '<div id="pager" class="pager app-nopadding-nomargin">
              <div style="float: left;" class="prev pager-button"><< previous page</div>
              <div style="float: right;" class="next pager-button">next page >></div>
            </div>';
    }
  ?>
  <table id="ReportTable" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th></th>
        <th>Type</th>
        <th>Assigned Date</th>
        <th>Created At</th>
        <th>Created By</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($Report as $test1){
          echo '<tr data-table-row-id="'.$test1["ID"].'">';
          echo '<td>';
                if (isset($test1["Color"]) != null) {
                  echo '<div id="assessReportcolor" style="background-color:'.$test1["Color"].';"></div>';
                }
          echo '</td>';
          echo '<td>'.$test1["Type"].'</td>';
          echo '<td>'.$test1["Assigned_Date"].'</td>';
          echo '<td>'.$test1["Created_Date"].'</td>';
          echo '<td>'.$test1["Creator"].'</td>';
          echo '</tr>';
          if ($test1["Type"] === "WorkSheet") {
            foreach ($test1["ProgressReport"] as $pr) {
              echo '<tr>';
              echo '<td><div id="assessReportcolor" style="background-color:'.$test1["Color"].';"></div></td>';
              echo '<td>'.$pr["Type"].'</td>';
              echo '<td>'.$pr["Assigned_Date"].'</td>';
              echo '<td>'.$pr["Created_Date"].'</td>';
              echo '<td>'.$pr["Creator"].'</td>';
              echo '</tr>'; 
            }
          }
        }
      ?>
    </tbody>
  </table>
  <!-- <script>
    var tab = document.getElementById("ReportTable");
    tab.innerHTML+=''
  </script> -->


<!--echo '<td>type:'.$r["ProgressReport"][0]["Type"].'</td>';-->