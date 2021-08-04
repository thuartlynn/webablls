<div class="">
  <hr>  
  <?php echo '<p>Student Age (years):<br> '.$Ass_Detail->get('Student_Age').' </p>';
  ?>
  
    <form action="/Assessment/DetailsEdit/<?php echo $Ass_Detail->get('AssID'); ?>" method="post" id="addAssess" role="form" class="app-inline needs-validation" novalidate autocomplete="off">{{ csrf_field() }}

      <div class="app-right-bottom-mr">
        <?php
          if (Auth::user()->date_format == 0) {
            echo '<label class="app-right-bottom-title" for="datepicker">Assessment Date (MM/DD/YYYY) *</label>';
          } else {
            echo '<label class="app-right-bottom-title" for="datepicker">Assessment Date (DD/MM/YYYY) *</label>';
          }
        ?>
          <input id="datepicker" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="assessDate" type="text" value="<?php echo $Ass_Detail->get("Assessment_Date")?>" required />
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      <div class="app-right-bottom-mr">
        <label class="app-right-bottom-title" for="GradeLevel">Grade Level</label>
        <select id="GradeLevel_id" name="GradeLevel" class="border app-option-font app-right-bottom-content-mr" style="width: auto;">
        <option value="0">N/A</option>
          <option value="1">Pre-School</option>
          <option value="2">Kindergarten</option>
          <option value="3">1st Grade</option>
          <option value="4">2nd Grade</option>
          <option value="5">3rd Grade</option>
          <option value="6">4th Grade</option>
          <option value="7">5th Grade</option>
          <option value="8">6th Grade</option>
          <option value="9">7th Grade</option>
          <option value="10">8th Grade</option>
          <option value="11">9th Grade</option>
          <option value="12">10th Grade</option>
          <option value="13">11th Grade</option>
          <option value="14">12th Grade</option>
          <option value="15">Adult Education</option>
        </select>
      </div>

      <br>

      <div class="app-right-bottom-mr">
        <ul class="nav nav-tabs p-0" role="tablist" >
          <li class="nav-item ">
            Palette 1
          </li>

          <!-- <li class="nav-item ">
            <a class="nav-link " data-toggle="tab" href="#palette2">Palette 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#palette3">Palette 3</a>
          </li> -->
        </ul>

      <div class="tab-content p-3">
        <div id="palette1" class="container tab-pane p-0 mt-n4 active"><br>
          <?php
          
            
            $colorpalette = array("#000000", "#444444", "#666666", "#999999", "#cccccc", "#eeeeee", "#f3f3f3", "#ffffff", "#ff0000", "#ff9900", "#ffff00", "#00ff00", "#00ffff", "#0000ff", "#9900ff", "#ff00ff", 
                                  "#fc4444", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc", "#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd", 
                                  "#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0", "#cc0000", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79", 
                                  "#990000", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47", "#660000", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130");

            $UsedColor = $Ass_Detail->get("Used_Color");
            $editcolor = array($Ass_Detail->get("Color"));
            $editcolor2 = implode($editcolor);
            
            echo "<div class='test'>";
              for($i=0; $i<=7; $i++){
                if ($UsedColor->contains($colorpalette[$i])) {
                  echo "<label class='usedlable' style='background-color:$colorpalette[$i];'><label class='colorpalette3'></label></label>";
                } else if (in_array($colorpalette[$i], $editcolor)) {
                  echo "<input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' checked='true' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                } else {
                  echo "
                        <input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                }
              }
            echo "<br>";

              for($i=8; $i<=15; $i++){
                if ($UsedColor->contains($colorpalette[$i])) {
                  echo "<label class='usedlable' style='background-color:$colorpalette[$i];'><label class='colorpalette3'></label></label>";
                } else if (in_array($colorpalette[$i], $editcolor)) {
                  echo "<input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' checked='true' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                } else {
                  echo "
                        <input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                }
              }
            echo "<br>";

              for($i=16; $i<=23; $i++){
                if ($UsedColor->contains($colorpalette[$i])) {
                  echo "<label class='usedlable' style='background-color:$colorpalette[$i];'><label class='colorpalette3'></label></label>";
                } else if (in_array($colorpalette[$i], $editcolor)) {
                  echo "<input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' checked='true' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                } else {
                  echo "
                        <input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                }
              }
            echo "<br>";

              for($i=24; $i<=31; $i++){
                if ($UsedColor->contains($colorpalette[$i])) {
                  echo "<label class='usedlable' style='background-color:$colorpalette[$i];'><label class='colorpalette3'></label></label>";
                } else if (in_array($colorpalette[$i], $editcolor)) {
                  echo "<input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' checked='true' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                } else {
                  echo "
                        <input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                }
              }
            echo "<br>";

              for($i=32; $i<=39; $i++){
                if ($UsedColor->contains($colorpalette[$i])) {
                  echo "<label class='usedlable' style='background-color:$colorpalette[$i];'><label class='colorpalette3'></label></label>";
                } else if (in_array($colorpalette[$i], $editcolor)) {
                  echo "<input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' checked='true' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                } else {
                  echo "
                        <input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                }
              }
            echo "<br>";

              for($i=40; $i<=47; $i++){
                if ($UsedColor->contains($colorpalette[$i])) {
                  echo "<label class='usedlable' style='background-color:$colorpalette[$i];'><label class='colorpalette3'></label></label>";
                } else if (in_array($colorpalette[$i], $editcolor)) {
                  echo "<input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' checked='true' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                } else {
                  echo "
                        <input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                }
              }
            echo "<br>";

              for($i=48; $i<=55; $i++){
                if ($UsedColor->contains($colorpalette[$i])) {
                  echo "<label class='usedlable' style='background-color:$colorpalette[$i];'><label class='colorpalette3'></label></label>";
                } else if (in_array($colorpalette[$i], $editcolor)) {
                  echo "<input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' checked='true' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                } else {
                  echo "
                        <input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                }
              }
            echo "<br>";

              for($i=56; $i<=63; $i++){
                if ($UsedColor->contains($colorpalette[$i])) {
                  echo "<label class='usedlable' style='background-color:$colorpalette[$i];'><label class='colorpalette3'></label></label>";
                } else if (in_array($colorpalette[$i], $editcolor)) {
                  echo "<input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' checked='true' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                } else {
                  echo "
                        <input type='radio' id='color$i' class='hide' name='color' value='$colorpalette[$i]' onclick='chooseColor(this)' />
                        <label for='color$i' class='app-left-pan-point' style='background-color:$colorpalette[$i];'></label>";
                }
              }
            echo "<br>";

            echo "</div>";

          ?>

          <input type='radio' class='hide form-check-input' name='color' value='' required /><!--Important 為了檢查color有否選到-->

          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Color field is required.</div>
        </div>
        
      </div>

      <script>
        function chooseColor(x) {
          var y = x.value;
          // console.log(y);
          $("#text").html(y);
          $("#chooseColor").addClass("colorpalette");
          $("#chooseColor").css("background-color",y);  
        }
      </script>
        <div>
          <p>Chosed Color</p>
            <?php 
              if ( $editcolor2 !== null ) {
                echo "<div class='colorpalette' style='background-color:$editcolor2;' id='chooseColor'></div>
                      <p id='text' class='d-inline-block'>$editcolor2</p>";
              } else {
                echo "";
              }
            ?>
          <p>Used Colors</p>
            <?php
                foreach($Ass_Detail->get('Used_Color') as $value) {
                  echo '<label class="app-right-bottom-content" style="display: inline-block;" for="Color"><span style="margin-right: 10px; vertical-align: middle; width: 20px; height: 20px; border: 1px solid black; display: inline-block; background-color:'.$value.'";></span></label>';
                }
            ?>
        </div>
        
      </div>
      </div>

      <div class="app-right-bottom-mr">
        <label class="app-right-bottom-title" for="Notes">Notes</label>
        <textarea name="Notes" rows="4" style="border: 1px solid #D2D2D2; width: 95%;"><?php echo $Ass_Detail->get("Note"); ?></textarea>
      </div>

      <hr>
      <h5 class="app-nopadding-nomargin mt-2 text-secondary">Program Level During the Time of Assessment</h5>
      <br>

      <div class="col-lg-12 row">
        <div class="col-lg m-1">
          <label for="program_level_1" class="text-0_75rem">Program Level:</label><br>
            <select name="program_level_1" id="program_level_1" class="custom-select app-option-font app-right-bottom-content-mr form-inline" >
              <option value="0">None</option>
              <option value="1">Other</option>
              <option value="2">In-Home School</option>
              <option value="3">Public School</option>
              <option value="4">Private School</option>
              <option value="5">Special Education</option>
              <option value="6">Intergrated for Peers</option>
              <option value="7">Speech Therapy</option>
              <option value="8">OT</option>
              <option value="9">PT</option>
              <option value="10">Self-contained classroom</option>
              <option value="11">Intergrated classroom</option>
            </select>
        </div>

        <div class="col-lg m-1">
          <label for="other_1" class="text-0_75rem ">If "Other", please specify</label><br>
            <input name="other_1" id="other_1" type="text" class="border mt-n1 form-inline" />
        </div>

        <div class="col-lg m-1">
          <label for="average_hours_1" class="text-0_75rem">Average Hours in Program Per Week</label><br>
            <select name="average_hours_1" id="average_hours_1" class="custom-select app-option-font app-right-bottom-content-mr form-inline" >
              <option value="0">Choose one</option>
              <option value="1">0-5</option>
              <option value="2">5-10</option>
              <option value="3">10-15</option>
              <option value="4">15-20</option>
              <option value="5">20-25</option>
              <option value="6">25-30</option>
              <option value="7">30-35</option>
              <option value="8">35-40</option>
            </select>
        </div>
      </div>
      <br>
      <div class="col-lg-12 row">
        <div class="col-lg m-1">
          <label for="program_level_2" class="text-0_75rem">Program Level:</label><br>
            <select name="program_level_2" id="program_level_2" class="custom-select app-option-font app-right-bottom-content-mr form-inline">
              <option value="0">None</option>
              <option value="1">Other</option>
              <option value="2">In-Home School</option>
              <option value="3">Public School</option>
              <option value="4">Private School</option>
              <option value="5">Special Education</option>
              <option value="6">Intergrated for Peers</option>
              <option value="7">Speech Therapy</option>
              <option value="8">OT</option>
              <option value="9">PT</option>
              <option value="10">Self-contained classroom</option>
              <option value="11">Intergrated classroom</option>
            </select>
        </div>

        <div class="col-lg m-1">
          <label for="other_2" class="text-0_75rem">If "Other", please specify</label><br>
            <input name="other_2" id="other_2" type="text" class="border mt-n1 form-inline" />
        </div>

        <div class="col-lg m-1">
          <label for="average_hours_2" class="text-0_75rem">Average Hours in Program Per Week</label><br>
            <select name="average_hours_2" id="average_hours_2" class="custom-select app-option-font app-right-bottom-content-mr form-inline">
              <option value="0">Choose one</option>
              <option value="1">0-5</option>
              <option value="2">5-10</option>
              <option value="3">10-15</option>
              <option value="4">15-20</option>
              <option value="5">20-25</option>
              <option value="6">25-30</option>
              <option value="7">30-35</option>
              <option value="8">35-40</option>
            </select>
        </div>
      </div>
      <br>
      <div class="col-lg-12 row">
        <div class="col-lg m-1">
          <label for="program_level_3" class="text-0_75rem">Program Level:</label><br>
            <select name="program_level_3" id="program_level_3" class="custom-select app-option-font app-right-bottom-content-mr form-inline">
              <option value="0">None</option>
              <option value="1">Other</option>
              <option value="2">In-Home School</option>
              <option value="3">Public School</option>
              <option value="4">Private School</option>
              <option value="5">Special Education</option>
              <option value="6">Intergrated for Peers</option>
              <option value="7">Speech Therapy</option>
              <option value="8">OT</option>
              <option value="9">PT</option>
              <option value="10">Self-contained classroom</option>
              <option value="11">Intergrated classroom</option>
            </select>
        </div>

        <div class="col-lg m-1">
          <label for="other_3" class="text-0_75rem">If "Other", please specify</label><br>
            <input name="other_3" id="other_3" type="text" class="border mt-n1 form-inline" />
        </div>

        <div class="col-lg m-1">
          <label for="average_hours_3" class="text-0_75rem">Average Hours in Program Per Week</label><br>
            <select name="average_hours_3" id="average_hours_3" class="custom-select app-option-font app-right-bottom-content-mr form-inline">
              <option value="0">Choose one</option>
              <option value="1">0-5</option>
              <option value="2">5-10</option>
              <option value="3">10-15</option>
              <option value="4">15-20</option>
              <option value="5">20-25</option>
              <option value="6">25-30</option>
              <option value="7">30-35</option>
              <option value="8">35-40</option>
            </select>
        </div>
      </div>
      <br>
      <div class="col-lg-12 row">
        <div class="col-lg m-1">
          <label for="program_level_4" class="text-0_75rem">Program Level:</label><br>
            <select name="program_level_4" id="program_level_4" class="custom-select app-option-font app-right-bottom-content-mr form-inline">
              <option value="0">None</option>
              <option value="1">Other</option>
              <option value="2">In-Home School</option>
              <option value="3">Public School</option>
              <option value="4">Private School</option>
              <option value="5">Special Education</option>
              <option value="6">Intergrated for Peers</option>
              <option value="7">Speech Therapy</option>
              <option value="8">OT</option>
              <option value="9">PT</option>
              <option value="10">Self-contained classroom</option>
              <option value="11">Intergrated classroom</option>
            </select>
        </div>

        <div class="col-lg m-1">
          <label for="other_4" class="text-0_75rem">If "Other", please specify</label><br>
            <input name="other_4" id="other_4" type="text" class="border mt-n1 form-inline" />
        </div>

        <div class="col-lg m-1">
          <label for="average_hours_4" class="text-0_75rem">Average Hours in Program Per Week</label><br>
            <select name="average_hours_4" id="average_hours_4" class="custom-select app-option-font app-right-bottom-content-mr form-inline">
              <option value="0">Choose one</option>
              <option value="1">0-5</option>
              <option value="2">5-10</option>
              <option value="3">10-15</option>
              <option value="4">15-20</option>
              <option value="5">20-25</option>
              <option value="6">25-30</option>
              <option value="7">30-35</option>
              <option value="8">35-40</option>
            </select>
        </div>
      </div>
      <br>
      <div class="col-lg-12 row">
        <div class="col-lg m-1">
          <label for="program_level_5" class="text-0_75rem">Program Level:</label><br>
            <select name="program_level_5" id="program_level_5" class="custom-select app-option-font app-right-bottom-content-mr form-inline">
              <option value="0">None</option>
              <option value="1">Other</option>
              <option value="2">In-Home School</option>
              <option value="3">Public School</option>
              <option value="4">Private School</option>
              <option value="5">Special Education</option>
              <option value="6">Intergrated for Peers</option>
              <option value="7">Speech Therapy</option>
              <option value="8">OT</option>
              <option value="9">PT</option>
              <option value="10">Self-contained classroom</option>
              <option value="11">Intergrated classroom</option>
            </select>
        </div>

        <div class="col-lg m-1">
          <label for="other_5" class="text-0_75rem">If "Other", please specify</label><br>
            <input name="other_5" id="other_5" type="text" class="border mt-n1 form-inline" />
        </div>

        <div class="col-lg m-1">
          <label for="average_hours_5" class="text-0_75rem">Average Hours in Program Per Week</label><br>
            <select name="average_hours_5" id="average_hours_5" class="custom-select app-option-font app-right-bottom-content-mr form-inline">
              <option value="0">Choose one</option>
              <option value="1">0-5</option>
              <option value="2">5-10</option>
              <option value="3">10-15</option>
              <option value="4">15-20</option>
              <option value="5">20-25</option>
              <option value="6">25-30</option>
              <option value="7">30-35</option>
              <option value="8">35-40</option>
            </select>
        </div>
      </div>
      <br>

      <div>
        <table class="sharePermission">
          <tbody>
            <tr><th>Scoring Personnel</th></tr>
            <tr><td><?php echo $Ass_Detail->get('User'); ?></td></tr>
          </tbody>
        </table>
      </div>

      <input type="submit" value="Save Changes" class="btn btn-sm btn-secondary app-right-bottom-mr" id="addAssess_submit" />

    </form>
</div>