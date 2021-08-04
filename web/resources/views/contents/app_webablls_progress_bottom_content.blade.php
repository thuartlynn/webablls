<form action="" class="app-inline needs-validation" id="progress_form" method="post" role="form">{{ csrf_field() }}
  <div class="mt-4">
      <?php
        if (Auth::user()->date_format == 0) {
          echo '<label class="app-right-bottom-title mr-1 ml-1">Assigned Date: </label>';
        } else {
          echo '<label class="app-right-bottom-title mr-1 ml-1">Assigned Date: </label>';
        }
      ?>
      <input id="datepicker" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="Birthday" type="text" value="10/31/2018" /> 
      <!-- 記得value帶資料庫資料 -->
  </div>

  <div class="mt-3 mb-3">
    <?php
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
          <th>Previous Level</th>
          <th>Current Level</th>
          <th>Notes</th>
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
                echo '<td class="align-top">'.$Category_Table[$Category][0][$value2["Index"]][0]["Title"].'<br></td>';
                foreach ((array)$value2["Objective"] as $value3) {
                  echo '<td class="align-top"><p>'.$value3.'</p></td>';
                }
                echo '<td><textarea rows="4" style="width: 100%;"></textarea></td>';
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