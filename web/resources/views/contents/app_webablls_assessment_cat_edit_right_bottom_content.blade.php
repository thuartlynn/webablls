<h1 class="app-right-bottom-h1 app-right-bottom-h1-mr"><?php echo $Category_Table[$Filter]["Title2"]?></h1>

<div class="tgv edit mt-2">
  <div class="tgv-category">
      <?php
        $tvgtitle_table = [];

        $item_count = 0;
        foreach($Scores as $value) {
          $item_temp = $item_count + 1;
          $index_temp = $Filter.($item_temp);

          echo '<div class="w" id="task-'.$index_temp.'">';

          if ($index_temp == "H3" && $AssInfo->get('Signlanguage') == 0) {
            if ($value["Notes"] != 0) {
              echo '<div style="cursor: default !important;" title= "'.$Category_Table[$Filter][$index_temp]["Title"].'"class="l no">'.$Filter.''.$item_temp.'</div>';
            } else {
              echo '<div style="cursor: default !important;" title= "'.$Category_Table[$Filter][$index_temp]["Title"].'"class="l">'.$Filter.''.$item_temp.'</div>';
            }
            echo '<div style="width: 121px; height: 30px; font-size: 8pt; margin-top: 0px; margin-left: 15px; float: left;">';
            echo '<p style="margin-left: 6px; margin-top: 6px;">n/a</p>';
            echo '</div>';
          } else {
            if ($value["Notes"] != 0) {
              echo '<div id="Notes_'.$index_temp.'" title= "'.$Category_Table[$Filter][$index_temp]["Title"].'"class="l no">'.$Filter.''.$item_temp.'</div>';
            } else {
              echo '<div id="Notes_'.$index_temp.'" title= "'.$Category_Table[$Filter][$index_temp]["Title"].'"class="l">'.$Filter.''.$item_temp.'</div>';
            }
            if ($value["Edit"] == "#0") {
              if ($page_id == 2) {
                  echo '<div class="b"> </div>'; // Edit, First create
              } else {
                  echo '<div class="b bl"> </div>'; // Edit, Other
              }
            } else {
              if ($page_id == 2) {
                  echo '<div class="b se" style="background-color: '.$value["Edit"].';"> </div>'; // Edit, First create
              } else {
                  echo '<div class="b p bl" style="background-color: '.$value["Edit"].';"> </div>'; // Edit, Other
              }
            }
  
            echo '<div class="r">';
            $select_count = sizeof($value["Score"]);
            foreach (array_reverse($value["Score"]) as $score) {
                if ($score == $color) {
                    break;
                }
                $select_count--;
            }
    
            if (sizeof($value["Score"]) == 4) {
                $border = "q";
            } else if (sizeof($value["Score"]) == 2) {
                $border = "d";
            } else {
                $border = "s";
            }
    
            $score_count = 1;
            foreach ($value["Score"] as $score) {
                if ($score == $color && $score_count == $select_count) {
                    echo '<div class="i se '.$border.'" style="background-color: '.$score.'"> </div>';
                } else if ($score == $color) {
                    echo '<div class="i '.$border.'" style="background-color: '.$score.'"> </div>';
                } else if ($score != "#0") {
                    echo '<div class="i p '.$border.'" style="background-color: '.$score.'"> </div>';
                } else {
                    echo '<div class="i '.$border.'"> </div>';
                }
                $score_count++;
            }
  
            echo '</div>';
          }
          echo '</div>';
          $item_count++;
        }
      ?>
  </div>
</div>

<script>
  var color = "<?php echo $color?>";
  var changes = false;
  var edit_flag = true;
  var time = "";

  function cancel() {
    window.location.reload();
  }

  $().save({
    saveCallback: save,
    cancelCallback: cancel,
    Warnign: 'There are unsaved changes. Be sure to save them before you leave this page. All unsaved changes will be lost.',
    Save: 'Save',
    Cancel: 'Cancel',
    Confirm: 'Changes have been saved'
  });

  function save() {
    if (!changes) return;
    actual_save();
  }
    
  $(".w .l").on("click", function () {
    var code = $(this).html().toString();
    if (code == "H3" && <?php echo $AssInfo->get('Signlanguage') ?> == 0)
      return;
    $(this).addClass("taskpopupMarker");
    var Url = "/Assessment/TgvGridEdit/" + <?php echo $AssInfo->get('AssID') ?> + "/" + code;
    $.ajax({
      type: 'GET',
      cache: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: Url,
      success: function (data) {
        $("body").append(data);
        $("#task-infobox").dialog({
          width: 600,
          height: 500,
          maxHeight: 1000,
          modal: true,
          close: function () {
            $("#task-infobox").remove();
            $(".taskpopupMarker").removeClass("taskpopupMarker");
          },
          overlay: {
            opacity: 0.5,
            background: "black"
          },
          draggable: false,
          resizable: false,
          title: "Task Info Box"
        });
      },
    });
  });
</script>