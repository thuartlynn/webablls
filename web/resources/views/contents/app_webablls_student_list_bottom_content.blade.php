
<div class="">

  <?php
    if (Auth::user()->layout_format == 0) {
      echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
      echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Student Filters</span>';
    } else {
      echo '<div class="app-left-pan" style="margin-top: 5px;">';
      echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student Filters</span>';
    }

  ?>
    <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
      <ul class="app-left-pan-list-mr-pd">
        <div class="nav-item">
          <div class="aligned">
            <span>Age (years)from:</span>
            <input type="text" class="short" id="ageFrom" oninput="CheckAge()" onkeyup="this.value=this.value.replace(/\D/g,'')" autocomplete=off />
            <span>to:</span>
            <input type="text" class="short" id="ageTo" oninput="CheckAge()" onkeyup="this.value=this.value.replace(/\D/g,'')" autocomplete=off />
            <span id="registered"></span>
          </div>

          <div class="aligned mt-2">
            <label for="male">
            <input type="checkbox" id="male" />Show only male</label>
            <label for="female">
            <input type="checkbox" id="female" class="ml-2" />Show only female</label>
          </div>

          <!-- <div class="aligned">
            <label for="org_all">
            <input name="org" id="org_all" type="radio" checked="checked" autocomplete="off" />Show all students</label>
            <label for="org_my">
            <input name="org" id="org_my" type="radio" class="ml-2" autocomplete="off" />Show only students from my organization</label>
            <label for="org_other">
            <input name="org" id="org_other" type="radio" class="ml-2" autocomplete="off" />Show only students from other organizations</label>
          </div> -->

          <div class="aligned">
            <label for="role_all">
            <input name="role" id="role_all" type="radio" checked="checked" autocomplete="off" />Show all students</label>
            <label for="role_oc">
            <input name="role" id="role_oc" type="radio" class="ml-2" autocomplete="off" />Show only assigned students (owner,coordinator)</label>
            <label for="role_s">
            <input name="role" id="role_s" type="radio" class="ml-2" autocomplete="off" />Show only shared students</label>
          </div>

          <label for="" class="mt-2">Name or ID:</label>
          <input type="text" class="search" data-column="0-1" autocomplete=off />
 
          <label for="">City:</label>
          <input type="text" class="search" data-column="6" autocomplete=off />
          <div class="aligned">
            <input class="search hide" id="Age_ID_hide" type="search" value="" data-column="8" autocomplete="off" />
            <input class="search hide" id="M_or_F_ID_hide" type="search" value="" data-column="9" autocomplete="off" />
            <!-- <input class="search hide" id="My_or_Other_ID_hide" type="search" value="" data-column="7" autocomplete="off" /> -->
            <input class="search hide" id="OC_or_S_ID_hide" type="search" value="" data-column="10" autocomplete="off"/>
          </div>
        </div>
      </ul>
    </nav>
  </div>  
</div>

<div class="">
  <?php
    if ($Students->count() > 50) {
      echo '<div class="pager app-nopadding-nomargin">
              <div style="float: left;" class="prev pager-button"><< previous page</div>
              <div style="float: right;" class="next pager-button">next page >></div>
            </div>';
    }
  ?>

  <table id="UserTable" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Permissions</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Create Date</th>
        <th>City</th>
        <th class="hide">SameOrg</th>
        <th class="hide">Age隱藏</th>
        <th class="hide">Gender隱藏</th>
        <th class="hide">Role隱藏</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $url_profile = url('/Student/ViewProfile/');
        $url_summary = url('/Student/ViewSummary/');
        $temp = "";
        foreach($Students as $k => $value) {
          $temp = str_replace("\"","",$value["Permission"]);
          $temp = str_replace("[","",$temp);
          $temp = str_replace("]","",$temp);

            echo '<tr data-table-row-id="'.$value['ID'].'" data-table-row-per="'.$temp.'" data-table-row-assess="'.$value['HasAssessment'].'">';
              echo '<td>';
                echo '<span class="addcontent" id="ID_'.$k.'" data-index="View Profile" data-display="'.$value["ID"].'" data-path="'.$url_profile.'/'.$value["ID"].'"></span>';
              echo '</td>';
        
              echo '<td>';
                echo '<span class="addcontent" id="STUDENT_'.$k.'" data-index="View Summary" data-display="'.$value["Name"].'" data-path="'.$url_summary.'/'.$value["ID"].'"></span>';
              echo '</td>';
              // echo '<td>';
              //   echo '<script type="text/javascript">
              //           if (Check_Permission("View Profile", '.$value["Permission"].')) {
              //             document.write("<a title=\"Click to see student profile\" class=\"webablls_href\" href='.$url_profile.'/'.$value["ID"].'>'.$value["ID"].'</a>");
              //           } else {
              //             document.write("'.$value["ID"].'");
              //           }
              //         </script>';
              // echo '</td>';

              // echo '<td>';
              //   echo '<script type="text/javascript">
              //           if (Check_Permission("View Summary", '.$value["Permission"].')) {
              //             document.write("<a title=\"Click to see student summary\" class=\"webablls_href\" href='.$url_summary.'/'.$value["ID"].'>'.$value["Name"].'</a>");
              //           } else {
              //             document.write("'.$value["Name"].'");
              //           }
              //         </script>';
              // echo '</td>';

              echo '<td class="roles">';
                foreach($value["Permission"] as $Permissions) {
                  echo '<span class="app-table-span-with-background-color">'.$Permissions.'</span>';
                }
              echo '</td>';
              echo '<td>';
                if ($value["Gender"] == "M") {
                  echo 'Male';
                } else {
                  echo 'Female';
                }
              echo "</td>";
              echo '<td class="age">';
                echo  $value["DOB"];
              echo "</td>";
              echo "<td>";
                echo $value["CreateDate"];
              echo "</td>";
              echo "<td>";
                echo $value["Location"];
              echo "</td>";
              echo "<td style=display:none>";
                echo $value["SameOrg"];
              echo "</td>";
              echo '<td class="hide_age hide">';
                echo "";
              echo "</td>";
              echo '<td class="hide">';
                if ($value["Gender"] == "M") {
                  echo '1';
                } else {
                  echo '0';
                }
              echo "</td>";
              echo '<td class="hide">';
                if (strpos($value["Permission"], 'O') !== false) {
                  echo '1';
                } else {
                  echo '0';
                }
              echo "</td>";
            echo "</tr>";
        }
      ?>
    </tbody>
  </table>
</div>



@if (count($Students) === 1)
    有一筆資料!
@elseif (count($Students) > 1)
  <table id="test" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Permissions</th>
        <th>Gender</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($Students as $value)
      <!-- Student 的 id 為 {{ $value['ID'] }} -->
          <tr>
            <td>{{ $value['ID'] }}
            </td>
            <td>{{ $value["Name"] }}
            </td>
            <td>
              @foreach ($value["Permission"] as $PV)
              <span class="app-table-span-with-background-color">{{ $PV }}</span>
              @endforeach
            </td>
            <td>
              @if ($value["Gender"] === "M")
                Male
              @else
                Female
              @endif
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
@else
    沒有資料!
@endif
