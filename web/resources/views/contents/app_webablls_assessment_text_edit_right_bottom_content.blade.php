<h1 class="app-right-bottom-h1 mt-2 mb-2" style="margin:0;"><?php echo $Category_Table[$Filter]["Title2"]?></h1>

<?php
  $Count = 0;
  foreach($Scores as $value) {
    if ($Count%2 == 0) {
      echo '<nav style="background-color:#e1e5e7; padding: 10px 0 10px 10px;">';
    } else {
      echo '<nav style="background-color:#d3d3d3; padding: 10px 0 10px 10px;">';
    }
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-2 align-self-center">';
    echo '<div class="tgv edit">';
    echo '<div class="tgv-category">';
    $index_temp = $Filter.($Count+1);
    echo '<div class="w" id="task-'.$index_temp.'">';

    if ($index_temp == "H3" && $AssInfo->get('Signlanguage') == 0) {
      //echo '<div style="width: 85px; height: 15px; font-size: 8pt; margin: 0px; float: left;">';
      //echo '<p style="margin-left: 6px; margin-top: 6px;">n/a</p>';
      //echo '</div>';
    } else {
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
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="col-md-10">';
    if ($index_temp == "H3" && $AssInfo->get('Signlanguage') == 0) {
      echo '<div>';
      echo '<span data-index="'.$index_temp.'" class="box app-nopadding-nomargin app-right-bottom-content" style="word-wrap:break-word; word-break:normal;">'.$Category_Table[$Filter][$index_temp]["Title"].'</span>';
      echo '</div>';
      echo '<div class="mt-1">';
      echo '<p class="app-nopadding-nomargin app-right-bottom-content" style="word-wrap:break-word; word-break:normal;">Not available</p>';
      echo '</div>';
    } else {
      echo '<div>';
      echo '<span data-index="'.$index_temp.'" class="box app-nopadding-nomargin app-right-bottom-content" style="cursor: pointer; word-wrap:break-word; word-break:normal;">'.$Category_Table[$Filter][$index_temp]["Title"].'</span>';
      echo '</div>';
      echo '<div class="mt-1">';
      echo '<p class="app-nopadding-nomargin app-right-bottom-content" style="word-wrap:break-word; word-break:normal;">'.$Category_Table[$Filter][$index_temp]["Ojective"].'</p>';
      echo '</div>';
      echo '<div class="mt-1">';
      foreach($Category_Table[$Filter][$index_temp]["Criteria"] as $Criteria) {
        echo '<p class="app-nopadding-nomargin app-right-bottom-content" style="word-wrap:break-word; word-break:normal;">'.$Criteria.'</p>';
      }
      echo '</div>';
      echo '<div class="mt-1">';
      echo '<p class="app-nopadding-nomargin app-right-bottom-content" style="color:green; word-wrap:break-word; word-break:normal;">'.$Category_Table[$Filter][$index_temp]["Question"].'</p>';
      echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</nav>';
    $Count++;
  }
?>

<?php
// For Test
//include('/web/resources/views/contents/app_webablls_assessment_task_infobox.blade.php');
// For Test
?>

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

  $(".box").on("click", function () {
    var code = $(this).data("index");
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