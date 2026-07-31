<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Education;
use App\Models\PersonalQuality;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Tool;
use App\Models\VisitorLog;
use App\Notifications\ContactMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $activeProjects = Project::where('status', 1)->count();
        $totalCategories = Category::count();
        $totalBlogs = Blog::count();
        $publishedBlogs = Blog::where('status', 1)->count();
        $totalSkills = Skill::count();
        $totalTools = Tool::count();
        $totalQualities = PersonalQuality::count();
        $totalEducations = Education::count();
        $totalVisitors = VisitorLog::count();
        $latestBlogs = Blog::orderByDesc('id')->take(5)->get();

        return view('home', compact(
            'totalProjects', 'activeProjects',
            'totalCategories', 'totalBlogs', 'publishedBlogs',
            'totalSkills', 'totalTools', 'totalQualities',
            'totalEducations', 'totalVisitors', 'latestBlogs'
        ));
    }

    public function ai()
    {
        return view('ai');
    }

    public function contact(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $fail = function ($message) {
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $message
                ], 422);
            }

            return redirect()->back()->with([
                'message' => $message,
                'alert-type' => 'error'
            ]);
        };

        if ($valid->fails()) {
            return $fail($valid->errors()->first());
        }

        $settings = Setting::getSettings();
        if ($settings && $settings->is_captcha_enable && $settings->captcha_secret) {
            $token = $request->input('g-recaptcha-response');

            if (!$token) {
                return $fail('Captcha verification failed.');
            }

            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $settings->captcha_secret,
                'response' => $token,
                'remoteip' => $request->ip(),
            ]);

            $captcha = $response->json();
            if (!($captcha['success'] ?? false) || ($captcha['score'] ?? 0) < 0.5) {
                return $fail('Captcha verification failed.');
            }
        }

        $data = [
            'subject' => $request->subject,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'ip_address' => $request->ip()
        ];
        $mail = 'info@mokaddes.com';
        Notification::route('mail', $mail)->notify(new ContactMailNotification($data));

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message. We will get back to you soon.'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Thank you for your message. We will get back to you soon.',
            'alert-type' => 'success'
        ]);
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

    public function deviceToken(Request $request)
    {
        $ip = $request->ip();
        $token = $request->token;
        $visitor = VisitorLog::where('id', $ip)->first();
        if ($visitor) {
            $visitor->device_token = $token;
            $visitor->save();
        }
        return redirect()->back();
    }
}
