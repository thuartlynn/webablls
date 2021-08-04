  <?php
    if ($FileList->count() > 50) {
      echo '<div class="pager app-nopadding-nomargin">
            <div style="float: left;" class="prev pager-button"><< previous page</div>
            <div style="float: right;" class="next pager-button">next page >></div>
            </div>';
    }
  ?>

  <table id="UserTable" class="tablesorter" style="">
    <thead>
      <tr>
        <th>Name</th>
        <th>Upload Date</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody >
      <?php
        foreach($FileList as $k => $v ) {
            echo '<tr data-table-row-id="'.$k.'">';
              echo "<td>";
                echo $v["FileName"]; 
              echo "</td>";
              echo "<td>";
                echo $v["UploadDate"];
              echo "</td>"; 
              echo "<td>";
                echo $v["Description"];
              echo "</td>";
            echo "</tr>";
        } 
      ?>
    </tbody>
  </table>