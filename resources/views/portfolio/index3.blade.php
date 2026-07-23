@php
    use Illuminate\Support\Str;

    $profileName = $profileName ?? 'Mokaddes Hosain';
    $profileTitle = $profileTitle ?? 'Laravel Developer | SaaS | Automation';
    $featuredProjects = collect($projects ?? [])->take(6);
    $featuredBlogs = collect($blogs ?? [])->take(3);
    $firstProject = $featuredProjects->first();
    $profileHighlights = [
        'Laravel, SaaS, and business software delivery',
        'AI-assisted workflows and automation',
        'Database-driven portfolio and content systems',
    ];

    // Floating WhatsApp button — reuses whichever contact card is WhatsApp, no hardcoded number.
    $whatsappCard = collect($contactCards ?? [])->first(function ($card) {
        return Str::contains(strtolower($card['label'] ?? ''), 'whatsapp');
    });
    $whatsappHref = $whatsappCard['href'] ?? '#contact';

    // Signature terminal element — built from real data, not decoration.
    $terminalLines = collect([
        '$ whoami',
        ($profileName ?? 'Developer').' — '.($designation ?? 'Laravel Developer'),
        '$ php artisan projects:list --shipped',
    ])
        ->merge($featuredProjects->take(3)->map(fn ($p) => '✓ shipped  '.$p->name))
        ->push('$ echo $AVAILABILITY')
        ->push('open for freelance, contract & remote work')
        ->values()
        ->all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Content-driven Laravel portfolio with live projects, services, about details, and blog articles.">
    <meta name="author" content="{{ $profileName }}">
    <title>{{ $profileName }} | Portfolio</title>
    <link rel="shortcut icon" href="{{ asset('images/mkds.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700;800&family=Manrope:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'ui-sans-serif', 'system-ui'],
                        display: ['Sora', 'ui-sans-serif', 'system-ui'],
                        mono: ['"JetBrains Mono"', 'ui-monospace', 'SFMono-Regular'],
                    },
                }
            }
        }
    </script>
    <style>
        :root {
            --ink-950: #090c12;
            --ink-900: #0f141c;
            --line: rgba(148,163,184,0.14);
            --paper: #f4f6f8;
            --amber: #f2a93b;
            --amber-soft: rgba(242,169,59,0.14);
            --green: #34d399;
            --muted: #8a97a8;
        }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Manrope', ui-sans-serif, system-ui;
            background:
                radial-gradient(circle at 12% 8%, rgba(242,169,59,0.10), transparent 32%),
                radial-gradient(circle at 88% 6%, rgba(52,211,153,0.08), transparent 30%),
                linear-gradient(180deg, var(--ink-950) 0%, #0b101a 45%, var(--ink-950) 100%);
            color: var(--paper);
        }
        .glass {
            background: rgba(9, 12, 18, 0.72);
            backdrop-filter: blur(16px);
            border: 1px solid var(--line);
        }
        .section-title {
            background: linear-gradient(90deg, #f8fafc 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .grid-glow {
            background-image:
                linear-gradient(rgba(148,163,184,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148,163,184,0.05) 1px, transparent 1px);
            background-size: 56px 56px;
            mask-image: linear-gradient(to bottom, rgba(0,0,0,.8), transparent 92%);
        }
        .eyebrow { font-family: 'JetBrains Mono', monospace; letter-spacing: 0.18em; }
        .btn-primary {
            background: linear-gradient(90deg, var(--amber) 0%, #f6c667 100%);
            color: #1a1204;
            box-shadow: 0 12px 30px rgba(242,169,59,0.22);
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 16px 36px rgba(242,169,59,0.32); }
        .btn-ghost { border: 1px solid var(--line); background: rgba(255,255,255,0.03); }
        .btn-ghost:hover { border-color: rgba(242,169,59,0.35); background: rgba(255,255,255,0.06); }
        .status-dot { box-shadow: 0 0 0 4px rgba(52,211,153,0.16); }

        /* Terminal signature */
        .term {
            font-family: 'JetBrains Mono', monospace;
            background: #0b0f16;
            border: 1px solid var(--line);
        }
        .term-topbar span { display:inline-block; width:10px; height:10px; border-radius:999px; }
        .term-line { opacity: 0; white-space: pre-wrap; word-break: break-word; }
        .term-cursor {
            display:inline-block; width:7px; height:1em; background:var(--amber);
            margin-left:2px; vertical-align:text-bottom; animation: blink 1s step-end infinite;
        }
        @keyframes blink { 0%,100% { opacity:1 } 50% { opacity:0 } }

        /* Scroll reveal */
        .reveal { opacity: 0; transform: translateY(18px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.is-visible { opacity: 1; transform: translateY(0); }

        .orb { position:absolute; border-radius:9999px; filter: blur(70px); pointer-events:none; }
        .orb-anim { animation: drift 14s ease-in-out infinite alternate; }
        @keyframes drift { from { transform: translate(0,0);} to { transform: translate(18px,-14px);} }

        .nav-link { position: relative; }
        .nav-link::after {
            content:''; position:absolute; left:0; right:0; bottom:-6px; height:2px;
            background: linear-gradient(90deg, var(--amber), var(--green));
            transform: scaleX(0); transform-origin: left; transition: transform .25s ease;
        }
        .nav-link:hover::after { transform: scaleX(1); }

        #mobile-menu { transition: opacity .22s ease, transform .22s ease; }
        #mobile-menu.menu-hidden { opacity: 0; transform: translateY(-8px); pointer-events: none; }

        @media (prefers-reduced-motion: reduce) {
            .orb-anim, .term-cursor { animation: none; }
            .reveal { transition: opacity .3s ease; transform: none; }
        }

        /* Mobile slider tracks (Services / Projects) */
        .no-scrollbar { scrollbar-width: none; -ms-overflow-style: none; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="overflow-x-hidden">
<div class="fixed inset-0 pointer-events-none grid-glow"></div>

<header class="sticky top-0 z-50 border-b border-white/5 bg-slate-950/70 backdrop-blur-xl">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3.5 sm:px-6 lg:px-8">
        <a href="{{ route('frontend.index') }}" class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-amber-300 to-emerald-400 text-sm font-black text-slate-950">
                MH
            </div>
            <div>
                <div class="font-display text-base font-bold leading-none text-white">{{ $profileName }}</div>
                <div class="mt-1 eyebrow text-[10px] uppercase text-slate-500">Portfolio</div>
            </div>
        </a>

        <div class="hidden items-center gap-7 lg:flex">
            <a href="#services" class="nav-link text-sm text-slate-300 transition hover:text-white">Services</a>
            <a href="#about" class="nav-link text-sm text-slate-300 transition hover:text-white">About</a>
            <a href="#projects" class="nav-link text-sm text-slate-300 transition hover:text-white">Projects</a>
            <a href="{{ route('resume') }}" class="nav-link text-sm text-slate-300 transition hover:text-white">Resume</a>
            <a href="{{ route('blog.index') }}" class="nav-link text-sm text-slate-300 transition hover:text-white">Blog</a>
            <a href="#contact" class="nav-link text-sm text-slate-300 transition hover:text-white">Contact</a>
        </div>

        <div class="hidden items-center gap-3 lg:flex">
            <a href="{{ $resumeLink }}" target="_blank" rel="noopener" class="btn-ghost rounded-full px-5 py-2.5 text-sm font-semibold text-white transition">
                Download Resume
            </a>
            <a href="#contact" class="btn-primary rounded-full px-5 py-2.5 text-sm font-bold transition">
                Hire Me
            </a>
        </div>

        <button id="menu-btn" aria-label="Toggle menu" aria-expanded="false" class="flex h-10 w-10 items-center justify-center rounded-lg border border-white/10 text-white lg:hidden">
            <i class="fa-solid fa-bars" id="menu-icon"></i>
        </button>
    </nav>

    <div id="mobile-menu" class="menu-hidden absolute inset-x-0 top-full border-b border-white/5 bg-slate-950/95 px-4 py-5 backdrop-blur-xl lg:hidden">
        <div class="flex flex-col gap-1">
            <a href="#services" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Services</a>
            <a href="#about" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">About</a>
            <a href="#projects" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Projects</a>
            <a href="{{ route('resume') }}" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Resume</a>
            <a href="{{ route('blog.index') }}" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Blog</a>
            <a href="#contact" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Contact</a>
        </div>
        <div class="mt-4 flex gap-3">
            <a href="{{ $resumeLink }}" target="_blank" rel="noopener" class="btn-ghost flex-1 rounded-full px-4 py-2.5 text-center text-sm font-semibold text-white">Resume</a>
            <a href="#contact" class="btn-primary flex-1 rounded-full px-4 py-2.5 text-center text-sm font-bold">Hire Me</a>
        </div>
    </div>
</header>

<main>
    <!-- HERO — short and to the point -->
    <section id="home" class="relative overflow-hidden">
        <div class="orb orb-anim h-64 w-64 bg-amber-400/20" style="top:4rem; left:-4rem;"></div>
        <div class="orb orb-anim h-72 w-72 bg-emerald-400/15" style="top:6rem; right:-4rem; animation-delay:2s;"></div>

        <div class="mx-auto grid max-w-7xl gap-8 px-4 pb-16 pt-10 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:gap-10 lg:px-8 lg:pb-20 lg:pt-14">
            <div class="relative z-10 order-2 reveal lg:order-1">
                <div class="mb-5 inline-flex items-center gap-2.5 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3.5 py-1.5 eyebrow text-xs text-emerald-200">
                    <span class="status-dot h-2 w-2 rounded-full bg-emerald-300"></span>
                    Available for freelance & remote work
                </div>

                <h1 class="font-display max-w-xl text-4xl font-bold leading-[1.1] text-white sm:text-5xl lg:text-[3.25rem]">
                    Laravel systems and SaaS products, <span class="section-title">shipped and maintained.</span>
                </h1>

                <p class="mt-5 max-w-lg text-base leading-7 text-slate-300 sm:text-lg" style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">
                    {{ $careerSummary }}
                </p>

                <div class="mt-7 flex flex-wrap items-center gap-4">
                    <a href="#projects" class="btn-primary rounded-full px-6 py-3 text-sm font-bold transition">
                        View Projects
                    </a>
                    <a href="{{ $resumeLink }}" target="_blank" rel="noopener" class="btn-ghost rounded-full px-6 py-3 text-sm font-semibold text-white transition">
                        Download Resume
                    </a>
                    <a href="#contact" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-300 transition hover:text-amber-300">
                        Contact me <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>

                <div class="mt-9 flex flex-wrap items-center gap-x-8 gap-y-4 border-t border-white/5 pt-6">
                    @foreach($aboutStats as $stat)
                        <div>
                            <div class="font-mono text-2xl font-bold text-white">{{ $stat['value'] }}</div>
                            <div class="mt-1 text-xs text-slate-400">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative z-10 order-1 reveal lg:order-2" style="transition-delay:120ms">
                <!-- Signature element: profile photo + live-feeling terminal built from real project data -->
                <div class="term overflow-hidden rounded-2xl shadow-2xl">
                    <div class="flex flex-col items-center gap-3 bg-white/[0.02] px-6 pb-6 pt-8">
                        <div class="h-28 w-28 shrink-0 overflow-hidden rounded-full ring-4 ring-amber-400/20 ring-offset-4 ring-offset-[#0b0f16] sm:h-32 sm:w-32">
                            <img src="{{ asset('assets/images/hero.png') }}" alt="{{ $profileName }}" class="h-full w-full object-cover object-top">
                        </div>
                        <div class="text-center">
                            <div class="font-display text-base font-bold text-white">{{ $profileName }}</div>
                            <div class="mt-0.5 text-xs text-slate-400">{{ $designation ?? $profileTitle }}</div>
                        </div>
                    </div>
                    <div class="term-topbar flex items-center gap-2 border-y border-white/5 bg-white/[0.02] px-4 py-3">
                        <span class="bg-rose-400/70"></span>
                        <span class="bg-amber-300/70"></span>
                        <span class="bg-emerald-400/70"></span>
                        <span class="ml-3 text-xs text-slate-500">status.sh</span>
                    </div>
                    <div id="terminal-body" class="h-52 overflow-y-auto px-5 py-5 text-[13px] leading-7 text-slate-300 sm:h-56 sm:text-sm"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mb-10 max-w-2xl reveal">
            <p class="eyebrow text-xs uppercase text-amber-300">Services</p>
            <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Service areas backed by real project categories.</h2>
        </div>
        <div id="services-slider" class="no-scrollbar -mx-4 flex snap-x snap-mandatory gap-5 overflow-x-auto px-4 pb-2 md:mx-0 md:grid md:snap-none md:gap-6 md:overflow-visible md:px-0 md:grid-cols-2 xl:grid-cols-3">
            @foreach($services as $service)
                <article class="glass reveal w-[82%] shrink-0 snap-center rounded-2xl p-6 transition duration-300 hover:-translate-y-1.5 hover:border-amber-400/25 md:w-auto md:shrink" style="transition-delay:{{ $loop->index * 60 }}ms">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/5 text-amber-300">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                        <div class="rounded-full border border-white/10 bg-white/5 px-3 py-1 font-mono text-[11px] text-slate-300">{{ $service['subtitle'] }}</div>
                    </div>
                    <h3 class="mt-5 font-display text-xl font-bold text-white">{{ $service['title'] }}</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-400">{{ $service['description'] }}</p>
                </article>
            @endforeach
        </div>
        <div id="services-dots" class="mt-4 flex justify-center gap-1.5 md:hidden"></div>
    </section>

    <section id="about" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="glass reveal rounded-2xl p-7 sm:p-8">
                <p class="eyebrow text-xs uppercase text-amber-300">About</p>
                <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">A practical Laravel builder with product thinking.</h2>
                <p class="mt-5 text-base leading-8 text-slate-300 sm:text-lg">
                    I focus on making business software understandable, maintainable, and ready for growth — systems that are easy to extend later, not just code that ships once.
                </p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    @foreach($personalQualities->take(4) as $quality)
                        <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                            <div class="text-sm font-semibold text-white">{{ $quality->title ?? $quality->name ?? 'Quality' }}</div>
                            <div class="mt-1 text-sm leading-6 text-slate-400">{{ $quality->description }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="space-y-6">
                <div class="glass reveal rounded-2xl p-7 sm:p-8">
                    <div class="flex items-center justify-between gap-4">
                        <h3 class="font-display text-xl font-bold text-white">Skills and tools</h3>
                        <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 font-mono text-[11px] text-slate-300">{{ $skills->count() }} skills / {{ $tools->count() }} tools</span>
                    </div>
                    <div class="mt-5 flex flex-wrap gap-2.5">
                        @foreach($skills->take(12) as $skill)
                            <span class="rounded-full border border-white/10 bg-white/5 px-3.5 py-1.5 text-sm text-slate-200">{{ $skill->name }}</span>
                        @endforeach
                        @foreach($tools->take(8) as $tool)
                            <span class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3.5 py-1.5 text-sm text-amber-100">{{ $tool->name }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="glass reveal rounded-2xl p-7 sm:p-8">
                    <h3 class="font-display text-xl font-bold text-white">Education</h3>
                    <div class="mt-5 space-y-4">
                        @foreach($educations as $education)
                            <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <div class="font-semibold text-white">{{ $education->degree }}</div>
                                    <div class="font-mono text-[11px] uppercase tracking-[0.2em] text-slate-400">{{ $education->year }}</div>
                                </div>
                                <div class="mt-1 text-sm text-slate-300">{{ $education->institution }}</div>
                                <div class="mt-2 font-mono text-sm text-emerald-300">CGPA {{ $education->cgpa }} / {{ $education->out_of_cgpa }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mb-10 flex flex-col gap-4 reveal sm:flex-row sm:items-end sm:justify-between">
            <div class="max-w-2xl">
                <p class="eyebrow text-xs uppercase text-amber-300">Projects</p>
                <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Study cases generated from the projects table.</h2>
            </div>
            <a href="{{ route('blog.index') }}" class="btn-ghost w-fit rounded-full px-5 py-2.5 text-sm font-semibold text-white transition">
                Read the blog
            </a>
        </div>

        <div id="projects-slider" class="no-scrollbar -mx-4 flex snap-x snap-mandatory gap-5 overflow-x-auto px-4 pb-2 md:mx-0 md:grid md:snap-none md:gap-6 md:overflow-visible md:px-0 md:grid-cols-2 xl:grid-cols-3">
            @forelse($featuredProjects as $project)
                <article class="glass reveal group w-[82%] shrink-0 snap-center overflow-hidden rounded-2xl transition duration-300 hover:-translate-y-1.5 hover:border-amber-400/25 md:w-auto md:shrink" style="transition-delay:{{ $loop->index * 60 }}ms">
                    <div class="flex h-52 items-center justify-center overflow-hidden bg-white">
                        <img src="{{ asset($project->image) }}" alt="{{ $project->name }}" class="h-full w-full object-contain p-6 transition duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between gap-3">
                            <p class="eyebrow text-[11px] uppercase text-amber-300">{{ $project->category->name ?? 'Project' }}</p>
                            @if($project->is_featured)
                                <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-[11px] font-semibold text-emerald-200">Featured</span>
                            @endif
                        </div>
                        <h3 class="mt-4 font-display text-xl font-bold text-white">{{ $project->name }}</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-400">{{ $project->short_description }}</p>
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach(collect($project->technologies ?? [])->take(4) as $tech)
                                <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 font-mono text-[11px] text-slate-200">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <div class="mt-6 flex items-center gap-3">
                            <a href="{{ route('projects.study-case', $project) }}" class="btn-primary rounded-full px-4 py-2 text-sm font-bold">
                                Study case
                            </a>
                            @if($project->url)
                                <a href="{{ $project->url }}" target="_blank" rel="noopener" class="btn-ghost rounded-full px-4 py-2 text-sm font-semibold text-white transition">
                                    Live site
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="glass rounded-2xl p-8 text-slate-300">No projects found.</div>
            @endforelse
        </div>
        <div id="projects-dots" class="mt-4 flex justify-center gap-1.5 md:hidden"></div>
    </section>

    <section class="hidden md:block mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="glass reveal rounded-2xl p-7 sm:p-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <p class="eyebrow text-xs uppercase text-amber-300">Blog preview</p>
                    <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">The blog lives on its own page now.</h2>
                    <p class="mt-4 text-base leading-7 text-slate-300 sm:text-lg">A quick preview here — full articles are on a separate page, stored in the database.</p>
                </div>
                <a href="{{ route('blog.index') }}" class="btn-ghost w-fit rounded-full px-5 py-2.5 text-sm font-semibold text-white transition">
                    View all posts
                </a>
            </div>

            <div class="mt-8 grid gap-6 md:grid-cols-3">
                @forelse($featuredBlogs as $blog)
                    <article class="rounded-xl border border-white/10 bg-slate-950/45 p-6 transition duration-300 hover:-translate-y-1 hover:border-amber-400/20">
                        <div class="eyebrow text-[11px] uppercase text-amber-300">{{ $blog->category ?? 'Article' }}</div>
                        <h3 class="mt-4 font-display text-xl font-bold text-white">{{ $blog->title }}</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-400">{{ $blog->excerpt }}</p>
                        <a href="{{ route('blog.show', $blog) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-amber-200">
                            Read article
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </article>
                @empty
                    <div class="rounded-xl border border-white/10 bg-slate-950/45 p-6 text-slate-300">No blog posts found.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="contact" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[1fr_0.9fr]">
            <div class="glass reveal rounded-2xl p-7 sm:p-8">
                <p class="eyebrow text-xs uppercase text-amber-300">Contact</p>
                <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Let&apos;s build something useful together.</h2>
                <p class="mt-5 max-w-2xl text-base leading-7 text-slate-300 sm:text-lg">
                    Need Laravel development, project structure, or a database-driven portfolio and blog? Send a message and I&apos;ll reply.
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    @foreach($contactCards as $card)
                        <a href="{{ $card['href'] }}" target="{{ str_starts_with($card['href'], 'http') ? '_blank' : '_self' }}" rel="noopener" class="rounded-xl border border-white/10 bg-slate-950/45 p-5 transition hover:-translate-y-1 hover:border-amber-400/25 hover:bg-white/10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/5 text-amber-300">
                                    <i class="{{ $card['icon'] }}"></i>
                                </div>
                                <div class="min-w-0">
                                    <div class="eyebrow text-[10px] uppercase text-slate-500">{{ $card['label'] }}</div>
                                    <div class="mt-1 truncate text-sm font-semibold text-white">{{ $card['value'] }}</div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="glass reveal rounded-2xl p-7 sm:p-8" style="transition-delay:120ms">
                <h3 class="font-display text-xl font-bold text-white">Send a message</h3>
                <form action="{{ route('contact') }}" method="post" class="mt-6 space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-300">Name</label>
                        <input id="name" name="name" type="text" class="w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-white outline-none transition focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20">
                    </div>
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-300">Email</label>
                        <input id="email" name="email" type="email" required class="w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-white outline-none transition focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20">
                    </div>
                    <div>
                        <label for="message" class="mb-2 block text-sm font-semibold text-slate-300">Message</label>
                        <textarea id="message" name="message" rows="6" required class="w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-white outline-none transition focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full rounded-xl px-5 py-3.5 text-sm font-bold transition">
                        Send message
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-white/5 bg-slate-950/80">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-8 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
        <div>
            <div class="font-display text-xl font-bold text-white">{{ $profileName }}</div>
            <p class="mt-2 text-sm text-slate-400">{{ $profileTitle }}</p>
        </div>
        <div class="flex flex-wrap gap-4 text-sm text-slate-400">
            <a href="#services" class="transition hover:text-white">Services</a>
            <a href="#about" class="transition hover:text-white">About</a>
            <a href="#projects" class="transition hover:text-white">Projects</a>
            <a href="{{ route('blog.index') }}" class="transition hover:text-white">Blog</a>
            <a href="#contact" class="transition hover:text-white">Contact</a>
        </div>
    </div>
</footer>

<a
    href="{{ $whatsappHref }}"
    target="{{ str_starts_with($whatsappHref, 'http') ? '_blank' : '_self' }}"
    rel="noopener"
    aria-label="Chat on WhatsApp"
    class="fixed bottom-5 right-5 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500 text-white shadow-2xl shadow-emerald-500/30 transition hover:scale-105 hover:bg-emerald-400"
>
    <span class="motion-reduce:animate-none absolute inset-0 -z-10 animate-ping rounded-full bg-emerald-400/40"></span>
    <i class="fa-brands fa-whatsapp text-2xl"></i>
</a>

<script>
    // Mobile menu toggle
    (function () {
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');
        if (!btn || !menu) return;
        btn.addEventListener('click', function () {
            const isOpen = !menu.classList.contains('menu-hidden');
            menu.classList.toggle('menu-hidden');
            btn.setAttribute('aria-expanded', String(!isOpen));
            icon.className = isOpen ? 'fa-solid fa-bars' : 'fa-solid fa-xmark';
        });
        menu.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', function () {
                menu.classList.add('menu-hidden');
                btn.setAttribute('aria-expanded', 'false');
                icon.className = 'fa-solid fa-bars';
            });
        });
    })();

    // Scroll reveal
    (function () {
        const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const items = document.querySelectorAll('.reveal');
        if (reduced || !('IntersectionObserver' in window)) {
            items.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }
        const io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        items.forEach(function (el) { io.observe(el); });
    })();

    // Terminal signature — typewriter over real project/status data
    (function () {
        const body = document.getElementById('terminal-body');
        if (!body) return;
        const lines = @json($terminalLines);
        const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (reduced) {
            body.innerHTML = lines.map(function (l) {
                return '<div>' + l.replace(/</g, '&lt;') + '</div>';
            }).join('');
            return;
        }

        let i = 0;
        function typeLine() {
            if (i >= lines.length) { i = 0; body.innerHTML = ''; }
            const div = document.createElement('div');
            div.className = 'term-line';
            div.style.opacity = '1';
            body.appendChild(div);
            const text = lines[i];
            let c = 0;
            const isCmd = text.startsWith('$');
            if (isCmd) div.style.color = '#f2a93b';
            (function typeChar() {
                if (c <= text.length) {
                    div.textContent = text.slice(0, c);
                    c++;
                    body.scrollTop = body.scrollHeight;
                    setTimeout(typeChar, 18);
                } else {
                    div.innerHTML += '<span class="term-cursor"></span>';
                    body.scrollTop = body.scrollHeight;
                    setTimeout(function () {
                        const cursor = div.querySelector('.term-cursor');
                        if (cursor) cursor.remove();
                        i++;
                        setTimeout(typeLine, 260);
                    }, 700);
                }
            })();
        }
        typeLine();
    })();

    // Slider dot indicators (Services / Projects) — mobile only
    (function () {
        function setupDots(sliderId, dotsId) {
            const slider = document.getElementById(sliderId);
            const dotsWrap = document.getElementById(dotsId);
            if (!slider || !dotsWrap) return;
            const items = Array.from(slider.children).filter(function (el) { return el.tagName === 'ARTICLE'; });
            if (items.length <= 1) return;

            items.forEach(function (item, idx) {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.setAttribute('aria-label', 'Go to slide ' + (idx + 1));
                dot.className = 'h-1.5 w-1.5 rounded-full bg-white/20 transition-all duration-300';
                dot.addEventListener('click', function () {
                    item.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                });
                dotsWrap.appendChild(dot);
            });

            const dots = Array.from(dotsWrap.children);
            function updateActive() {
                const center = slider.scrollLeft + slider.clientWidth / 2;
                let closest = 0;
                let closestDist = Infinity;
                items.forEach(function (item, idx) {
                    const dist = Math.abs((item.offsetLeft + item.offsetWidth / 2) - center);
                    if (dist < closestDist) { closestDist = dist; closest = idx; }
                });
                dots.forEach(function (dot, idx) {
                    if (idx === closest) {
                        dot.style.width = '18px';
                        dot.classList.add('bg-amber-400');
                        dot.classList.remove('bg-white/20');
                    } else {
                        dot.style.width = '6px';
                        dot.classList.remove('bg-amber-400');
                        dot.classList.add('bg-white/20');
                    }
                });
            }

            let raf;
            slider.addEventListener('scroll', function () {
                cancelAnimationFrame(raf);
                raf = requestAnimationFrame(updateActive);
            }, { passive: true });
            window.addEventListener('resize', updateActive);
            updateActive();
        }

        setupDots('services-slider', 'services-dots');
        setupDots('projects-slider', 'projects-dots');
    })();
</script>
</body>
</html>
