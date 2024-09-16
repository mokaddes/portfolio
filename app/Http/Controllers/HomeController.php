<?php

namespace App\Http\Controllers;

use App\Models\VisitorLog;
use App\Notifications\ContactMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
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
        $blockIps = VisitorLog::where('is_blocked', '1')->pluck('ip_address')->toArray();
        if (in_array($request->ip(), $blockIps)) {
            abort(403, 'You are blocked from sending message.');
        }
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
        $mail = 'info@mokaddes.com';
        Notification::route('mail', $mail)->notify(new ContactMailNotification($data));
        $session = [
            'message' => 'Thank you for your message. We will get back to you soon.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($session);
    }

    public function visitors()
    {
        $visitors = VisitorLog::latest('id')->get();
        return view('admin.visitors.index', compact('visitors'));
    }

    public function ipBlock(Request $request)
    {
        $id = $request->id;
        $isBlocked = $request->is_blocked;
        $visitor = VisitorLog::where('id', $id)->first();
        if ($visitor) {
            $visitor->is_block = $isBlocked ? 0 : 1;
            $visitor->save();
        }
        return redirect()->back();
    }
}
