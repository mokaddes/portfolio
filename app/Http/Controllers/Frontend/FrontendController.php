<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Education;
use App\Models\PersonalQuality;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Tool;
use App\Models\VisitorLog;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()
    {
        $this->trackVisitor();
        $data = $this->portfolioData();

        return view('portfolio.index3', $data);
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
                    'problem' => $project->problem,
                    'solution' => $project->solution,
                    'my_contribution' => $project->my_contribution,
                    'url' => $project->url,
                    'image' => asset($project->image),
                    'features' => $project->features ?? [],
                    'technologies' => $project->technologies ?? [],
                    'skills_used' => $project->skills_used ?? [],
                    'screenshots' => $project->screenshots ?? [],
                    'galleries' => $project->galleries->filter(function ($gallery) {
                        return file_exists(public_path($gallery->image));
                    })->map(function ($gallery) {
                        return [
                            'id' => $gallery->id,
                            'image' => asset($gallery->image),
                            'caption' => $gallery->caption,
                        ];
                    }),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found',
            ], 404);
        }
    }

    public function projectStudyCase(Project $project)
    {
        $project->load(['category', 'galleries']);
        $galleryItems = $project->galleries->filter(function ($gallery) {
            return file_exists(public_path($gallery->image));
        })->values();
        $screenshots = collect($project->screenshots ?? [])->filter(function ($path) {
            return is_string($path) && file_exists(public_path($path));
        })->values();

        $relatedProjects = Project::where('status', 1)
            ->where('category_id', $project->category_id)
            ->where('id', '!=', $project->id)
            ->orderByDesc('is_featured')
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('portfolio.project-study-case', [
            'project' => $project,
            'relatedProjects' => $relatedProjects,
            'galleryItems' => $galleryItems,
            'screenshots' => $screenshots,
        ]);
    }

    public function resume()
    {
        $data = $this->portfolioData();

        return view('portfolio.resume', $data);
    }

    /**
     * Stream the resume as a dynamically generated, always up-to-date PDF.
     */
    public function resumeDownload()
    {
        $data = $this->portfolioData();

        $pdf = Pdf::loadView('portfolio.resume-pdf', $data)
            ->setPaper('a4', 'portrait')
            ->setOption('isRemoteEnabled', true)
            ->setOption('defaultFont', 'DejaVu Sans');

        $fileName = Str::slug($data['profileName']).'-resume.pdf';

        return $pdf->download($fileName);
    }

    public function blogIndex()
    {
        $blogs = Blog::where('status', 1)->orderByDesc('published_at')->get();
        $categories = $blogs->pluck('category')->filter()->unique()->values();

        return view('portfolio.blog-index', array_merge($this->headerData(), [
            'blogs' => $blogs,
            'categories' => $categories,
        ]));
    }

    public function blogShow(Blog $blog)
    {
        $relatedBlogs = Blog::where('status', 1)
            ->where('id', '!=', $blog->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('portfolio.blog-show', array_merge($this->headerData(), [
            'blog' => $blog,
            'relatedBlogs' => $relatedBlogs,
        ]));
    }

    private function trackVisitor(): void
    {
        $ip = request()->ip();

        try {
            if ($ip === '103.176.2.79' || $ip === '127.0.0.1') {
                return;
            }

            $response = Http::get("https://ipinfo.io/{$ip}/json");
            if (!$response->successful()) {
                Log::alert('Failed to retrieve IP data from ipinfo.io');
                return;
            }

            $visitData = $response->json();
            $visitor = VisitorLog::where('ip_address', $ip)->first() ?? new VisitorLog();

            $visitor->ip_address = $ip;
            $visitor->city = $visitData['city'] ?? null;
            $visitor->region = $visitData['region'] ?? null;
            $visitor->country = $visitData['country'] ?? null;
            $visitor->location = $visitData['loc'] ?? null;
            $visitor->organization = $visitData['org'] ?? null;
            $visitor->timezone = $visitData['timezone'] ?? null;
            $visitor->visit_count = ($visitor->visit_count ?? 0) + 1;
            $visitor->save();
        } catch (\Exception $e) {
            Log::alert($e->getMessage());
        }
    }

    /**
     * Small, cheap set of profile/header fields every page's shared
     * layout needs (nav, footer, WhatsApp button). Kept separate from
     * portfolioData() so pages like the blog don't pay for the full
     * skills/projects/education queries just to render the header.
     */
    private function headerData(): array
    {
        $contactCards = $this->contactCards();
        $whatsappCard = collect($contactCards)->first(function ($card) {
            return Str::contains(strtolower($card['label']), 'whatsapp');
        });

        return [
            'profileName' => 'Mokaddes Hosain',
            'profileTitle' => 'Laravel Developer | SaaS | Automation',
            'profileImage' => asset('images/mkds.jpg'),
            'resumeLink' => route('resume.download'),
            'contactCards' => $contactCards,
            'whatsappHref' => $whatsappCard['href'] ?? '#contact',
        ];
    }

    private function contactCards(): array
    {
        return [
            ['label' => 'Email', 'value' => 'mr.mokaddes@gmail.com', 'href' => 'mailto:mr.mokaddes@gmail.com', 'icon' => 'fa-regular fa-envelope'],
            ['label' => 'WhatsApp', 'value' => '+8801750899448', 'href' => 'https://wa.me/8801750899448', 'icon' => 'fa-brands fa-whatsapp'],
            ['label' => 'LinkedIn', 'value' => 'linkedin.com/in/mokaddes', 'href' => 'https://www.linkedin.com/in/mokaddes/', 'icon' => 'fa-brands fa-linkedin-in'],
            ['label' => 'GitHub', 'value' => 'github.com/mokaddes', 'href' => 'https://github.com/mokaddes', 'icon' => 'fa-brands fa-github'],
        ];
    }

    private function portfolioData(): array
    {
        $skills = Skill::where('status', 1)->orderBy('name')->get();
        $categories = Category::withCount([
            'projects' => function ($query) {
                $query->where('status', 1);
            },
        ])->where('status', 1)->orderBy('order_id')->get();
        $projects = Project::with(['galleries', 'category'])
            ->where('status', 1)
            ->orderByDesc('is_featured')
            ->orderBy('order')
            ->get();
        $tools = Tool::where('status', 1)->orderBy('order')->get();
        $personalQualities = PersonalQuality::where('status', 1)->orderBy('id')->get();
        $education = Education::where('status', 1)->orderByDesc('year')->get();
        $blogs = Blog::where('status', 1)->orderByDesc('published_at')->get();

        $services = $categories->map(function ($category) use ($projects) {
            $projectCount = $projects->where('category_id', $category->id)->count();

            return [
                'title' => $category->name,
                'subtitle' => $projectCount . ' live project' . ($projectCount === 1 ? '' : 's'),
                'description' => $this->serviceDescription($category->name),
                'icon' => $this->serviceIcon($category->name),
            ];
        })->values();

        $aboutStats = [
            ['label' => 'Projects shipped', 'value' => $projects->count() . '+'],
            ['label' => 'Core skills', 'value' => $skills->count() . '+'],
            ['label' => 'Tools used', 'value' => $tools->count() . '+'],
            // ['label' => 'Education records', 'value' => $education->count() . '+'],
        ];

        // Work history. Move to a DB-backed Experience model later if you want
        // this editable from an admin panel — for now it lives here next to
        // the other hand-maintained arrays like contactCards().
        $experiences = [
            [
                'role' => 'Software Developer',
                'company' => 'Dhaka Softwares',
                'period' => 'January 2025 - Present',
                'location' => 'Banani, Dhaka, Bangladesh (Remote)',
                'current' => true,
                'description' => 'Developing and maintaining enterprise-level web applications using Laravel framework. Collaborating with cross-functional teams to deliver robust, scalable software solutions. Implementing best practices in code quality, security, and performance optimization while working remotely.',
            ],
            [
                'role' => 'Software Developer',
                'company' => 'Arobil Ltd',
                'period' => 'February 2022 - Present',
                'location' => 'Banani, Dhaka, Bangladesh',
                'current' => false,
                'description' => 'Leading development of complex web applications with scalable architectures. Mentoring junior developers and conducting code reviews. Specializing in Laravel-based solutions for various business domains including e-commerce, SaaS platforms, and management systems.',
            ],
            [
                'role' => 'Web Developer Intern',
                'company' => 'Oasis IT',
                'period' => 'August 2016 - August 2017',
                'location' => 'Rajshahi, Bangladesh',
                'current' => false,
                'description' => 'Web Design & Development Department. Gained hands-on experience in full-stack web development, working on real-world client projects and learning industry best practices in modern web technologies.',
            ],
        ];

        $personalDetails = [
            ['label' => 'Date of birth', 'value' => '15 July 1995', 'icon' => 'fa-regular fa-calendar'],
            ['label' => 'Nationality', 'value' => 'Bangladeshi', 'icon' => 'fa-regular fa-flag'],
            ['label' => 'Marital status', 'value' => 'Married', 'icon' => 'fa-solid fa-heart'],
            ['label' => 'Mobile', 'value' => '+880 1750 899448', 'icon' => 'fa-solid fa-mobile-screen'],
            ['label' => 'Address', 'value' => 'Rangpur, Bangladesh', 'icon' => 'fa-solid fa-location-dot'],
        ];

        return array_merge($this->headerData(), [
            'careerSummary' => 'I build Laravel applications, SaaS platforms, AI-assisted workflows, and database-driven portfolio systems that help teams ship faster and look more professional.',
            'designation' => 'Laravel Developer | SaaS Engineer | AI Automation',
            'skills' => $skills,
            'projects' => $projects,
            'categories' => $categories,
            'services' => $services,
            'tools' => $tools,
            'personalQualities' => $personalQualities,
            'educations' => $education,
            'blogs' => $blogs,
            'aboutStats' => $aboutStats,
            'experiences' => $experiences,
            'personalDetails' => $personalDetails,
        ]);
    }

    private function serviceDescription(string $categoryName): string
    {
        return match ($categoryName) {
            'Web Application' => 'Custom Laravel systems, dashboards, portals, and internal tools that solve real business problems.',
            'E-commerce' => 'Stores, checkout flows, vendor dashboards, and conversion-focused commerce experiences.',
            'Platform' => 'Multi-user platforms, SaaS products, and ecosystems built to scale with your business.',
            'Management System' => 'Operational software for teams that need clearer workflows, less manual work, and better reporting.',
            'Business Solution' => 'Tailored business software for service companies, startups, and digital products.',
            default => 'A focused service line backed by real projects from the portfolio.',
        };
    }

    private function serviceIcon(string $categoryName): string
    {
        return match ($categoryName) {
            'Web Application' => 'fa-solid fa-laptop-code',
            'E-commerce' => 'fa-solid fa-cart-shopping',
            'Platform' => 'fa-solid fa-layer-group',
            'Management System' => 'fa-solid fa-diagram-project',
            'Business Solution' => 'fa-solid fa-briefcase',
            default => 'fa-solid fa-code',
        };
    }
}
