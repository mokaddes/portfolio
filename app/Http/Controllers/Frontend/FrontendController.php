<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Education;
use App\Models\PersonalQuality;
use App\Models\Project;
use App\Models\Setting;
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
        $projectImage = $galleryItems->count() > 0 ? $galleryItems->first()->image : $project->image;

        return view('portfolio.project-study-case', array_merge($this->headerData(), [
            'project' => $project,
            'relatedProjects' => $relatedProjects,
            'galleryItems' => $galleryItems,
            'screenshots' => $screenshots,
            'projectImage' => $projectImage,
        ]));
    }

    public function projectsIndex()
    {
        $projects = Project::with(['category'])
            ->where('status', 1)
            ->orderByDesc('is_featured')
            ->orderBy('order')
            ->get();

        $categories = $projects->pluck('category.name')->filter()->unique()->values();

        return view('portfolio.projects-index', array_merge($this->headerData(), [
            'projects' => $projects,
            'categories' => $categories,
        ]));
    }

    public function resume()
    {
        $data = $this->portfolioData() + $this->headerData();

        return view('portfolio.resume', $data);
    }

    /**
     * Stream the resume as a dynamically generated, always up-to-date PDF.
     */
    public function resumeDownload()
    {
        $data = $this->portfolioData() + $this->headerData();

        $data['careerSummary'] = 'Full-Stack Laravel Developer with 5+ years of experience building
            scalable web applications, SaaS platforms, e-commerce solutions,
            booking systems, and enterprise software. Proficient in PHP, Laravel,
            Vue.js, MySQL, REST APIs, JavaScript, and modern web technologies.
            Experienced in AI integration, including LLMs, n8n automation,
            webhooks, and multi-provider AI solutions for business workflows.
            Passionate about developing secure, high-performance, and userfocused applications while delivering clean, maintainable, and scalable
            code.';

//        return view('portfolio.resume-pdf', $data);
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

        $imagePath = public_path('assets/images/mokaddes.png');
        $settings = Setting::getSettings();


        return [
            'settings' => $settings,
            'profileName' => 'Mokaddes Hosain',
            'profileTitle' => 'Laravel Developer | SaaS | Automation',
            'profileImage' => file_exists($imagePath)
                ? 'data:image/png;base64,' . base64_encode(file_get_contents($imagePath))
                : null,
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
            ['label' => 'LinkedIn', 'value' => 'linkedin.com/in/mokaddeshosain', 'href' => 'https://www.linkedin.com/in/mokaddeshosain', 'icon' => 'fa-brands fa-linkedin-in'],
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
        $totalProject = $projects->count() + 51;
        $highlights = [

            [
                'title'=>'5+ Years Experience',
                'description'=>'Building enterprise Laravel applications and SaaS platforms.'
            ],

            [
                'title'=>"70+ Projects Delivered",
                'description'=>'Successfully completed web applications for startups and businesses.'
            ],

            [
                'title'=>'Laravel & SaaS Specialist',
                'description'=>'Expert in scalable architecture, multi-tenant systems, and APIs.'
            ],

            [
                'title'=>'AI & Automation',
                'description'=>'OpenAI, n8n, workflow automation, chatbots, and intelligent solutions.'
            ],

            [
                'title'=>'API Integration',
                'description'=>'Payment gateways, Google APIs, OAuth, Firebase, WhatsApp, and more.'
            ],

            [
                'title'=>'Team Leadership',
                'description'=>'Code reviews, mentoring developers, and technical planning.'
            ]

        ];;
        $education = Education::where('status', 1)->orderByDesc('year')->get();
        $blogs = Blog::where('status', 1)->orderByDesc('published_at')->get();

        $services = [

            [
                'icon' => 'fa-solid fa-layer-group',
                'subtitle' => 'Laravel',
                'title' => 'Custom Laravel Development',
                'description' => 'Build secure, scalable Laravel web applications, enterprise portals, CRM systems, ERP solutions, and custom business software.'
            ],

            [
                'icon' => 'fa-solid fa-cloud',
                'subtitle' => 'SaaS',
                'title' => 'SaaS Application Development',
                'description' => 'Multi-tenant SaaS platforms with subscription billing, user management, dashboards, roles & permissions, and cloud deployment.'
            ],

            [
                'icon' => 'fa-solid fa-robot',
                'subtitle' => 'AI',
                'title' => 'AI Integration & Automation',
                'description' => 'Integrate OpenAI, ChatGPT, Gemini, Claude, AI chatbots, workflow automation, n8n, and intelligent business processes.'
            ],

            [
                'icon' => 'fa-solid fa-code',
                'subtitle' => 'API',
                'title' => 'REST API Development',
                'description' => 'Develop secure RESTful APIs, third-party integrations, payment gateways, OAuth authentication, and webhook services.'
            ],

            [
                'icon' => 'fa-solid fa-cart-shopping',
                'subtitle' => 'E-Commerce',
                'title' => 'E-Commerce Solutions',
                'description' => 'Custom online stores, payment integration, inventory management, order processing, subscriptions, and marketplace development.'
            ],

            [
                'icon' => 'fa-solid fa-plug',
                'subtitle' => 'Integration',
                'title' => 'Third-Party Integrations',
                'description' => 'Google Maps, Stripe, PayPal, Twilio, SendGrid, Firebase, WhatsApp, Google Login, and custom API integrations.'
            ],

            [
                'icon' => 'fa-brands fa-wordpress',
                'subtitle' => 'WordPress',
                'title' => 'WordPress Development',
                'description' => 'Custom themes, plugins, WooCommerce solutions, performance optimization, and API-connected WordPress applications.'
            ],

            [
                'icon' => 'fa-solid fa-chart-line',
                'subtitle' => 'Performance',
                'title' => 'Optimization & Maintenance',
                'description' => 'Website optimization, security hardening, bug fixing, database tuning, server deployment, monitoring, and long-term maintenance.'
            ]

        ];

        $aboutStats = [
            ['label' => 'Projects shipped', 'value' => 70 . '+'],
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
                'period' => 'August 2022 - July 2026',
                'location' => 'Banani, Dhaka, Bangladesh (Remote)',
                'current' => true,
                'description' => 'Developing and maintaining enterprise-level web applications using Laravel framework. Collaborating with cross-functional teams to deliver robust, scalable software solutions. Implementing best practices in code quality, security, and performance optimization while working remotely.',
            ],
            [
                'role' => 'Jr. Software Developer',
                'company' => 'Arobil Ltd',
                'period' => 'January 2022 - May 2022',
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
            'careerSummary' => 'Laravel Developer with 5+ years of experience building scalable SaaS platforms, AI-powered applications, CRM systems, REST APIs, automation workflows, and enterprise web solutions. Passionate about writing clean, maintainable code that solves real business problems.',
            'designation' => 'Laravel Developer | SaaS Engineer | AI Automation',
            'skills' => $skills,
            'projects' => $projects,
            'categories' => $categories,
            'services' => $services,
            'tools' => $tools,
            'highlights' => $highlights,
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
