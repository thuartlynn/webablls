<?php
  include('/web/resources/views/contents/app_webablls_assessment_category_table.blade.php');
  $Category = substr($TaskInfo["Index"], 0, 1);
?>

<div id="task-infobox">
  <h1 style="color: gray; font-weight: 700; font-family: 'Roboto',sans-serif; font-size: 13pt; text-align: left; margin: 0; padding: 0;"><?php echo $Category_Table[$Category][$TaskInfo["Index"]]["Title"] ?></h1>
  <div style="margin: 10px 0 0 0; padding: 0;">
    <button id="info" data-index="info" class="btn tis-btn-xs btn-secondary" type="button">Info</button>
    <?php
      if (sizeof($TaskInfo["Files"]) == 0) {
        echo '<button id="files" class="app-disappear" data-index="files" class="btn tis-btn-xs btn-secondary" type="button">Files</button>';
      } else {
        echo '<button id="files" data-index="files" class="btn tis-btn-xs btn-secondary" type="button">Files</button>';
      }
    ?>
    <?php
      if (sizeof($TaskInfo["Video"]) == 0) {
        echo '<button id="video" class="app-disappear" data-index="video" class="btn tis-btn-xs btn-secondary" type="button">Video</button>';
      } else {
        echo '<button id="video" data-index="video" class="btn tis-btn-xs btn-secondary" type="button">Video</button>';
      }
    ?>
    <button id="scores" data-index="scores" class="btn tis-btn-xs btn-secondary" type="button">Scores</button>
    <button id="notes" data-index="notes" class="btn tis-btn-xs btn-secondary" type="button">Notes</button>
    <button id="addnote" data-index="addnote" class="btn tis-btn-xs btn-secondary" type="button">Add note</button>
  </div>
  <div id="info-page">
    <p class="dialog_title">Criteria</p>
    <?php
      foreach($Category_Table[$Category][$TaskInfo["Index"]]["Criteria"] as $value) {
        echo '<p class="dialog_content">'.$value.'</p>';
      }
    ?>
    <p class="dialog_title">Obiective</p>
    <?php
      echo '<p class="dialog_content">'.$Category_Table[$Category][$TaskInfo["Index"]]["Ojective"].'</p>';
    ?>
    <p class="dialog_title">Question</p>
    <?php
      echo '<p class="dialog_content">'.$Category_Table[$Category][$TaskInfo["Index"]]["Question"].'</p>';
    ?>
    <?php
      if ($Category_Table[$Category][$TaskInfo["Index"]]["Example"] != "") {
        echo '<p class="dialog_title">Example</p>';
        echo '<p class="dialog_content">'.$Category_Table[$Category][$TaskInfo["Index"]]["Example"].'</p>';
      }
    ?>
  </div>
  <div class="app-disappear" id="files-page" style="margin: 10px 0 0 0; padding: 0;">
    <?php
      foreach($TaskInfo["Files"] as $value) {
        echo '<span class="dialog_content" style="text-decoration: underline;"><a title="Click to download file" href="/Assessment/TaskInfoBox/Download/'.$value["File"].'">'.$value["Name"].'</a></span>';
        echo '<br>';
      }
    ?>
  </div>
  <div class="app-disappear" id="video-page" style="margin: 10px 0 0 0; padding: 0;">
    <?php
      foreach($TaskInfo["Video"] as $value) {
        echo '<iframe width="420" height="315" src="'.$value.'"></iframe>';
      }
    ?>
  </div>
  <div class="app-disappear" id="scores-page" style="margin: 10px 0 0 0; padding: 0;">
    <?php
      foreach($TaskInfo["Scores"] as $value) {
        echo '<label style="display: inline;"><span style="margin-right: 1px; vertical-align: middle; width: 11px; height: 12px; border: 1px solid gray; display: inline-block; background-color:'.$value["Color"].';"></span> <span style="font-weight: 400; font-family: Roboto,sans-serif; font-size: 10pt; text-align: left; vertical-align: middle;">'.$value["Created_time"].'</span></label>';
        echo '<p class="dialog_content">created by '.$value["Created_by"].'</p>';
        if ($value["EditColor"] != "#0") {
          echo '<div style="border-radius: 3px; width: 6px; height: 6px; background-image: none; -moz-border-radius: 3px; -webkit-border-radius: 3px; margin: 0 5px 3px 0; display: inline-block; background-color: '.$value["EditColor"].';"></div>';
        }
        foreach($value["Score"] as $Score) {
          echo '<label style="display: inline;"><span style="margin-right: 5px; vertical-align: middle; width: 15px; height: 15px; border: 1px solid black; display: inline-block; background-color:'.$Score.';"></span></label>';
        }
        if ($value["Score"] == "0") {
          echo '<p class="dialog_content">Task not scored</p>';
        } else {
          echo '<p class="dialog_content">Task scored by '.$value["Scored_by"].' at '.$value["Scored_time"].'</p>';
        }
        echo '<hr>';
      }
    ?>
  </div>
  <div class="app-disappear" id="notes-page" style="margin: 10px 0 0 0; padding: 0;">
    <?php
      if (sizeof($TaskInfo["Notes"]) != 0) {
        foreach($TaskInfo["Notes"] as $value) {
          echo '<div id="note_div_'.$value["Note_index"].'" style="margin-top: 5px;">';

          echo '<div style="border: 1px solid gray; padding: 4px;">';
          echo '<p class="dialog_content"><b>'.$value["Created_by"].'</b> at '.$value["Created_time"].'</p>';
          echo '<pre><p class="note dialog_content">'.$value["Note"].'</p></pre>';
          echo '<button id="Edit_'.$value["Note_index"].'" onclick="clickFunction(this)" class="edit btn tis-btn-xs btn-secondary" style="margin-right: 4px;" type="button">Edit</button>';
          echo '<button id="Remove_'.$value["Note_index"].'" onclick="clickFunction(this)" class="remove btn tis-btn-xs btn-secondary" name="'.$value["Note_index"].'" type="button">Remove</button>';
          echo '</div>';

          echo '<div style="border: 1px solid gray; padding: 4px;" class="app-disappear">';
          echo '<textarea id="Textarea_'.$value["Note_index"].'" style="font-size: 8pt;" class="form-control rounded-0 app-textarea" type="text" oninput="Listener(this, event)" maxlength="500">'.$value["Note"].'</textarea>';
          echo '<button id="Save_'.$value["Note_index"].'" onclick="clickFunction(this)" class="save btn tis-btn-xs btn-secondary" name="'.$value["Note_index"].'" style="margin-right: 4px;" type="button">Save</button>';
          echo '<button onclick="clickFunction(this)" class="cancel btn tis-btn-xs btn-secondary" type="button">Cancel</button>';
          echo '</div>';

          echo '</div>';
        }
      } else {
        echo '<p id="no-note" class="dialog_content">There are no notes.</p>';
      }
    ?>
  </div>
  <div class="app-disappear" id="addnote-page" style="margin: 10px 0 0 0; padding: 0;">
    <div id="none-text">
      <textarea id="notes_value" style="font-size: 8pt;" class="notes form-control rounded-0 app-textarea" type="text" name="Notes" oninput="Listener(this, event)" maxlength="500"></textarea>
      <label class="mr-2 mt-1" style="display: inline-block;" for="IsOpen"><input class="mr-1" style="vertical-align: middle;" type="checkbox" id="IsOpen" name="IsOpen" /><span class="dialog_content" style="vertical-align: middle;">Is Open</span></label>
      <button disabled id="Save" onclick="clickFunction(this)" class="add btn tis-btn-xs btn-secondary mt-1" type="button">Save</button>
      <p class="dialog_content"><b>Tagging notes as Open or Private</b><br>Assessment Notes that correspond with a task can be included in as Assessment Notes document. Tagging notes as <b>Open</b> or <b>Private</b> allows the user to filter notes to be included or excluded in the document for printing, filing, distribution, etc.<br><br><b>Important</b>: ALL assessment notes tagged as either <b>Open</b> or <b>Private</b> can be created, viewed, edited, or deleted by <u>any user with permissions to Edit Assessments and Reports</u> related to a particular student profile.<br><br>The default setting for all Assessment Notes migrated from the WebABLLS Legacy site is <b>Private</b>.</p>
    </div>
  </div>
