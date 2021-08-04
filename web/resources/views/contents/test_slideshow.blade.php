<div class="slideshow-container">
  <div class="mySlides">
    <q>I love you the more in that I believe you had liked me for my own sake and for nothing else</q>
    <p class="author">- John Keats</p>
  </div>

  <div class="mySlides">
    <q>But man is not made for defeat. A man can be destroyed but not defeated.</q>
    <p class="author">- Ernest Hemingway</p>
  </div>

  <div class="mySlides">
    <q>I have not failed. I've just found 10,000 ways that won't work.</q>
    <p class="author">- Thomas A. Edison</p>
  </div>

  <!-- 左右按鈕 -->
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>
</div>

<!-- 下方按鈕選項 -->
<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>


<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");

      if (n > slides.length) {
        slideIndex = 1;
      }

      if (n < 1) {
        slideIndex = slides.length;
      }
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
  }
</script>

<br><br><br><br>

<div class="circle">

</div>

<div class="s">
    <div class="a"></div>
  </div>

  <div class="div1"><div></div></div>
  <div class="div1 box bg-padding-box"><div></div></div>
  <div class="div1 box border-box"><div></div></div>

  <div class="div2"><div>