<div class="container-fluid bg-gray">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <p class="text-secondary m-0">WebABLLS Support Center</p>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/SupportCenter') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/SupportCenter/contacts') }}">Contacts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add a Personal Contact</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-1"></div>
</div>

<div class="row">
    <div class="col-sm-1"></div>
        <div class="col-sm-10 bg-white border shadow-sm p-3">
            <div>
                <h4>Add a Personal Contact</h4>
                <p class="ml-4"><small>Last Updated: Oct 10, 2016 05:24PM PDT</small></p>
            </div>
            <hr class="hr">
            <div>
                <p class="ml-4"><b style="color: #B22222;">Important!</strong> This procedure will add an established user account to your Contact List for the purpose of sharing a student profile with another user account.<u style="color: #B22222;">This procedure does not create a user account</u>.<p>
                
                <p class="ml-4">Student Profiles can be shared with any user account throughout the WebABLLS community. Only user accounts within your organization appear on your Contact List automatically. A user account outside your organization must be added to your Contact List for the user account - User accounts included on your Contact List will be included on your Share screen.</p>

                <p class="ml-4">To add a <strong>Personal Contact</strong> select <strong>Contacts</strong> from the top banner</p>

                <p class="ml-4">Select <strong>Add Contact</strong> from the action panel</p>

                <img class="ml-4" src="{{ URL::asset('images/support/add-a-personal-contact-1.png') }}">

                <p class="ml-4">Complete the Add Contact form and click <strong>Add Contact</strong></p>

                <img class="ml-4" src="{{ URL::asset('images/support/add-a-personal-contact-2.png') }}">
                
                <ul>
                    <li>The screen will refresh and the Contact will display in the Personal Contacts section</li>
                    <li>If the <strong>“Is User”</strong> column is marked <strong>Yes</strong>, the email address is registered in the system – you can proceed with authorizing sharing permissions between a student and this user</li>
                    <li>If the <strong>“Is User”</strong> column is marked No, the email address is not associated with a current user account and a user account will need to be created by an administrator user from within your organization OR by the WebABLLS Support Team</li>
                </ul>

                <p class="ml-4"><strong>Note</strong> | A contact from your Organization Members list can be added as a Personal Contact as a shortcut for quick access.<p>
                
                <p class="ml-4"><strong>Related topics...</strong><br>
                <a href="{{ url('/SupportCenter/contacts/how-to-remove-a-contact') }}">How to Remove a Contact</a><br>
                <a href="{{ url('/SupportCenter/contacts/contact-list-personal-contacts') }}">Contact List | Personal Contacts</a></p>
            </div>

        </div>
    <div class="col-sm-1"></div>
</div>
<script type="text/javascript">

</script>