<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Report Type Filter</span>
    <ul id="reportFilter" class="nav app-left-pan-list-mr-pd">
      
      <li class="nav-item"><input class="mr-1" type="checkbox" id="programWork" />Program Worksheet</li>
      <li class="nav-item"><input class="mr-1" type="checkbox" id="progress" />Progress</li>
      <li class="nav-item"><input class="mr-1" type="checkbox" id="sTatus" />Status</li>
      <li class="nav-item"><input class="mr-1" type="checkbox" id="bAseline" />Baseline</li>
      <input class="search hide" id="P_hide" type="search" value="" data-column="4"/>
    </ul>
</div>

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student Filter</span>
  <p class="ml-4 mt-2">Name or ID:<input class="search" type="search" data-column="3"/></p>
</div>

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Assessment Color Filter</span><br>
  <div class="container ml-2">
  <input type="button" class="btn btn-secondary btn-sm reset" value="reset"></input>
  <!-- 考慮使用input 方式帶入color value 這樣才能filter 下方表格-->
  <?php
    $usingColor = array(1 => "#26baa2", 2 => "#8413A1", 3 => "#FAF411");
    foreach ($usingColor as $vusingColor) {
      echo '<input type="button" class="mark search" style="background-color:'.$vusingColor.';" />';
    }
  ?>
  <ul class="testgroup" id="test1">
  <button class="mark" id="color1" style="background-color:#26baa2;"></button>
  <button class="mark" id="color2" style="background-color:#8413A1;"></button>
  <button class="mark" style="background-color:#FAF411;"></button>
  <input class="search" id="color_hide" type="search" value="" data-column="0" />
  </ul>
  <script type="text/javascript">
    $( document ).ready(function() {
      
    });

    // $("#test1, #test2").change(function() {
    //         var colorvalue1 = document.getElementById("test1").checked;
    //         var colorvalue2 = document.getElementBsyId("test2").checked;
    //         // console.log (colorvalue);
    //         var color_hide = document.getElementById("color_hide");

    //         if (colorvalue1 && colorvalue2) {
    //             color_hide.value = "";
    //         } else if (colorvalue1) {
    //             color_hide.value = colorvalue1.value;
    //         } else {
    //             color_hide.value = "";
    //         }
    //         color_hide.dispatchEvent(new Event('change'));
    //   });

    // $(document).ready(function() {
    //   }
      // function colorFilter(node) {
      //   var index = Array.prototype.indexOf.call(node.parentNode.children, node);
      //   console.log (index);
      //         // var colorObj = index.document.getElementById();
      //         // var colorvalue = colorObj.style.backgroundColor;

      //         // var parent = document.getElementById();
      //         // var colorvalue = parent.style.backgroundColor;
      //         // console.log (colorvalue);
      //   }
    // });

    // function colorValue(){  一次帶出三個按鈕的顏色 但要搭配html tag 為form 並且用label group
    //   var color = document.getElementById("testColorgetval");
    //   for (var i=0; i<color.colorbuttom.length;i++) {
    //     if(color.colorbuttom[i].click){
    //       var colorvalue = color.colorbuttom[i].style.backgroundColor;
    //       console.log (colorvalue);
    //     }
    //   }
    // }

    // function ShowValue(node){   //每一個button有索引值，使用div 為group  
    //   var index = Array.prototype.indexOf.call(node.parentNode.children, node);   
    //   console.log(index);                    
    //   // var v = document.getElementById("").style.backgroundColor;
    //   if ( index != null ) {
    //     var test1 = index.document.getElementById();
    //     // var test2 = test1.document.getElementById.val();
    //     console.log(test1);
    //   }
    // }

  </script>
  </div>
  </div>

</div>

