@include('contents.app_webablls_student_list')

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item app-left-pan-point" onclick="TriggerSubmit()">Save Changes</li>
      <li class="nav-item app-left-pan-point" onclick="deleteAssess()">Delete Assessment</li>

      <!--<button class="btn btn-sm text-left app-left-pan pl-0" type="submit" form="addAssess">Save Changes</button>button才接受指定form name
      <button class="btn btn-sm text-left app-left-pan pl-0" onclick="deleteAssess()" >Delete Assessment</button>-->
    </ul>
  </nav>
</div>

<script type="text/javascript">
  
  var AssessmentID = <?php echo $Ass_Detail->get('AssID') ?>;

  function deleteAssess() {
    if ($("#actions").hasClass("app-disable")) {
            $("#actions li").removeAttr("onclick");
    } else {
      answer = confirm("app.webablls.net顯示\nAre you sure you want to delete this assessment? Deleting assessment cannot be undone. Deletion of an assessment also includes deleting all associated data(values and reports).");
      if (answer) {
        var Url = "{{url('/Assessment/delete')}}" + "/" + AssessmentID;
        $.ajax({
          url: Url,
          type:"POST",
          headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
          //data: $("#addAssess").serialize(),
          cache: false
        })
        .done(function (data) {
          location.href="{{url('/Student/ViewSummary/')}}" + "/" + StudentID;})
        .fail(function (jqXHR, textStatus, errorThrown) {
          alert("not success");
        });
      }
    }  
  }

</script>