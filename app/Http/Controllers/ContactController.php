<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\contact;

class ContactController extends Controller
{
    public function index() {

       return view('contact');


    }
    
   
    public function sendEmail(Request $request) {
  
        $rules = [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:255',
            'subject' => 'required|min:5|max:50',
            'message' => 'required|min:5|max:50',
        ];

        $this->validate($request, $rules);

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
                  
        Mail::to('nour-ja19@hotmail.fr')->send( new contact( $name, $email, $subject, $message));
        return response()->json(['message' => "Thank you, your email was sent :)))"]);
      
        
    }
}