</div>

<script>

  var Note_Array = <?php echo json_encode($TaskInfo["Notes"]); ?>;
  var str_tmp = "";
  var count = 0;
  var get_count = -1;
  var note_id = 0;
  var index_temp = "#Notes_" + "<?php echo $TaskInfo["Index"]?>";
  var max_note = 20;

  if (Note_Array.length >= max_note) {
    $("#addnote").attr('disabled', 'disabled');
  } else {
    $("#addnote").removeAttr('disabled');
  }

  function Listener(v, event) {
    var notes = document.getElementById(v.id).value;
    var save_id = "#" + v.parentElement.querySelector("button").id;
    if (!notes.trim()) {
      if ($(save_id).attr('disabled') == undefined) {
        $(save_id).attr('disabled', 'disabled');
      }
    } else {
      if ($(save_id).attr('disabled') !== undefined) {
        $(save_id).removeAttr('disabled');
      }
    }
  }

  function clickFunction(v) {
    if (v.classList.contains("edit")) {
      str_tmp = v.parentElement.querySelector(".note").textContent;
      v.parentElement.classList.add("app-disappear");
      v.parentElement.nextElementSibling.classList.remove("app-disappear");
    } else if (v.classList.contains("save")) {
      $.ajax({
        url: "{{url('Assessment/task-box-info/save')}}",
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          'Index': '<?php echo $TaskInfo["Index"] ?>',
          'ass_id': '<?php echo $TaskInfo["ass_id"] ?>',
          'note_id': v.name,
          'note': v.parentElement.querySelector("textarea").value
        }
      }).done(function (data) {
        note_id = v.name;
        Note_Array.forEach(function(key){
          if (key["Note_index"] == note_id) {
            key["Note"] = v.parentElement.querySelector("textarea").value;
          }
        });

        v.parentElement.classList.add("app-disappear");
        v.parentElement.previousElementSibling.classList.remove("app-disappear");
        v.parentElement.previousElementSibling.querySelector(".note").textContent = v.parentElement.querySelector("textarea").value;
      }).fail(function (jqXHR, textStatus, errorThrown) {
      });
    } else if (v.classList.contains("cancel")) {
      v.parentElement.querySelector("textarea").value = str_tmp;
      v.parentElement.classList.add("app-disappear");
      v.parentElement.previousElementSibling.classList.remove("app-disappear");
    } else if (v.classList.contains("remove")) {
      $.ajax({
        url: "{{url('Assessment/task-box-info/remove')}}",
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          'Index': '<?php echo $TaskInfo["Index"] ?>',
          'ass_id': '<?php echo $TaskInfo["ass_id"] ?>',
          'note_id': v.name
        }
      }).done(function (data) {
        count = 0;
        get_count = -1;
        note_id = v.name;
        Note_Array.forEach(function(key){
          if (key["Note_index"] == note_id) {
            get_count = count;
          }
          count++;
        });
        Note_Array.splice(get_count, 1);
        v.parentElement.parentElement.remove();
        if (Note_Array.length == 0) {
          var string = '<p id="no-note" class="dialog_content">There are no notes.</p>';
          var Body = document.getElementById("notes-page");
          Body.innerHTML+=string;
        }
        if (Note_Array.length == 0) {
          if ($(index_temp).hasClass("no")) {
            $(index_temp).removeClass("no");
          }
        } else {
          if (!$(index_temp).hasClass("no")) {
            $(index_temp).addClass("no");
          }
        }
        if (Note_Array.length >= max_note) {
          $("#addnote").attr('disabled', 'disabled');
        } else {
          $("#addnote").removeAttr('disabled');
        }
      }).fail(function (jqXHR, textStatus, errorThrown) {
      });
    } else if (v.classList.contains("add")) {
      $.ajax({
        url: "{{url('Assessment/task-box-info/add')}}",
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          'Index': '<?php echo $TaskInfo["Index"] ?>',
          'ass_id': '<?php echo $TaskInfo["ass_id"] ?>',
          'isopen': $("#IsOpen").prop('checked'),
          'note': v.parentElement.querySelector(".notes").value
        }
      }).done(function (data) {
        // get data here !!
        Note_Array.push(data);

        var string =
        '<div style="margin-top: 5px;">' +
        '<div style="border: 1px solid gray; padding: 4px;">' +
        '<p class="dialog_content"><b>' + data["Created_by"] + '</b> at ' + data["Created_time"] + '</p>' +
        '<p class="note dialog_content">' + data["Note"] + '</p>' +
        '<button id="Edit_' + data["Note_index"] + '" onclick="clickFunction(this)" class="edit btn tis-btn-xs btn-secondary" style="margin-right: 4px;" type="button">Edit</button>' +
        '<button id="Remove_' + data["Note_index"] + '" onclick="clickFunction(this)" class="remove btn tis-btn-xs btn-secondary" name="' + data["Note_index"] + '" type="button">Remove</button>'+
        '</div>'+

        '<div style="border: 1px solid gray; padding: 4px;" class="app-disappear">' +
        '<textarea id="Textarea_' + data["Note_index"] + '" style="font-size: 8pt;" class="form-control rounded-0 app-textarea" type="text" oninput="Listener(this, event)" maxlength="500">' + data["Note"] + '</textarea>' +
        '<button name="' + data["Note_index"] + '" id="Save_' + data["Note_index"] + '" onclick="clickFunction(this)" class="save btn tis-btn-xs btn-secondary" style="margin-right: 4px;" type="button">Save</button>' +
        '<button onclick="clickFunction(this)" class="cancel btn tis-btn-xs btn-secondary" type="button">Cancel</button>' +
        '</div>' +

        '</div>'
        ;

        var Body = document.getElementById("notes-page");
        Body.innerHTML+=string;
        v.parentElement.querySelector(".notes").value = "";
        $("#IsOpen").prop("checked", false);
        $('#addnote-page').addClass("app-disappear");
        $('#notes-page').removeClass("app-disappear");
        if (document.getElementById("no-note")) {
          $("#no-note").remove();
        }
        $('#Save').attr('disabled', 'disabled');

        if (!$(index_temp).hasClass("no")) {
          $(index_temp).addClass("no");
        }

        if (Note_Array.length >= max_note) {
          $("#addnote").attr('disabled', 'disabled');
        } else {
          $("#addnote").removeAttr('disabled');
        }
      }).fail(function (jqXHR, textStatus, errorThrown) {
      });
    }
  }

  $('#info, #files, #video, #scores, #notes, #addnote').click(function() {
    if (Note_Array.length >= max_note && $(this).data("index") == "addnote") {
      return;    
    }
    if (!$('#info-page').hasClass("app-disappear")) {
      $('#info-page').addClass("app-disappear");
    }
    if (!$('#files-page').hasClass("app-disappear")) {
      $('#files-page').addClass("app-disappear");
    }
    if (!$('#video-page').hasClass("app-disappear")) {
      $('#video-page').addClass("app-disappear");
    }
    if (!$('#scores-page').hasClass("app-disappear")) {
      $('#scores-page').addClass("app-disappear");
    }
    if (!$('#notes-page').hasClass("app-disappear")) {
      $('#notes-page').addClass("app-disappear");
    }
    if (!$('#addnote-page').hasClass("app-disappear")) {
      $('#addnote-page').addClass("app-disappear");
    }

    if ($(this).data("index") == "info") {
      $('#info-page').removeClass("app-disappear");
    } else if ($(this).data("index") == "files") {
      $('#files-page').removeClass("app-disappear");
    } else if ($(this).data("index") == "video") {
      $('#video-page').removeClass("app-disappear");
    } else if ($(this).data("index") == "scores") {
      $('#scores-page').removeClass("app-disappear");
    } else if ($(this).data("index") == "notes") {
      $('#notes-page').removeClass("app-disappear");
    } else if ($(this).data("index") == "addnote") {
      $('#addnote-page').removeClass("app-disappear");
    }
  });

  if (!Can_See_Private_Note(<?php echo $TaskInfo->get('Permission') ?>)) {
    var note_div;
    var total = 0, hide_count = 0;
    Note_Array.forEach(function(key){
      total++;
      if (key["IsOpen"] == 0) {
        note_div = "#note_div_" + key["Note_index"];
        $(note_div).addClass("app-disappear");
        hide_count++;
      }

      if (total == hide_count) {
        var string = '<p id="no-note" class="dialog_content">There are no notes.</p>';
        var Body = document.getElementById("notes-page");
        Body.innerHTML+=string;
      }
    });
  }
  if (!Can_Edit("Assessment", <?php echo $TaskInfo->get('Permission') ?>)) {
    $("#addnote").attr('disabled', 'disabled');

    var edit_id = "";
    var remove_id = "";
    Note_Array.forEach(function(key){
      edit_id = "#Edit_" + key["Note_index"];
      remove_id = "#Remove_" + key["Note_index"];
      $(edit_id).attr('disabled', 'disabled');
      $(remove_id).attr('disabled', 'disabled');
    });
  }
</script>