<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Redirect;
use App\Message;

class FeedbackController extends Controller
{
    public function website(Request $request) {
        $request->validate([
            'email' => 'required|email|max:255',
            'subiect' => 'required|string|max:255',
            'mesaj' => 'required|string|max:2000'
        ]);

        $this->send_email($request);

        return redirect('main');
    }

    public function page(Request $request, $page) {
        $request->validate([
            'nume' => 'required|string|max:255',
            'mesaj' => 'required|string|max:500'
        ]);

        $message = new Message();
        $message->mesaj = $request->mesaj;
        $message->nume = $request->nume;
        $message->page_id = $page;
        $message->save();

        return Redirect::back();
    }

    function send_email($user_data) {
        $to_name = $user_data->email;
        $to_email = $user_data->email;
        $subject = $user_data->subiect;
        $msg = $user_data->mesaj;

        $data = array('msg'=> $user_data->mesaj, 'email'=> $user_data->email);

        Mail::send('emails.feedback', $data, function($message) use ($to_name, $to_email, $subject) {
            $message->to($to_email, $to_name);
            $message->subject($subject);
        });
    }

}
