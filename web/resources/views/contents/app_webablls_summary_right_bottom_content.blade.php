<div class="mt-5">
  <div class="col" >
    <h5 class="ml-n1">Details
    <span><a class="profile" href="/Student/ViewProfile/<?php echo $Student["ID"]?>" id="">More</a></span></h5>
    <!-- <span><a data-path="/Student/ViewProfile/" id="profile" class="disabled">More</a></span></h5> -->

    <table class="table_summary">
      <thead>
        <tr>
          <th>ID#</th>
          <th>Name</th>
          <th>Birth Date</th>
          <th>Create Date</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $Details = array($Student["ID"], $Student["Name"], $Student["DOB"], $Student["Create_Date"]);
          echo '<tr>';
            for($i=0; $i<=3; $i++){
              echo "<td>$Details[$i]</td>";
            }
          echo '</tr>';
      ?>
      </tbody>
    </table>
  </div>

  <div class="col">
    <h5 class="ml-n1">Assessments</h5>  <!--and Reports -->
    <div class="summary-group">
      <?php

        foreach ($Assessment as $a) {
          echo '<div class="summary-assessment mb-2">
                  <div class="mark" style="background-color: '.$a["Color"].';"></div>'.$a["Create_Date"].'
                  <span><a href="/Assessment/DetailsEdit/'.$a["ID"].'" class="Details">Details</a></span>
                  <span><a href="/Assessment/TgvGridEdit/'.$a["ID"].'" class="Grid">Grid</a></span>
                  <span><a href="/Assessment/TgvTextEdit/'.$a["ID"].'" class="Text">Text</a></span>
                  <span><a href="/Assessment/TgvCatEdit/'.$a["ID"].'" class="Cat">Cat</a></span>';
          // foreach ($a["Report"] as $w) {
          //   if ($w["Type"] === "WorkSheet") {
          //     echo '<div class="summary-worksheet"> <span>Program  Worksheet - '.$w["Created_Date"].' by '.$w["Creator"].' <a href="/Assessment/'.$w["Type"].'/'.$w["ID"].'">Details</a></span></div>';
          //     foreach ($w["ProgressReport"] as $pr) {
          //       if ($pr["Type"] === "Progress") {
          //         echo '<div class="summary-progressreport"> <span>Progress Report - '.$pr["Created_Date"].' by '.$pr["Creator"].' <a href="/Assessment/Progress/'.$pr["ID"].'">Details</a></span></div>';
          //       } else {
          //         echo '<div class="summary-progressreport" style="display:none;"></div>';
          //       }
          //     }
          //   } else if ($w["Type"] === "BaseLine") {
          //     echo '<div class="summary-worksheet"> <span>BaseLine Report - '.$w["Created_Date"].' by '.$w["Creator"].' <a href="/Assessment/Baseline/'.$w["ID"].'">Details</a></span></div>';
          //   } else if ($w["Type"] === "Status") {
          //       echo '<div class="summary-worksheet"> <span>Status Report - '.$w["Created_Date"].' by '.$w["Creator"].' <a href="/Assessment/Status/'.$w["ID"].'">Details</a></span></div>';
          //   } else {
          //     echo '<div class="summary-worksheet" style="display:none;"></div>';
          //   }
          // }
          echo '</div><br>';
        }
      ?>
      <script>
        $(document).ready(function(){
          var el = document.querySelector(".summary-group");
          // console.log(el);
          $(".summary-assessment:gt(0)").addClass("old");
        });
      </script>

    </div>
  </div>

  <div class="col">
    <h5 class="ml-n1">Sharing Permissions <span><a class="share" href="/Student/ShareStudent/<?php echo $Student["ID"]?>" id="">More</a></span> </h5>    
    <table class="sharePermission">
      <tbody>
        <tr><th>Coordinator</th></tr>
        <tr><td><?php echo ''.$Coordinator.''; ?></td></tr>
        <tr><th>Owner(s)</th></tr>
        <tr><td>
        <?php
          foreach ($Owners as $o) {
          echo ''.$o.'<br> ';
          }
        ?>
        </td></tr>
      </tbody>
    </table>
  </div>
</div>

<!-- <?php
  $test = implode(["FA","O"]);

  if (strpos($test, 'FA') !== false) {


    echo strpos($test, 'FA');

  } else {
    echo '沒有';
  }

?> -->