<div class="" style="margin-top: 5px;">
  <?php
    $analyticList = array(0=>array("analyID" => 86, "Assessment_Dates" => "01/16/2015-01/08/2019", "Created_Date" => "01/09/2020"),
                    1=>array("analyID" => 87, "Assessment_Dates" => "07/08/2015-01/08/2019", "Created_Date" => "01/09/2019"),
                    2=>array("analyID" => 96, "Assessment_Dates" => "01/16/2015-01/08/2019", "Created_Date" => "01/16/2019"),
                    3=>array("analyID" => 97, "Assessment_Dates" => "01/16/2015-01/08/2019", "Created_Date" => "01/16/2019"),
                    4=>array("analyID" => 98, "Assessment_Dates" => "01/16/2015-01/08/2019", "Created_Date" => "01/16/2019")
    );
  ?>
  <?php
    if (sizeof($analyticList) > 50) {
      echo '<div id="pager" class="pager app-nopadding-nomargin">
              <div class="prev pager-button float-left">&lt;&lt; previous page</div>
              <div class="next pager-button float-right">next page &gt;&gt;</div>
            </div>';
    }
  ?>
  <table id="analyticList" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>ID</th>
        <th>Assessment Date</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
    <?php
        foreach ($analyticList as $test1){
          echo '<tr data-table-row-id="'.$test1["analyID"].'">';
            echo '<td><a href="{{ url(\'/detail_'.$test1["analyID"].'\') }}" >View</a></td>';
            echo '<td><a href="{{ url(\'/edit_'.$test1["analyID"].'\') }}">Edit</a></td>';
            echo '<td><a href="">Delete</a></td>'; //onclick 等同archive student
            echo '<td>'.$test1["analyID"].'</td>';
            echo '<td>'.$test1["Assessment_Dates"].'</td>';
            echo '<td>'.$test1["Created_Date"].'</td>';
          echo '</tr>';
        }
    ?>
    </tbody>
  </table>
</div>

