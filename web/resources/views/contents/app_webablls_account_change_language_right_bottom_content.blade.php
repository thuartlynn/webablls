<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr hide">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Your language has been changed.</span>  
  </div>
</div>

<form action="{{url('/Account/LanguageChange')}}" class="app-inline" id="LanguageChangefrm" method="post">
  {{ csrf_field() }}
  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Name_Format">Select Language</label>
    <select id="Language_id" name="Language" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
      <option value="0">English</option>
      <option value="1">Chinese</option>
    </select>
  </div>

  <input type="submit" value="Save Changes" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>

<input type="submit" value="Cancel" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="javascript:location.href='{{url('/Account')}}'"/>

<div class="app-right-bottom-mr">
  <p class="app-right-bottom-content">Change language from English to Spanish:</p>
  <ul class="app-right-bottom-content">
    <li>Select <b>Spanish</b> from drop-down list</li>
    <li><b>Save changes</b></li>
  </ul>

  <p class="app-right-bottom-content">Change language from Spanish to English</p>
  <ul class="app-right-bottom-content">
    <li>Select <b>Inglés</b> from drop-down list</li>
    <li>Click <b>Guardar Cambios</b> to save changes</li>
  </ul>

  <p class="app-right-bottom-content" style="color:darkred">Or use the <b>Select Language</b> toggle located in the navigation banner.</p>
  <p class="app-right-bottom-content" style="color:darkred">O use el menú desplegable para seleccionar el <b>idioma</b> localizado en la barra de navegación</p>
</div>