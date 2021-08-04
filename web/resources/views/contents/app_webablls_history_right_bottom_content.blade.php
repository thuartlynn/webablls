<div >
   
  <?php
    if ($Records->count() > 50) {
      echo '<div class="pager app-nopadding-nomargin">
              <div style="float: left;" class="prev pager-button"><< previous page</div>
              <div style="float: right;" class="next pager-button">next page >></div>
            </div>';
    }
  ?>

  <table id="historyTable" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th>Date</th>
        <th>User First Name</th>
        <th>User Last Name</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody >
      <?php
        if (count($Records) == 0) {  
          echo '<tr class="nohovered-color"><td colspan="4">There is no data to show.</td></tr>';
        } else {
          foreach($Records as $value) {
            echo '<tr class="nohovered-color">';
              echo '<td class="date">';
                echo $value["Date"];
              echo '</td>';
              echo '<td>';
                echo $value["FirstName"];
              echo '</td>';
              echo '<td>';
                echo $value["LastName"];
              echo '</td>';
              echo '<td>';
                echo $value["Description"];
              echo '</td>';
            echo '</tr>';
          }
        }
      ?>
    </tbody>
  </table>
</div>