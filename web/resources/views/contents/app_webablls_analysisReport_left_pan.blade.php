@include('contents.app_webablls_student_list')

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item" data-path="/Student/AddAnalysis/">Change Analysis Options</li>
    </ul>
  </nav>
</div>

<script type="text/javascript">
  $(function () {
    $("#actions li").click(function(e) {
        // var selectSID = echo ''.$Student["ID"].'';
        location.href=$(this).data("path") ; //+ selectSID
    });
  });
</script>
