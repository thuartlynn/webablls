<div class="container mx-auto">
        <form action="/purchase" method="post" role="form" class="needs-validation" novalidate autocomplete="on">{{ csrf_field() }}
            <div class="form-group">
                <h4 class="ml-n1">Organization Details</h4>
                <label for="organization">Organization or Registered Name / This will be the name that identifies the Organization (customer account) within WebABLLS</label>
                <input type="text" class="form-control" id="organization_name" name="organization_name"  required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback" >Organization or Registered Name field is required.</div>
                <div class="text-danger" id="invalid-orgname"></div>
            </div>
            <div class="form-group">
            <select name="Type" class="custom-select">
                <?php
                    use App\Enums\OrganizationType as OrganizationType;
                    $OrganizationType = OrganizationType::getKeys();
                    foreach($OrganizationType as $type)
                    {
                        echo '<option value='.OrganizationType::getValue($type).'>'.OrganizationType::getDescription(OrganizationType::getValue($type)).'</option>';
                    }
                ?>
                <!-- <option value="1" selected>School / District</option>
                <option value="2">Clinical Consultants</option>
                <option value="3">Parents</option> -->
            </select>
            </div>

			<!-- billing address -->
            <div class="form-group mt-5">
                <h4 class="ml-n1">Billing Address</h4>
                <label for="Address_name">Name / Company name</label>
                <input type="text" class="form-control" id="Address_name" name="Address_name" value="" placeholder="ex: John Doe" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Name / Company name field is required.</div>
            </div>
            <div class="form-group">
                <label for="Address_street">Street</label>
                <input type="text" class="form-control" id="Address_street" name="Address_street" value="" placeholder="ex: San Pedro St." required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Street field is required.</div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="Address_city" class="mr-3">City</label>
                    <input type="text" class="form-control mr-3" id="Address_city" name="Address_city" value="" placeholder="ex: Los Angeles" required />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">City field is required.</div>                
                </div>
                <div class="col">
                <label for="Address_zipcode" class="mr-3">Zip/Postal code</label>
                    <input type="text" class="form-control" id="Address_zipcode" name="Address_zipcode" value="" placeholder="ex: 90001" required />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Zip/Postal code field is required.</div> 
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="Address_country" class="mr-3">Country</label>
                    <select class="selectpicker countrypicker custom-select " data-live-search="true" name="Address_country"></select>
                </div>
                <div class="col">
                    <label for="Address_state" class="mr-3">State</label>
                    <input type="text" class="form-control" id="Address_state" name="Address_state" value="" required />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">State field is required.</div> 
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="" placeholder="+99(99)9999-9999" required />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Phone Number field is required.</div>
            </div>
            <div class="form-group">
                <input type="submit" value="CONTINUE" class="btn btn-primary btn-block"  />
                
            </div>
            <!-- //billing address -->
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

