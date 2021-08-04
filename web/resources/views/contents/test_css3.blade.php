<!-- <div class="testcss3">

    <p>TEST</p>
</div>
<br><br><br>
<div id="google_loading">
   <div></div>
</div> -->

<div class="a"></div>
<div class="b">
  <i class="b1"></i>
  <i class="b2"></i>
  <i class="b3"></i>
</div>

<br><br>

<div id="BorderBox"></div>

<br><br>

<div id="m"></div>

<br><br>

<div class="row ml-2">
  <input type="range" min="0" max="100" step="1" value="50" id="testRange">
</div>

<script>
  var change = function($input) {
    /*內容可自行定義*/
    // console.log("123");
    var input = document.getElementById("testRange");
    console.log(input);
  }

  $('input').RangeSlider({ min: 0,   max: 100,  step: 1,  callback: change});

</script>

<div id="test"></div>