<div class="parallax"></div>

<div style="background-color:#DBEDF9;font-size:3.2rem;">
  Scroll Up and Down this page to see the parallax scrolling effect.
  This div is just here to enable scrolling.
  Tip: Try to remove the background-attachment property to remove the scrolling effect.
</div>

<div class="parallax"></div>

<div style="background-color:#F8CD84;">
  <div id="myDIV">
    <button class="btn">1</button>
    <button class="btn active">2</button>
    <button class="btn">3</button>
    <button class="btn">4</button>
    <button class="btn">5</button>
  </div>

  <div>
    <button class="btn2">Hover Over Me</button>
  </div>

  <script>

    // Add active class to the current button (highlight it)
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("btn");
      for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace("active", "");
        this.className += " active";
        });
      }
  </script>
</div>

<div class="parallax"></div>

<div class="container">
  <div class="battery"></div>
</div>
