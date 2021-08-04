<div class="container-fluid">
    <div class="container mx-auto mt-5">
    <form action="/password/email" method="post" role="form" class="needs-validation">{{ csrf_field() }}
                
        <div class="form-group">
            <label>Enter e-mail address:</label>
            <input type="email" class="form-control" id="email" name="email" value="" placeholder="xxxx@gmail.com" required />
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">E-mail address field is required.</div> 
            <div id="email_error_msg"><p></p></div>
            <script type="text/javascript">
                    if ("{{$Result->get('CheckResult')}}" === "ERROR" && "{{$Result->get('CheckResult')}}" !== "RESETPASSWORD") {
                        document.getElementById("email_error_msg").innerHTML=("{{$Result->get('Message')}}");
                    } else {
                    }
            </script>
        </div>
        <div class="form-group">
            <p>An e-mail with instructions will be sent.</p>
            <button type="submit" class="btn btn-primary">Remind password</button> 
        </div>
            
    </form>
        
        <br>
        <a href="{{ url('/login') }}">Go back to login form.</a>
        <br>

    </div>
</div>