<?php

namespace App\Http\Controllers;

use App\Notifications\ContactMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function ai()
    {
        return view('ai');
    }

    public function contact(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if ($valid->fails()) {
            $session = [
                'message' => $valid->errors()->first(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($session);
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'ip_address' => $request->ip()
        ];
        $mail = 'mr.mokaddes@gmail.com';
        Notification::route('mail', $mail)->notify(new ContactMailNotification($data));
        $session = [
            'message' => 'Thank you for your message. We will get back to you soon.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($session);
    }
}
