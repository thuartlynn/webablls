<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailService;

class SupportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function SendContactMessage(Request $request)
    {      
      $Info = collect([]);
      $Info->put("email","William_jhuang@tecoimage.com.tw");
      $Info->put("Name",$request->Name);
      $Info->put("Customer",$request->Email);
      $Info->put("Phone",$request->Phone);
      $Info->put("Subject",$request->Subject);
      $Info->put("Message",$request->Message);
      $Sender = new MailService();        
      $Sender->SendContactMail($Info);  
      return redirect(url('/'));
    }
}