<div class="">
  <?php
    $report = array(0=>array("Modify" => "M", "Type" => "Worksheet", "Student_ID" => 438, "Student_Name" => "Partingtion, Aiden", "ID" => 3, "Color" => "#26baa2", "RGBColor" => "rgb(38, 186, 162)", "Assigned_Date" => "02/23/2020", "Created_Date" => "02/22/2020", "Creator" => "Kolby,Collins", "ProgressReport" => array( 0 => array("Modify" => "M", "Type" => "Progress", "ID" => 3, "Assigned_Date" => "02/25/2020", "Created_Date" => "02/25/2020", "Creator" => "Kolby,Collins"))),
                    1=>array("Modify" => "M", "Type" => "BaseLine", "Student_ID" => 438, "Student_Name" => "Partingtion, Aiden", "ID" => 37, "Assigned_Date" => "02/25/2020", "Created_Date" => "02/24/2020", "Creator" => "Kolby,Collins"),
                    2=>array("Modify" => "V", "Type" => "Worksheet", "Student_ID" => 578, "Student_Name" => "Green, Molly", "ID" => 43, "Color" => "#26baa2", "RGBColor" => "rgb(38, 186, 162)", "Assigned_Date" => "02/24/2020", "Created_Date" => "02/23/2020", "Creator" => "Kolby,Collins"),
                    3=>array("Modify" => "V", "Type" => "Worksheet", "Student_ID" => 578, "Student_Name" => "Green, Molly", "ID" => 42, "Color" => "#26baa2", "RGBColor" => "rgb(38, 186, 162)", "Assigned_Date" => "02/23/2020", "Created_Date" => "02/23/2020", "Creator" => "Kolby,Collins"),
                    4=>array("Modify" => "V", "Type" => "Worksheet", "Student_ID" => 578, "Student_Name" => "Green, Molly", "ID" => 41, "Color" => "#26baa2", "RGBColor" => "rgb(38, 186, 162)",  "Assigned_Date" => "02/23/2020", "Created_Date" => "02/20/2020", "Creator" => "Kolby,Collins"),
                    5=>array("Modify" => "M", "Type" => "Worksheet", "Student_ID" => 438, "Student_Name" => "Partingtion, Aiden", "ID" => 4, "Color" => "#26baa2", "RGBColor" => "rgb(38, 186, 162)", "Assigned_Date" => "02/23/2020", "Created_Date" => "02/25/2020", "Creator" => "Kolby,Collins", "ProgressReport" => array( 0 => array("Modify" => "M", "Type" => "Progress", "ID" => 4, "Assigned_Date" => "02/25/2020", "Created_Date" => "02/24/2020", "Creator" => "Kolby,Collins")))
    );
  ?>
  <?php
    if (sizeof($report) > 10) {
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
        <th></th>
        <th>Modify</th>
        <th>Student ID</th>
        <th>Student</th>
        <th>Type</th>
        <th>Assigned Date</th>
        <th>Created at</th>
        <th>Create by</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($report as $vreport){
          if ($vreport["Type"] === "BaseLine") {
          echo '<tr data-table-row-id="'.$vreport['ID'].'">';
          echo '<td></td>';
          echo '<td></td>';
          echo '<td>'.$vreport["Modify"].'</td>';
          echo '<td>'.$vreport["Student_ID"].'</td>';
          echo '<td>'.$vreport["Student_Name"].'</td>';
          echo '<td>'.$vreport["Type"].'</td>';
          echo '<td>'.$vreport["Assigned_Date"].'</td>';
          echo '<td>'.$vreport["Created_Date"].'</td>';
          echo '<td>'.$vreport["Creator"].'</td>';
          echo '</tr>';
          }
        }
      ?>
      <?php
        foreach ($report as $vreport){
          if ($vreport["Type"] === "Status") {
          echo '<tr data-table-row-id="'.$vreport['ID'].'">';
          echo '<td></td>';
          echo '<td></td>';
          echo '<td>'.$vreport["Modify"].'</td>';
          echo '<td>'.$vreport["Student_ID"].'</td>';
          echo '<td>'.$vreport["Student_Name"].'</td>';
          echo '<td>'.$vreport["Type"].'</td>';
          echo '<td>'.$vreport["Assigned_Date"].'</td>';
          echo '<td>'.$vreport["Created_Date"].'</td>';
          echo '<td>'.$vreport["Creator"].'</td>';
          echo '</tr>';
          }
        }
      ?>
      <?php
        foreach ($report as $vreport){
          if ($vreport["Type"] === "Worksheet") {
          echo '<tr data-table-row-id="'.$vreport['ID'].'" >';
          echo '<td>'.$vreport["Color"].'</td>';
          echo '<td width="25px"><div id="assessReportcolor" style="background-color:'.$vreport["Color"].';"></div></td>';
          echo '<td>'.$vreport["Modify"].'</td>';
          echo '<td>'.$vreport["Student_ID"].'</td>';
          echo '<td>'.$vreport["Student_Name"].'</td>';
          echo '<td>'.$vreport["Type"].'</td>';
          echo '<td>'.$vreport["Assigned_Date"].'</td>';
          echo '<td>'.$vreport["Created_Date"].'</td>';
          echo '<td>'.$vreport["Creator"].'</td>';
          echo '</tr>';
          }
        }
      ?>
      <!--假資料不用判別，串資料庫時記得加入if else-->
      <?php  
        foreach ($vreport["ProgressReport"] as $pr) {
          echo '<tr data-table-row-id="'.$vreport['ID'].'" >';
          echo '<td>'.$vreport["Color"].'</td>';
          echo '<td><div id="assessReportcolor" style="background-color:'.$vreport["Color"].';"></div></td>';
          echo '<td>'.$pr["Modify"].'</td>';
          echo '<td>'.$vreport["Student_ID"].'</td>';
          echo '<td>'.$vreport["Student_Name"].'</td>';
          echo '<td>'.$pr["Type"].'</td>';
          echo '<td>'.$pr["Assigned_Date"].'</td>';
          echo '<td>'.$pr["Created_Date"].'</td>';
          echo '<td>'.$pr["Creator"].'</td>';
          echo '</tr>'; 
        }
      ?>
    </tbody>
  </table>
</div>

