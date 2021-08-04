<?php
  include('/web/resources/views/contents/app_webablls_assessment_category_table.blade.php');

  if ($Filter != "all") {

    echo '<div class="mt-1 mb-1">
            <div id="prev" style="float: left" class="prev app-pager-button">&lt;&lt; previous Category</div>
            <div id="next" style="float: right" class="next app-pager-button">next Category &gt;&gt;</div>
            <div style="clear: both;"></div>
          </div>';

    $Category = $Filter;

    echo '<nav style="background-color:#a2a3a3; padding: 10px 0 10px 10px;">
      <p style="color: white; word-wrap:break-word; word-break:normal;" class="app-nopadding-nomargin app-right-bottom-title">'.$Category_Table[$Category]["Title"].'</p>
    </nav>';
    $Count2 = 0;
    foreach($CompleteItems[$Category] as $value2) {
      if (!($value2["Index"] == "H3" && $AssInfo->get('Signlanguage') == 0)) {
        if ($Count2%2 == 0) {
          echo '<nav style="background-color:#e1e5e7; padding: 10px 0 10px 10px;">';
        } else {
          echo '<nav style="background-color:#d3d3d3; padding: 10px 0 10px 10px;">';
        }
        
        echo '<p style="color: gray; word-wrap:break-word; word-break:normal;" class="app-nopadding-nomargin app-right-bottom-title">'.$Category_Table[$Category][$value2["Index"]]["Title"].'</p>';
        
        echo '<div class="mt-1">';
  
        foreach($Category_Table[$Category][$value2["Index"]]["Criteria"] as $value3) {
          echo '<p style="word-wrap:break-word; word-break:normal;" class="app-right-bottom-content app-nopadding-nomargin">'.$value3.'</p>';
        }
        echo '</div>';
  
        echo '<div class="mt-1">
                <p style="word-wrap:break-word; word-break:normal; color: green;" class="app-nopadding-nomargin app-right-bottom-content">'.$Category_Table[$Category][$value2["Index"]]["Ojective"].'</p>
              </div>';
  
  
        echo '<div class="mt-1 ml-2">';
        if ($value2["Index"] == "") {
          echo '<div style="display: inline-block;">n/a</div>';
        } else {
          if ($value2["Edit-Color"] != "#0") {
            echo '<div class="app-circle" style="margin-right: 10px; display: inline-block; background-color: '.$value2["Edit-Color"].'"> </div>';
          }
          foreach($value2["Color"] as $value3) {
            echo '<label class="app-right-bottom-content" style="display: inline-block;" for="Color"><span style="margin-right: 10px; vertical-align: middle; width: 15px; height: 15px; border: 1px solid black; display: inline-block; background-color:'.$value3.';"></span></label>';
          }
        }
        echo '</div>';
  
        echo '</nav>';
        $Count2++;
      }
    }

    echo '<div class="mt-1 mb-1">
            <div id="prev2" style="float: left" class="prev app-pager-button">&lt;&lt; previous Category</div>
            <div id="next2" style="float: right" class="next app-pager-button">next Category &gt;&gt;</div>
            <div style="clear: both;"></div>
          </div>';
  } else {
    $Count = 0;
    if ($CompleteItems->count() == 0) {
      echo '<p class="app-right-bottom-content">There is no data to show.</p>';
    }
    foreach($CompleteItems as $key=>$value) {
      $Category = substr($value[0]["Index"], 0, 1);

      $Signlanguageflg = 0;
      if ($Category == "H" && sizeof($value) == 1) {
        if ($value[0]["Index"] == "H3" && $AssInfo->get('Signlanguage') == 0) {
            $Signlanguageflg = 1;
        }
      }

      if ($Signlanguageflg == 0) {
        if ($Count == 0) {
          echo '<nav style="background-color:#a2a3a3; margin-top: 10px; padding: 10px 0 10px 10px;">
                  <p style="color: white;" class="app-nopadding-nomargin app-right-bottom-title">'.$Category_Table[$Category]["Title"].'</p>
                </nav>';
        } else {
          echo '<nav style="background-color:#a2a3a3; padding: 10px 0 10px 10px;">
                  <p style="color: white;" class="app-nopadding-nomargin app-right-bottom-title">'.$Category_Table[$Category]["Title"].'</p>
                </nav>';
        }
      }
  
      $Count2 = 0;
      foreach($value as $value2) {
        if (!($value2["Index"] == "H3" && $AssInfo->get('Signlanguage') == 0)) {
          if ($Count2%2 == 0) {
            echo '<nav style="background-color:#e1e5e7; padding: 10px 0 10px 10px;">';
          } else {
            echo '<nav style="background-color:#d3d3d3; padding: 10px 0 10px 10px;">';
          }
          
          echo '<p style="color: gray;" class="app-nopadding-nomargin app-right-bottom-title">'.$Category_Table[$Category][$value2["Index"]]["Title"].'</p>';
          
          echo '<div class="mt-1">';
    
          foreach($Category_Table[$Category][$value2["Index"]]["Criteria"] as $value3) {
            echo '<p class="app-right-bottom-content app-nopadding-nomargin">'.$value3.'</p>';
          }
          echo '</div>';
    
          echo '<div class="mt-1">
                  <p style="color: green;" class="app-nopadding-nomargin app-right-bottom-content">'.$Category_Table[$Category][$value2["Index"]]["Ojective"].'</p>
                </div>';
    
    
          echo '<div class="mt-1 ml-2">';
          if ($value2["Index"] == "") {
            echo '<div style="display: inline-block;">n/a</div>';
          } else {
            if ($value2["Edit-Color"] != "#0") {
              echo '<div class="app-circle" style="margin-right: 10px; display: inline-block; background-color: '.$value2["Edit-Color"].'"> </div>';
            }
            foreach($value2["Color"] as $value3) {
              echo '<label class="app-right-bottom-content" style="display: inline-block;" for="Color"><span style="margin-right: 10px; vertical-align: middle; width: 15px; height: 15px; border: 1px solid black; display: inline-block; background-color:'.$value3.';"></span></label>';
            }
          }
          echo '</div>';
    
          echo '</nav>';
          $Count2++;
        }
      }
      if ($Signlanguageflg == 0) {
        $Count++;
      }
    }
  }