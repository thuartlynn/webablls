<div class="mt-2">
<?php
      include('/web/resources/views/contents/app_webablls_assessment_category_table.blade.php');
      
      $Faker = array( "A" => array(1=>array("Index"=>"A3",
                                            "Edit-Color"=>"#00ff00",
                                            "Color"=>array(0=>"#ffff00",1=>"#00ff00"),
                                            "Notes"=>array(0=>array("Name"=>"Lacy Lebsack",
                                                                              "Time"=>"11/17/2018 19:05",
                                                                              "Notes"=>"Data1",
                                                                              "Open/Private"=>"0"),
                                                                    1=>array("Name"=>"Lacy Lebsack",
                                                                              "Time"=>"11/20/2018 19:05",
                                                                              "Notes"=>"Data2",
                                                                              "Open/Private"=>"1"))
                                                     ),
                                  2 => array("Index"=>"A5",
                                             "Edit-Color"=>"#00ff00",
                                             "Color"=>array(0=>"#ffff00",1=>"#00ff00",2=>"#00ff00",3=>"#00ff00"),
                                             "Notes"=>array(0=>array("Name"=>"Lacy Lebsack",
                                                                                "Time"=>"11/17/2018 19:05",
                                                                                "Notes"=>"Data1",
                                                                                "Open/Private"=>"0"),
                                                                      1=>array("Name"=>"Lacy Lebsack",
                                                                                "Time"=>"11/20/2018 19:05",
                                                                                "Notes"=>"Data2",
                                                                                "Open/Private"=>"1"))
                                                        )
                                                    ),

                      "B" => array(),

                      "C" => array(1=>array("Index"=>"C3",
                                            "Edit-Color"=>"#00ff00",
                                            "Color"=>array(0=>"#ffff00",1=>"#00ff00"),
                                            "Notes"=>array(0=>array("Name"=>"Lacy Lebsack",
                                                                    "Time"=>"11/17/2018 19:05",
                                                                    "Notes"=>"Data1",
                                                                    "Open/Private"=>"0"),
                                                           1=>array("Name"=>"Lacy Lebsack",
                                                                    "Time"=>"11/20/2018 19:05",
                                                                    "Notes"=>"Data2",
                                                                    "Open/Private"=>"1"))
                                            ),
                                  2=>array("Index"=>"C6",
                                           "Edit-Color"=>"#00ff00",
                                           "Color"=>array(0=>"#ffff00",1=>"#00ff00",2=>"#00ff00",3=>"#00ff00"),
                                           "Notes"=>array(0=>array("Name"=>"Lacy Lebsack",
                                                                   "Time"=>"11/17/2018 19:05",
                                                                   "Notes"=>"Data1",
                                                                   "Open/Private"=>"0"),
                                                          1=>array("Name"=>"Lacy Lebsack",
                                                                   "Time"=>"11/20/2018 19:05",
                                                                   "Notes"=>"Data2",
                                                                   "Open/Private"=>"1"))
                                          )
                                  ),
                      "D" => array(),
                      "E" => array(),
                      "F" => array(),
                      "G" => array(),
                      "H" => array(),
                      "I" => array(),
                      "J" => array(),
                      "K" => array(),
                      "L" => array(),
                      "M" => array(),
                      "N" => array(),
                      "P" => array(),
                      "Q" => array(),
                      "R" => array(),
                      "S" => array(),
                      "T" => array(),
                      "U" => array(),
                      "V" => array(),
                      "W" => array(),
                      "X" => array(),
                      "Y" => array(),
                      "Z" => array()
                    );

