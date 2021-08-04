<div class="">
  <?php
    $color = array(0=>array("color" =>"#26baa2"),
                   1=>array("color" =>"#8413A1"),
                   2=>array("color" =>"#26baa2"),
                   3=>array("color" =>"#00FF00"),
                   4=>array("color" =>"#FF0C00"),
                   5=>array("color" =>"#8413A1"),
                   6=>array("color" =>"#26baa2"),
                   7=>array("color" =>"#26baa2"),
                   8=>array("color" =>"#FF0C00"),
                   9=>array("color" =>"#00FFFB"),
                   10=>array("color" =>"#8413A1"),
                   11=>array("color" =>"#FAF411"),
                   12=>array("color" =>"#00FF00"),
    );
  ?>

  <?php
    $usingcolor = array(0=>array("color" =>"#26baa2"),
                   1=>array("color" =>"#8413A1"),
                   2=>array("color" =>"#00FF00"),
                   3=>array("color" =>"#FF0C00"),
                   4=>array("color" =>"#00FFFB"),
                   5=>array("color" =>"#FAF411"),
                   6=>array("color" =>"#FF008B"),        
    );
  ?>
  <div id="myBtnContainer">
    <button class="btn active" onclick="filterSelection('all')"> Show all</button>
    <?php foreach ($usingcolor as $value) {
      echo '<button class="btn" onclick="filterSelection(\''.$value['color'].'\')"> '.$value['color'].' </button>';

    } ?>
  </div>

  <table id="colorTable" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th>color</th>
        <th>another subject</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($color as $value) {
          echo '<tr class="container"><td class="filterDiv '.$value['color'].'">';
          echo '<div class="mark" style="background-color:'.$value['color'].';"></div></td>';
          echo '<td class="filterDiv '.$value['color'].'">2</td>';
          echo '</tr>';
        }
      ?>
      </div>
    </tbody>
  </table>
</div>

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>