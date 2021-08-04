<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <h3>Your Contact Information</h3>
            <form action="/contact" class="needs-validation ml-4" id="contactForm" method="post" role="form" novalidate>{{ csrf_field() }}
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="Name" name="Name" value="" placeholder="ex: John Doe" required/>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Name field is required.</div>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="Email" name="Email" value="" placeholder="ex: forexample@example.com" required/>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Email field is required.</div>
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" id="Phone" name="Phone" value="" placeholder="ex: +1-XXXX-XXXX" required/>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Phone field is required.</div>
                </div>

            <h3 class="ml-n1">General Message</h3>
                <div class="form-group">
                    <label for="">Subject</label>
                    <input type="text" class="form-control" id="Subject" name="Subject" value="" placeholder="I want to ...." required/>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Subject field is required.</div>
                </div>

                <div class="form-group">
                    <label for="">Message</label>
                    <textarea class="form-control" id="Message" name="Message" required></textarea>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Message field is required.</div>
                </div>

                <button class="btn btn-sm btn-primary" type="submit">SEND SUPPORT MESSAGE</button>
            </form>
        </div>
        <div class="col-md-6">
                <h3>You can also contact us via phone and email:</h3>
                <p class="ml-4">
                Phone: +886 (3) 473 3112<br>
                Phone: +886 (3) 473 3613<br>
                Email: <a href="mailto:William_jhuang@tecoimage.com.tw">William_jhuang@tecoimage.com.tw</a>
                </p>
        </div>
    </div>
</div>

<!--Back to top-->
<a href="#" class="back-to-top"><i class="fas fa-arrow-up fa-2x align-middle"></i></a>  