<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
        public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Mail::raw($request->message, function ($mail) use ($request) {
            $mail->to($request->email)
                 ->subject($request->subject);
        });

        return response()->json([
            'message' => 'Email berhasil dikirim'
        ]);
    }

}
