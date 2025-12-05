<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\PersonalQuality;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Tool;
use App\Models\VisitorLog;
use App\Notifications\ContactMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class FrontendController extends Controller
{
    public function index()
    {
        $ip = request()->ip();
        try {
            if ($ip !== '103.176.2.79' && $ip !== '127.0.0.1') {
                $response = Http::get("https://ipinfo.io/{$ip}/json");

                if ($response->successful()) {
                    $visitData = $response->json();
                    $visitor = VisitorLog::where('ip_address', $ip)->first();
                    if (!$visitor) {
                        $visitor = new VisitorLog();
                    }

                    $visitor->ip_address = $ip;
                    $visitor->city = $visitData['city'] ?? null;
                    $visitor->region = $visitData['region'] ?? null;
                    $visitor->country = $visitData['country'] ?? null;
                    $visitor->location = $visitData['loc'] ?? null;
                    $visitor->organization = $visitData['org'] ?? null;
                    $visitor->timezone = $visitData['timezone'] ?? null;
                    $visitor->visit_count = $visitor->visit_count + 1;
                    $visitor->save();
                } else {
                    Log::alert("Failed to retrieve IP data from ipinfo.io");
                }
            }
        } catch (\Exception $e) {
            Log::alert($e->getMessage());
        }

        $skills = Skill::where('status', 1)->get();
        $projects = Project::with('galleries')->where('status', 1)->get();
        $tools = Tool::orderBy('order')->where('status', 1)->get();;
        $personalQualities = PersonalQuality::where('status', 1)->get();
        $education = Education::where('status', 1)->get();
        $objective = '';
        $experience = [];
        return view('portfolio.index3',
            [
                'resumeLink' => asset('assets/cv/mokaddes_hosain.pdf'),
                'heroBg' => asset('images/hero-bg.jpg'), // optional hero bg override
                'skills' => $skills, // array / collection of skill objects: icon, name, description
                'projects' => $projects, // array/collection: image, name, description, url, category
                'tools' => $tools,
                'personalQualities' => $personalQualities,
                'objective' => $objective, // string from CV
                'educations' => $education, // array of [degree, institution, year, meta]
                'experience' => $experience, // array of [title, company, period, location, desc]
            ]
        );

    }

    public function show($id)
    {
        try {
            $project = Project::with(['galleries', 'category'])
                ->where('status', 1)
                ->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $project->id,
                    'name' => $project->name,
                    'slug' => $project->slug,
                    'category' => $project->category->name ?? 'Uncategorized',
                    'short_description' => $project->short_description,
                    'long_description' => $project->long_description,
                    'url' => $project->url,
                    'image' => asset($project->image),
                    'features' => json_decode($project->features, true) ?? [],
                    'technologies' => json_decode($project->technologies, true) ?? [],
                    'skills_used' => json_decode($project->skills_used, true) ?? [],
                    'galleries' => $project->galleries->map(function($gallery) {
                        return [
                            'id' => $gallery->id,
                            'image' => asset($gallery->image),
                            'caption' => $gallery->caption,
                        ];
                    }),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found'
            ], 404);
        }
    }

}
