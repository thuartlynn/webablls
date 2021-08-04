<div class="container mx-auto">
    <form name="details" action="/purchase/details" method="post" class="needs-validation" novalidate autocomplete="on">{{ csrf_field() }}
        <h4 class="ml-n1">Subscription Details</h4>
        <div class="row">
            <div class="col-6">
                <div class="form-inline mr-5">
                    <label for="seatquantity" class="mr-2">Seat Quantity</label>
                    <input type="button" onclick="sub()" value="-">
                    <input type="text" value="1" class="seatQuantity" name="seatquantity" id="txt" oninput="value=value.replace(/[^\d]/g,'')">
                    <input type="button" onclick="add()" value="+">
 
<script>
    var a = document.getElementsByClassName("seatQuantity")[0];

    let txtKeyvalue = document.getElementById("txt");
    txtKeyvalue.addEventListener("change", updateValue);
 
    function add(){
        var txt = document.getElementsByClassName("seatQuantity")[0];
        var a = txt.value;
        a++;
        txt.value = a;
        if(txt.value>99999){
            txt.value = 99999;
        }
    }
    
    function sub(){
        var txt = document.getElementsByClassName("seatQuantity")[0];
        var a = txt.value;
        if(a>1){
            a--;
            txt.value = a;
        }else{
            txt.value = 1;
        }
        
    }

    function updateValue(e) {
        if(txtKeyvalue.value>99999){
            txtKeyvalue.value = 99999;
        } else if (txtKeyvalue.value <= 0) {
            txtKeyvalue.value = 1;
        } else if (txtKeyvalue.value.length == 0){
            txtKeyvalue.value = 1;
        } else {}
    }

</script>
                </div>
            </div>
            <div class="col-6">
                <div class="form-inline mr-5">
                    <label for="length" class="mr-2">Length</label>
                    <select id="extend" name="extend" class="form-control custom-select-md" required>
                        <option value="">Select length</option>
                        <option value="1" selected>Extend for 1 year</option>
                        <option value="2">Extend for 2 years</option>
                        <option value="3">Extend for 3 years</option>
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback" id="invalid-feedback">Please fill out this field.</div>
                    <script type="text/javascript">
                       function dextendvalue() {
                           if(details.extend.value == ""){
                            document.getElementsByClass("invalid-feedback").innerHTML;
                           } else {};
                       } 
                    </script>
                </div>
            </div>
        </div>

        <div class="col mt-5 ml-n3">
        <span>
        <strong>Pricing (USD)</strong><br>First year: $100 per student profile
        <br>Renewal: $60 per student profile (each additional year)
        </span>
        </div>

        <div class="col mt-2 ml-n3">
        <span>
        <strong>Quantity Discounts</strong><br>10% 10 – 19 seats
        <br>20% 20 – 29 seats
        <br>30% 30 – 49 seats
        </span>
        </div>

        <!-- <div class="form-inline mt-2">
            <label for="promotion_code" class="mr-2">Promotion Code:</label>
            <input type="text" class="form-control form-control-md" id="promotion_code" name="promotion_code" value="" />
        </div> -->

        <div class="col mt-4 ml-n3">
            <h4 class="ml-n1">Administrator User Details</h4>
            <span class="text-justify">
            Enter the information for the person who will be the account's primary user contact. This user account will be registered as the administrator user, who is responsible for account maintenance such as adding user accounts, monitoring and managing both user accounts and user profiles, as well as placing orders.
            </span>
        </div>

        <div class="row mt-4">
            <div class="col-6">
            <div class="form-group">
                <label for="administrator_first_name">First Name</label>
                <input type="text" class="form-control" id="administrator_first_name" name="administrator_first_name" value="" placeholder="ex: John" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group">
                <label for="administrator_last_name">Last Name</label>
                <input type="text" class="form-control" id="administrator_last_name" name="administrator_last_name" value="" placeholder="ex: Doe" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="validationCustom01">Email address</label>
            <input type="email" class="form-control" id="administrator_email" name="administrator_email" data-val="true" placeholder="ex: xxx@gmail.com" required />
            <div id="Required" class="invalid-feedback">Email field is required</div>
            <div id="registered"></div>
            <!-- pattern="(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*))@([a-zA-Z0-9-]+[.])+([a-zA-Z]{2}|net|com|gov|mil|org|edu|int|name|asia)"  -->

            <script type="text/javascript"> 
                if ("{{$AccountCheck->get('CheckResult')}}" === "ERROR" ) {
                    document.getElementById("registered").innerHTML=("{{$AccountCheck->get('Message')}}");
                }
            </script>

        </div>

        <div class="form-group">
            <label for="validationCustom02">Confirm email address</label>
            <input type="email" class="form-control" id="a_confirm_email" name="a_confirm_email"  placeholder="Please confirm your email." required />
            <div id="confirmRequired" class="invalid-feedback">Email confirmation is required</div>
        </div>

        <div class="form-check">
            <label class="form-check-label" for="agree">
            <input type="checkbox" class="form-check-input mr-2" id="agree" name="agree" value="true" required>I agree and consent to the WebABLLS Privacy Policy and Terms and Conditions.
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please agree the Privacy Policy & Terms and Conditions.</div></label>
        </div>

        <div class="form-group mt-4">
            <input type="submit" value="CONTINUE" class="btn btn-primary" />
            <a href="{{ url('/purchase') }}" class="btn btn-secondary" value="Back" type="button">Back</a>
        </div>
    </form>

    <div class="row mt-5">
        <span>WebABLLS fees are based on a per-seat cost versus a per-user cost. Each student profile requires a seat. However, there are no restrictions on how many users can be associated with a student profile and the associated data. The cost for one seat subscription is $100 for the first year with a renewal fee of $60 per year thereafter. All orders must be in US Dollars (USD). </span>
        <span>WebABLLS is a subscription-based service with an annual expiration date. Additional seats may be purchased during a subscription term and will be prorated for the portion of the subscription term remaining at $5 per month plus the $40 activation fee and will terminate on the same date as the underlying subscription. The fees are based on the seats purchased and not on the actual usage.</span>
        <span>
        Orders placed through WebABLLS.net are activated upon confirmation of payment.
        <li>Orders placed through WebABLLS.net are activated upon confirmation of payment.</li>
        <li>This new customer order registration portal accepts only credit card payments. Please contact the <a href="mailto:William_jhuang@tecoimage.com.tw">WebABLLS Support Team</a> directly for instructions and assistance with a NEW customer order using another payment method such as a purchase order or check.</li>
        </span>
        <span>WebABLLS Return Policy – Behavior Analysts, Inc., offers a 30-day return policy for WebABLLS subscriptions. To process a return, please contact the <a href="mailto:William_jhuang@tecoimage.com.tw">WebABLLS Support Team</a> via the contact page within 30 days of account/subscription activation. You will be charged a $50 processing fee, and the remaining balance will be refunded consistent with the original method of payment.</span>
        <span>WebABLLS is a web-based technology – no actual product will be mailed or shipped. Order confirmation and notification regarding user account activation (instructions and password) will be sent to the email address entered with the order.</span>
    </div>
</div>