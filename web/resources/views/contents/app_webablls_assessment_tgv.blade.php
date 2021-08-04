<div class="margin-top20", style="margin-top: 20px;">
  <div class="tgv-nav">
    <div class="left ina">&lt;&lt; previous page</div>
    <div class="right">next page &gt;&gt;</div>
  </div>
</div>
<?php
  include('/web/resources/views/contents/app_webablls_assessment_category_table.blade.php');

  $tvgtitle_table = [];
  $color = $AssInfo->get('Color');

  foreach (array_keys($Category_Table) as $temp) {
    $tvgtitle_table[] = $temp;
  }

  $page_total_item = 9;
  $total_page_num = 1;

  if ((sizeof($tvgtitle_table) % $page_total_item) != 0) {
      $total_page_num = (int)(sizeof($tvgtitle_table) / $page_total_item) + 1;
  } else {
      $total_page_num = (int)(sizeof($tvgtitle_table) / $page_total_item);
  }

  if ($page_id == 1) {
    echo '<div class="tgv main">'; // total tvg
  } else {
    echo '<div class="tgv edit">'; // Edit
  }

  for ($page_count = 1; $page_count <= $total_page_num; $page_count++) {
    if ($page_count == 1) {
        echo '<div class="tgv-page" id="tgv-page-'.$page_count.'">';
    } else {
        echo '<div class="tgv-page hidden" id="tgv-page-'.$page_count.'">';
    }

    echo '<div class="h">';
    foreach (range(($page_count-1) * $page_total_item, ($page_count * $page_total_item) - 1) as $number) {
      if ($number >= sizeof($Category_Table)) {
        break;
      }
      echo '<div class="sh">'.$Category_Table[$tvgtitle_table[$number]]["Title2"].'</div>';
    }
    echo '</div>';

    foreach (range(($page_count-1) * $page_total_item, ($page_count * $page_total_item) - 1) as $number) {
      if ($number >= sizeof($Scores)) {
        break;
      }
      echo '<div class="tgv-category" style="margin-right: 3px;">';
      $item_count = 0;
      foreach (($Scores[$number]->reverse()) as $value) {

        $item_temp = sizeof($Scores[$number]) - $item_count;
        $index_temp = $tvgtitle_table[$number].($item_temp);
        if ($value["Select"] == "0") {
          echo '<div class="w" id="task-'.$index_temp.'">';
        } else {
          echo '<div class="w selected" id="task-'.$index_temp.'">';
        }
        if ($value["Notes"] != 0) {
            echo '<div id="Notes_'.$index_temp.'" title= "'.$Category_Table[$tvgtitle_table[$number]][$index_temp]["Title"].'"class="l no">'.$tvgtitle_table[$number].''.$item_temp.'</div>';
        } else {
            echo '<div id="Notes_'.$index_temp.'" title= "'.$Category_Table[$tvgtitle_table[$number]][$index_temp]["Title"].'"class="l">'.$tvgtitle_table[$number].''.$item_temp.'</div>';
        }

        if ($index_temp == "H3" && $AssInfo->get('Signlanguage') == 0) {
          echo '<div style="width: 61px; height: 16px; font-size: 8pt; margin-top: 0px; margin-left: 15px; float: left;">';
          echo 'n/a';
          echo '</div>';
        } else {
          if ($Scores[$number][$item_temp-1]["Edit"] == "#0") {
            if ($page_id == 1) {
                echo '<div class="b"> </div>'; // total tvg
            } else if ($page_id == 2) {
                echo '<div class="b"> </div>'; // Edit, First create
            } else {
                echo '<div class="b bl"> </div>'; // Edit, Other
            }
          } else {
              if ($page_id == 1) {
                echo '<div class="b s" style="background-color: '.$Scores[$number][$item_temp-1]["Edit"].';"> </div>'; // total tvg
              } else if ($page_id == 2) {
                echo '<div class="b se" style="background-color: '.$Scores[$number][$item_temp-1]["Edit"].';"> </div>'; // Edit, First create
              } else {
                echo '<div class="b p bl" style="background-color: '.$Scores[$number][$item_temp-1]["Edit"].';"> </div>'; // Edit, Other
              }
          }

          echo '<div class="r">';
          $select_count = sizeof($Scores[$number][$item_temp-1]["Score"]);
          foreach (array_reverse($Scores[$number][$item_temp-1]["Score"]) as $score) {
            if ($score == $color) {
                break;
            }
            $select_count--;
          }

          if (sizeof($Scores[$number][$item_temp-1]["Score"]) == 4) {
            $border = "q";
          } else if (sizeof($Scores[$number][$item_temp-1]["Score"]) == 2) {
            $border = "d";
          } else {
            $border = "s";
          }

          $score_count = 1;
          foreach ($Scores[$number][$item_temp-1]["Score"] as $score) {
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
        /*if ($Scores[$number][$item_temp-1]["Edit"] == "#0") {
            if ($page_id == 1) {
                echo '<div class="b"> </div>'; // total tvg
            } else if ($page_id == 2) {
                echo '<div class="b"> </div>'; // Edit, First create
            } else {
                echo '<div class="b bl"> </div>'; // Edit, Other
            }
        } else {
            if ($page_id == 1) {
                echo '<div class="b s" style="background-color: '.$Scores[$number][$item_temp-1]["Edit"].';"> </div>'; // total tvg
            } else if ($page_id == 2) {
                echo '<div class="b se" style="background-color: '.$Scores[$number][$item_temp-1]["Edit"].';"> </div>'; // Edit, First create
            } else {
                echo '<div class="b p bl" style="background-color: '.$Scores[$number][$item_temp-1]["Edit"].';"> </div>'; // Edit, Other
            }
        }

        echo '<div class="r">';
        $select_count = sizeof($Scores[$number][$item_temp-1]["Score"]);
        foreach (array_reverse($Scores[$number][$item_temp-1]["Score"]) as $score) {
            if ($score == $color) {
                break;
            }
            $select_count--;
        }

        if (sizeof($Scores[$number][$item_temp-1]["Score"]) == 4) {
            $border = "q";
        } else if (sizeof($Scores[$number][$item_temp-1]["Score"]) == 2) {
            $border = "d";
        } else {
            $border = "s";
        }

        $score_count = 1;
        foreach ($Scores[$number][$item_temp-1]["Score"] as $score) {
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
        echo '</div>';*/
        echo '<div class="c"> </div>';
        echo '</div>';
        $item_count++;
      }
      echo '</div>';
    }

    echo '<div class="h">';
    foreach (range(($page_count-1) * $page_total_item, ($page_count * $page_total_item) - 1) as $number) {
      if ($number == sizeof($tvgtitle_table)) {
        break;
      }
      echo '<div class="sh">'.$Category_Table[$tvgtitle_table[$number]]["Title2"].'</div>';
    }
    echo '</div>';
    echo '</div>';
  }
  echo '</div>';
?>

<div class="tgv-nav">
  <div class="left ina">&lt;&lt; previous page</div>
  <div class="right">next page &gt;&gt;</div>
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
        //$(".ui-dialog-titlebar-close").attr("title", "");
      },
    });
  });
</script>