?>

    <?php 
      
      if ($Filter != "all") {
        echo '<div>';
        
        $Category = $Filter;

        $length = sizeof($Notes[$Filter]);

        echo '<h5 class="text-secondary ml-0">'.$Category_Table[$Category]["Title2"].'</h5>';

        if ($length == 0) {
          echo '<p class="text-secondary">There are no notes to display.</p>';
        } else {
          foreach($Notes as $k => $v) {
            // $Index = substr($v->get("Index"),1,1)-1;
            // $Index2 = $k.$Index;
            if ($Category == $k)  {
              foreach ($v as $vValue) {
                echo '<p class="color_999 pt-1">'.$Category_Table[$k][$vValue["Index"]]["Title"].'</p>';

                // Edit-Color
                echo '<div class="edit-color">';
                  if ($vValue["Edit-Color"] == "#0") {
                    echo '<span class="b mr-2"></span>';
                  } else {
                    echo '<span class="s mr-2" style="background-color:'.$vValue["Edit-Color"].';"></span>';
                  }
                // foreach 顏色
                foreach($vValue["Color"] as $colorvalue) {
                  if ($colorvalue == "#0") {
                    echo  '<div class="mark" style="margin-right: 2px; background-color: #efeeef;"></div>';
                  } else {
                    echo  '<div class="mark" style="margin-right: 2px; background-color: '.$colorvalue.'"></div>';
                  }
                }
                echo '</div>';

                // foreach Notes
                foreach ($vValue["Notes"] as $notes) {
                  if ($notes["Open/Private"] == 1) {
                    echo '<div class="text-secondary Open pl-4">';
                      echo '<p>';
                      echo $notes["Notes"];
                      echo '<br>';
                      echo '<p class="text-0_75rem mt-n3">';
                      echo $notes["Name"];
                      echo ' @ ';
                      echo $notes["Time"];
                      if ($notes["Open/Private"] == 1) {
                        echo ' Open';
                      } else {
                        echo ' Private';
                      }
                      echo '</p>';
                      echo '</p>';
                    echo '</div>';
                  } else {
                    if ( $Students["Permission"]->contains('FA') || $Students["Permission"]->contains('FAs') || $Students["Permission"]->contains('CO') || $Students["Permission"]->contains('O') || $Students["Permission"]->contains('Av') || $Students["Permission"]->contains('Am')) {
                      echo '<div class="text-secondary Private pl-4">';
                        echo '<p>';
                        echo $notes["Notes"];
                        echo '<br>';
                        echo '<p class="text-0_75rem mt-n3">';
                        echo $notes["Name"];
                        echo ' @ ';
                        echo $notes["Time"];
                        if ($notes["Open/Private"] == 1) {
                          echo ' Open';
                        } else {
                          echo ' Private';
                        }
                        echo '</p>';
                        echo '</p>';
                      echo '</div>';
                    } else {
                      echo '';
                    }
                  }
                }
              }
            } else {
              echo '';
            }
          }   
        }
        echo '</div>';
      } else {
  
        foreach ( $Notes as $k => $v) {
          $lengthAll = sizeof($Notes[$k]);
          //echo $v->get("Index");
          if ($lengthAll > 0) {
            echo '<div>';
            echo '<h5 class="text-secondary ml-0">'.$Category_Table[$k]["Title2"].'</h5>';
            
              foreach ($v as $vValue) {
                echo '<p class="color_999 pt-1">'.$Category_Table[$k][$vValue["Index"]]["Title"].'</p>';

                // Edit-Color
                echo '<div class="edit-color">';
                  if ($vValue["Edit-Color"] == "#0") {
                    echo '<span class="b mr-2"></span>';
                  } else {
                    echo '<span class="s mr-2" style="background-color:'.$vValue["Edit-Color"].';"></span>';
                  }
                // foreach 顏色
                foreach($vValue["Color"] as $colorvalue) {
                  
                    echo  '<div class="noscore" style="margin-right: 2px; background-color: '.$colorvalue.'"></div>';

                }
                echo '</div>';

                // foreach Notes
                foreach ($vValue["Notes"] as $notes) {
                  if ($notes["Open/Private"] == 1) {
                    echo '<div class="text-secondary Open pl-4">';
                      echo '<p>';
                      echo $notes["Notes"];
                      echo '<br>';
                      echo '<p class="text-0_75rem mt-n3">';
                      echo $notes["Name"];
                      echo ' @ ';
                      echo $notes["Time"];
                      if ($notes["Open/Private"] == 1) {
                        echo ' Open';
                      } else {
                        echo ' Private';
                      }
                      echo '</p>';
                      echo '</p>';
                    echo '</div>';
                  } else {
                    if ( $Students["Permission"]->contains('FA') || $Students["Permission"]->contains('FAs') || $Students["Permission"]->contains('CO') || $Students["Permission"]->contains('O') || $Students["Permission"]->contains('Av') || $Students["Permission"]->contains('Am')) {
                      echo '<div class="text-secondary Private pl-4">';
                        echo '<p>';
                        echo $notes["Notes"];
                        echo '<br>';
                        echo '<p class="text-0_75rem mt-n3">';
                        echo $notes["Name"];
                        echo ' @ ';
                        echo $notes["Time"];
                        if ($notes["Open/Private"] == 1) {
                          echo ' Open';
                        } else {
                          echo ' Private';
                        }
                        echo '</p>';
                        echo '</p>';
                      echo '</div>';
                    } else {
                      echo '';
                    }
                  }
                }
              }
            echo '</div>';
          } else {
            echo '';
          }
        }
      }
    ?>

</div>