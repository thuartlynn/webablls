<div id="Warning_message" class="container bg-reports-yellow mt-3 mb-3 app-right-bottom-mr">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Tip: Fill Current Level"field for all tasks. These values will be used in future progress reports."</span>  
  </div>
</div>

<div id="Warning_message" class="container bg-reports-yellow mt-3 mb-3 app-right-bottom-mr">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Tip: You can change the title of this report before printing it. The new title will appear on the printed version."</span>  
  </div>
</div>

<form action="" class="app-inline" id="worksheet_form" method="post" role="form">{{ csrf_field() }}
  <div class="mt-4 form-inline">
    <label class="app-right-bottom-title mr-1" for="">Title: （資料庫資料）</label>
      <select name="" class="form-control custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
        <option value="" selected>Choose one</option>
        <option value="">Program Objectives</option>
        <option value="">?</option>
      </select>

      <?php
        if (Auth::user()->date_format == 0) {
          echo '<label class="app-right-bottom-title mr-1 ml-1">Assigned Date: </label>';
        } else {
          echo '<label class="app-right-bottom-title mr-1 ml-1">Assigned Date: </label>';
        }
      ?>
      <input id="datepicker" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="Birthday" type="text" value="資料庫資料" /> 
      <!-- 記得value帶資料庫資料 -->

  </div>

  <div class="mt-3 mb-3">
  `  <?php
      $Filter = "all";
      if (!empty($_GET['filter'])) {
        $Filter = $_GET['filter'];
      }
    ?>
    <?php
      include('/web/resources/views/contents/app_webablls_assessment_category_table.blade.php');
      $Faker = array( 0=>array(0=>array("Index"=>"B21",
                                        "Edit-Color"=>"#00ff00",
                                        "Color"=>array(0=>"#00ff00",
                                                      1=>"#ffff00"),
                                        "Objective"=>"If database has some data......"),
                              1=>array("Index"=>"B26",
                                        "Edit-Color"=>"#00ff00",
                                        "Color"=>array(0=>"#00ff00",
                                                      1=>"#00ff00",
                                                      2=>"#00ff00",
                                                      3=>"#ffff00"),
                                        "Objective"=>"If database has some data......")
                              ),
                      1=>array(0=>array("Index"=>"C6",
                                        "Edit-Color"=>"0",
                                        "Color"=>array(0=>"#00ff00",
                                                      1=>"#00ff00",
                                                      2=>"#00ff00",
                                                      3=>"#ffff00"),
                                        "Objective"=>"If database has some data......"),
                              1=>array("Index"=>"C22",
                                        "Edit-Color"=>"0",
                                        "Color"=>array(0=>"#00ff00",
                                                      1=>"#00ff00",
                                                      2=>"#00ff00",
                                                      3=>"#ffff00"),
                                        "Objective"=>"If database has some data......"),
                                                      
                                                      
                              )
                    );

    ?>
    <table id="ReportViewTable" class="table_report" width=100%> 
      <thead>
        <tr>
          <th>Skills</th>
          <th>Objective</th>
          <th>Criteria</th>
          <th>Current Level</th>
          <th>Program Notes</th>
        </tr>
      </thead>
      <tbody>

      <?php 
        if ($Filter != "all") {
    
        } else {
          $Count = 0;
          foreach($Faker as $value) {
            $Category = substr($value[0]["Index"], 0, 1);

            $Count2 = 0;
            foreach($value as $value2) {
              echo '<tr>';
                echo '<td class="align-top">'.$Category_Table[$Category][$value2["Index"]]["Title"].'<br>';
                
                if ($value2["Edit-Color"] != "0") {
                  echo '<div class="report-circle" style="margin-right: 2px; background-color: '.$value2["Edit-Color"].'"> </div>';
                }
                foreach($value2["Color"] as $value3) {
                  echo '<div class="mark" style="margin-right: 2px; background-color: '.$value3.'"></div>';
                }
                
                echo '</td>';
                foreach ((array)$value2["Objective"] as $value3) {
                  echo '<td><textarea rows="4" style="width: 100%;">'.$value3.'</textarea></td>';
                }
                echo '<td class="align-top">';
                foreach($Category_Table[$Category][$value2["Index"]]["Criteria"] as $value3) {
                  echo '<p class="app-right-bottom-content app-nopadding-nomargin">'.$value3.'</p>';
                }
                echo '</td>';
                echo '<td><textarea rows="4" style="width: 100%;"></textarea></td>';
                echo '<td><textarea rows="4" style="width: 100%;"></textarea></td>';
              echo '</tr>';
              $Count2++;
            }
            $Count++;
          }
        }
      ?>    
      </tbody>
    </table>
  </div>
</form>


