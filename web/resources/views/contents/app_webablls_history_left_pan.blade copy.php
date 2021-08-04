<!--$History = array("01/2019","04/2019");
?> -->

@include('contents.app_webablls_student_list')

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>History</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item app-left-pan-point mb-n3" id="all">All</li>
    </ul>

    <ul id="History" class="navbar-nav app-left-pan-list-mr-pd">
      <?php
        foreach($History as $value) {
            echo '<li class="nav-item app-left-pan-point" >'.$value.'</li>';
        }
      ?>
      
      <input class="search hide" id="History_hide" type="search" data-column="4" autocomplete="off" />
    </ul>
  </nav>
</div>

<script>    
  
  $(function () {
    $("table#historyTable td.date").each(function () {
      var array = $(this).text();
      var vals = array.split('/');

      if ( <?php echo Auth::user()->date_format?> == 0 ) {
        var valsNew = vals[2] + "/" + vals[0];
      } else {
        var valsNew = vals[2] + "/" + vals[1];
      }
      $(this).parent().find('.hide_date').html(valsNew);
    });

    var History_hide = document.getElementById("History_hide");
    $("#all").click(function(){
      History_hide.value = "";
      History_hide.dispatchEvent(new Event('change'));
    });
    $("#History li").click(function(){
      var history = $(this).text();
      var vals = history.split('/');
      var valsNew = vals[1] + "/" + vals[0];    
      History_hide.value = valsNew;

      History_hide.dispatchEvent(new Event('change'));
    });
  });

</script>
