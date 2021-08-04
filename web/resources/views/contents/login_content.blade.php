<div class="container-fluid">
    <div class="container mx-auto">
        <div id="send_pwd_msg"><p></p></div>
        <div id="pwd_set_msg"><p></p></div> 

        <form action="/login" method="post" role="form" class="needs-validation" novalidate autocomplete="off">  
            {{ csrf_field() }}
            <h2><i class="fas fa-user fa-1x mr-2 ml-n1"></i>Login</h2>    
            <div class="form-group">
                <label for="email">E-mail address</label>
                <input type="email" class="form-control" id="email" name="email" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback" id="emailRequired">Email field is required</div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Password field is required</div>
            </div>
			<!-- checkbox -->
            <div class="form-check mb-3 pl-0">
                <input type="checkbox" class="custom-checkbox rememberMe mr-2" name="rememberMe" value="lsRememberMe" id="rememberMe">
                <!-- onclick="lsRememberMe()" -->

                <label class="form-check-label" for="rememberMe">Remember me?
                </label>
            </div>
			<!-- //checkbox -->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Log in" />
            </div>
            <div id="email_error_msg"><p></p></div>

        </form>
        
        <br>
        <a href="{{ route('password.request') }}">Forgot your password? </a>
        <br>
    
    </div>
</div>

<script type="text/javascript">

    let rmCheck = document.getElementById("rememberMe");
        emailInput = document.getElementById("email");

    if (localStorage.checkbox && localStorage.checkbox != "") {
        rmCheck.setAttribute("checked", "checked");
        emailInput.value = localStorage.username;
        
    } else {
        rmCheck.removeAttribute("checked");
        emailInput.value = "";
        localStorage.username = "";
    }

    $("#rememberMe").click(function(event) {
        if (rmCheck.checked) {
            localStorage.username = emailInput.value;
            localStorage.checkbox = rmCheck.value;
            // console.log(localStorage.username);
            // if (rmCheck.checked && emailInput.value != "") {
        } else {
            localStorage.username = "";
            localStorage.checkbox = "";
        }
    });
    $(document).ready(function() {
        $("#email").change(function() {
            let rmCheck = document.getElementById("rememberMe");
                emailInput = document.getElementById("email");

            if ($("#rememberMe").is(":checked")) {
                localStorage.username = emailInput.value;
                // console.log(localStorage.username);
            } else {
                rmCheck.removeAttribute("checked");
                localStorage.username = "";
            }
        });

    });
</script>