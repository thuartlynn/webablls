<div class="container-fluid">
    <div class="container mx-auto">

        <form id="resetForm" action="/password/reset/{{ $token }}" method="post" >  
            {{ csrf_field() }}
            <div class="form-group">
                <label for="New_Password">Enter new password:</label>
                <input autocomplete="off" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="NewPassword" name="NewPassword" type="password" value="" oninput="Listener(event)" onporpertychange="Listener(event)"/>
            </div>

            <div class="form-group">
                <label for="Confirm_New_Password">Confirm new password:</label>
                <input autocomplete="off" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="ConfirmNewPassword" name="ConfirmNewPassword" type="password" value="" oninput="Listener(event)" onporpertychange="Listener(event)"/>
            </div>

            <div class="mt-2">
                <p>Password requirements</p>
                <ul class="app-list-ul app-right-bottom-mr">
                <li id="list-input-pw-9" class="app-list-item app-right-bottom-content list-group-item-danger">Password must consist of at least 9 characters</li>
                <li id="list-input-pw-lower" class="app-list-item app-right-bottom-content list-group-item-danger">Password must include at least 1 lower case character</li> 
                <li id="list-input-pw-upper" class="app-list-item app-right-bottom-content list-group-item-danger">Password must include at least 1 upper case character</li>
                <li id="list-input-pw-special" class="app-list-item app-right-bottom-content list-group-item-danger">Password must include at least one special character OR one digit</li>
                <li id="list-input-pw-check" class="app-list-item app-right-bottom-content list-group-item-danger">Enter confirmation password that matches new password</li>
                </ul>
            </div>
			
            <input id="submit" type="submit" value="Set new password" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
        </form>
        
        <br>
        <a href="{{ url('/login') }}">Go back to login form.</a>
        <br>

    </div>
</div>