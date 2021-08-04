<div class="container">
    <div class="row">
    <div class="col-md-6">
    <form action="/purchase/payment" method="get">{{ csrf_field() }}
        <table class=table15_3 >
            <tr>
                <th>Payment Details</th>
            </tr>
            <tr>
                <td>Organization or Registered Name</td>
            </tr>
            <tr> 
                <td>{{$PaymentInfo->get('Org_Name')}}<br>
                {{$PaymentInfo->get('Org_Type')}}</td>
            </tr>
            <tr>
                <td>Billing Address</td>
            </tr>
            <tr>
                <td>{{$PaymentInfo->get('Org_Address')}} <br>
                    {{$PaymentInfo->get('Org_Street')}} <br>
                    {{$PaymentInfo->get('Org_City')}} {{$PaymentInfo->get('Org_ZipCode')}} <br>
                    {{$PaymentInfo->get('Org_Country')}} {{$PaymentInfo->get('State')}} <br>
                    {{$PaymentInfo->get('Org_Phone')}}
                </td>
            </tr>
            <tr>
                <td>Administrator User Details</td>
            </tr>
            <tr>
                <td>{{$PaymentInfo->get('Account_Name')}}<br>{{$PaymentInfo->get('Account_Email')}}</td>
            </tr>
            <tr>
                <td>Subscription Details</td>
            </tr>
            <tr>
                <td>{{$PaymentInfo->get('Seats')}} seats / {{$PaymentInfo->get('Extend')}} year</td>
            </tr>
            <tr>
                <td>Order total</td>
            </tr>
            <tr>
                <td>{{$PaymentInfo->get('Total')}} (USD)</td>
            </tr>
        </table>
    </form>
    </div>

    <div class="col-md-6">
        <div class="creditCardForm">
            <div class="heading">
                <h1>Confirm Payment</h1>
            </div>
            <div class="payment">
                <form action="/purchase/completed" method="post">{{ csrf_field() }}
                    <!-- <div class="form-group owner">
                        <label for="owner">Cardholder's Name</label>
                        <input type="text" class="form-control" id="owner" autocomplete="off" />
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Credit Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" autocomplete="off" />
                    </div> -->
                    <!-- <div class="form-group CVV">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" id="cvv" autocomplete="off" />
                    </div> -->
                    <!-- <div class="form-group" id="expiration-date">
                        <label>Expiration Date</label>
                        <select>
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select>
                            <option value="20"> 2020</option>
                            <option value="21"> 2021</option>
                            <option value="22"> 2022</option>
                            <option value="23"> 2023</option>
                            <option value="24"> 2024</option>
                            <option value="25"> 2025</option>
                            <option value="26"> 2026</option>
                            <option value="27"> 2027</option>
                            <option value="28"> 2028</option>
                            <option value="29"> 2029</option>
                            <option value="30"> 2030</option>
                            <option value="31"> 2031</option>
                            <option value="32"> 2032</option>
                            <option value="33"> 2033</option>
                            <option value="34"> 2034</option>
                        </select>
                    </div> -->
                    <!-- <br>
                    <div class="form-inline" id="credit_cards">
                    <img src="{{ URL::asset('images/visa.jpg') }}" id="visa">
                    <img src="{{ URL::asset('images/mastercard.jpg') }}" id="mastercard">
                    <img src="{{ URL::asset('images/amex.jpg') }}" id="amex">
                    </div> -->
                    <div class="form-group" id="pay-now">
                        <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm</button>
                        <a href="javascript:history.go(-1)" class="btn btn-secondary" >Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <span>WebABLLS fees are based on a per-seat cost versus a per-user cost. Each student profile requires a seat. However, there are no restrictions on how many users can be associated with a student profile and the associated data. The cost for one seat subscription is $100 for the first year with a renewal fee of $60 per year thereafter. All orders must be in US Dollars (USD). </span>
        <span>WebABLLS is a subscription-based service with an annual expiration date. Additional seats may be purchased during a subscription term and will be prorated for the portion of the subscription term remaining at $5 per month plus the $40 activation fee and will terminate on the same date as the underlying subscription. The fees are based on the seats purchased and not on the actual usage.</span>
        <span>
        Orders placed through WebABLLS.net are activated upon confirmation of payment.
        <li>Orders placed through WebABLLS.net are activated upon confirmation of payment.</li>
        <li>This new customer order registration portal accepts only credit card payments. Please contact the WebABLLS Support Team directly for instructions and assistance with a NEW customer order using another payment method such as a purchase order or check.</li>
        </span>
        <span>WebABLLS Return Policy – Behavior Analysts, Inc., offers a 30-day return policy for WebABLLS subscriptions. To process a return, please contact the WebABLLS Support Team via the contact page within 30 days of account/subscription activation. You will be charged a $50 processing fee, and the remaining balance will be refunded consistent with the original method of payment.</span>
        <span>WebABLLS is a web-based technology – no actual product will be mailed or shipped. Order confirmation and notification regarding user account activation (instructions and password) will be sent to the email address entered with the order.</span>
    </div>
</div>