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
      <tbody>
      <?php 
        if ($Filter != "all") {
    
        } else {
          $Count = 0;
          foreach($Faker as $value) {
            $Category = substr($value["Index"], 0, 1);

            $Count2 = 0;
            foreach($value as $value2) {
              echo '<tr>';
                echo '<td style="vertical-align:text-top;">'.$Category_Table[$Category][$value2["Index"]]["Title"].'<br>';
                foreach($Category_Table[$Category][$value2["Index"]]["Criteria"] as $value3) {
                  echo '<p class="app-right-bottom-content app-nopadding-nomargin">'.$value3.'</p>';
                }
                echo '</td>';
                
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