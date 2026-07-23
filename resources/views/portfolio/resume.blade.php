@php
    $profileName = $profileName ?? 'Mokaddes Hosain';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $profileName }}'s resume — skills, experience, education, and portfolio.">
    <title>{{ $profileName }} | Resume</title>
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
        .glass { background: rgba(9, 12, 18, 0.72); backdrop-filter: blur(16px); border: 1px solid var(--line); }
        .section-title { background: linear-gradient(90deg, #f8fafc 0%, #cbd5e1 100%); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .eyebrow { font-family: 'JetBrains Mono', monospace; letter-spacing: 0.18em; }
        .btn-primary { background: linear-gradient(90deg, var(--amber) 0%, #f6c667 100%); color: #1a1204; box-shadow: 0 12px 30px rgba(242,169,59,0.22); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 16px 36px rgba(242,169,59,0.32); }
        .btn-ghost { border: 1px solid var(--line); background: rgba(255,255,255,0.03); }
        .btn-ghost:hover { border-color: rgba(242,169,59,0.35); background: rgba(255,255,255,0.06); }
        .nav-link { position: relative; }
        .nav-link::after {
            content:''; position:absolute; left:0; right:0; bottom:-6px; height:2px;
            background: linear-gradient(90deg, var(--amber), var(--green));
            transform: scaleX(0); transform-origin: left; transition: transform .25s ease;
        }
        .nav-link:hover::after { transform: scaleX(1); }
        #mobile-menu { transition: opacity .22s ease, transform .22s ease; }
        #mobile-menu.menu-hidden { opacity: 0; transform: translateY(-8px); pointer-events: none; }
        .timeline-dot { box-shadow: 0 0 0 4px rgba(242,169,59,0.14); }
        .reveal { opacity: 0; transform: translateY(16px); transition: opacity .5s ease, transform .5s ease; }
        .reveal.is-visible { opacity: 1; transform: translateY(0); }
        @media (prefers-reduced-motion: reduce) {
            .reveal { transition: opacity .3s ease; transform: none; }
        }
    </style>
</head>
<body class="overflow-x-hidden">

<header class="sticky top-0 z-50 border-b border-white/5 bg-slate-950/70 backdrop-blur-xl">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3.5 sm:px-6 lg:px-8">
        <a href="{{ route('frontend.index') }}" class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-amber-300 to-emerald-400 text-sm font-black text-slate-950">
                MH
            </div>
            <div>
                <div class="font-display text-base font-bold leading-none text-white">{{ $profileName }}</div>
                <div class="mt-1 eyebrow text-[10px] uppercase text-slate-500">Resume</div>
            </div>
        </a>

        <div class="hidden items-center gap-7 lg:flex">
            <a href="{{ route('frontend.index') }}#services" class="nav-link text-sm text-slate-300 transition hover:text-white">Services</a>
            <a href="{{ route('frontend.index') }}#about" class="nav-link text-sm text-slate-300 transition hover:text-white">About</a>
            <a href="{{ route('frontend.index') }}#projects" class="nav-link text-sm text-slate-300 transition hover:text-white">Projects</a>
            <a href="{{ route('resume') }}" class="nav-link text-sm text-white">Resume</a>
            <a href="{{ route('blog.index') }}" class="nav-link text-sm text-slate-300 transition hover:text-white">Blog</a>
            <a href="{{ route('frontend.index') }}#contact" class="nav-link text-sm text-slate-300 transition hover:text-white">Contact</a>
        </div>

        <div class="hidden items-center gap-3 lg:flex">
            <a href="{{ $resumeLink }}" class="btn-ghost rounded-full px-5 py-2.5 text-sm font-semibold text-white transition">
                Download PDF
            </a>
            <a href="{{ route('frontend.index') }}#contact" class="btn-primary rounded-full px-5 py-2.5 text-sm font-bold transition">
                Hire Me
            </a>
        </div>

        <button id="menu-btn" aria-label="Toggle menu" aria-expanded="false" class="flex h-10 w-10 items-center justify-center rounded-lg border border-white/10 text-white lg:hidden">
            <i class="fa-solid fa-bars" id="menu-icon"></i>
        </button>
    </nav>

    <div id="mobile-menu" class="menu-hidden absolute inset-x-0 top-full border-b border-white/5 bg-slate-950/95 px-4 py-5 backdrop-blur-xl lg:hidden">
        <div class="flex flex-col gap-1">
            <a href="{{ route('frontend.index') }}#services" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Services</a>
            <a href="{{ route('frontend.index') }}#about" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">About</a>
            <a href="{{ route('frontend.index') }}#projects" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Projects</a>
            <a href="{{ route('resume') }}" class="rounded-lg px-3 py-2.5 text-sm text-white bg-white/5">Resume</a>
            <a href="{{ route('blog.index') }}" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Blog</a>
            <a href="{{ route('frontend.index') }}#contact" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Contact</a>
        </div>
        <div class="mt-4 flex gap-3">
            <a href="{{ $resumeLink }}" class="btn-ghost flex-1 rounded-full px-4 py-2.5 text-center text-sm font-semibold text-white">Download PDF</a>
            <a href="{{ route('frontend.index') }}#contact" class="btn-primary flex-1 rounded-full px-4 py-2.5 text-center text-sm font-bold">Hire Me</a>
        </div>
    </div>
</header>

<main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">

    <!-- Profile strip -->
    <section class="glass reveal flex flex-col items-center gap-6 rounded-2xl p-7 text-center sm:p-9 lg:flex-row lg:items-center lg:text-left">
        <img src="{{ $profileImage }}" alt="{{ $profileName }}" class="h-28 w-28 shrink-0 rounded-full object-cover ring-4 ring-amber-400/20 ring-offset-4 ring-offset-[#0f141c] sm:h-32 sm:w-32">
        <div class="min-w-0 flex-1">
            <p class="eyebrow text-xs uppercase text-amber-300">Resume</p>
            <h1 class="mt-2 font-display text-3xl font-bold text-white sm:text-4xl">{{ $profileName }}</h1>
            <p class="mt-1 text-sm uppercase tracking-[0.18em] text-slate-400">{{ $designation }}</p>
            <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base">{{ $careerSummary }}</p>
            <div class="mt-5 flex flex-wrap justify-center gap-3 lg:justify-start">
                @foreach($contactCards as $card)
                    <a href="{{ $card['href'] }}" target="{{ str_starts_with($card['href'], 'http') ? '_blank' : '_self' }}" rel="noopener" class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3.5 py-2 text-xs text-slate-200 transition hover:border-amber-400/30 hover:bg-white/10">
                        <i class="{{ $card['icon'] }} text-amber-300"></i>
                        {{ $card['value'] }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex w-full shrink-0 gap-3 lg:w-auto">
            <a href="{{ $resumeLink }}" class="btn-primary flex-1 rounded-full px-6 py-3 text-center text-sm font-bold transition lg:flex-none">
                <i class="fa-solid fa-download mr-1.5"></i> Download PDF
            </a>
        </div>
    </section>

    <div class="mt-8 grid gap-8 lg:grid-cols-[0.85fr_1.15fr]">
        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="glass reveal rounded-2xl p-7">
                <p class="eyebrow text-xs uppercase text-amber-300">Skills</p>
                <h2 class="mt-2 font-display text-xl font-bold text-white">Technical skills</h2>
                <div class="mt-5 flex flex-wrap gap-2.5">
                    @foreach($skills as $skill)
                        <span class="rounded-full border border-white/10 bg-white/5 px-3.5 py-1.5 text-sm text-slate-200">{{ $skill->name }}</span>
                    @endforeach
                </div>

                @php
                    $aiKeywords = ['ai', 'openai', 'prompt', 'rag', 'vector'];
                    $aiSkills = collect($skills)->filter(function ($skill) use ($aiKeywords) {
                        $name = strtolower($skill->name);
                        foreach ($aiKeywords as $keyword) {
                            if (str_contains($name, $keyword)) return true;
                        }
                        return false;
                    });
                @endphp
                @if($aiSkills->count())
                    <h3 class="mt-6 font-display text-base font-bold text-white">AI-related skills</h3>
                    <div class="mt-3 flex flex-wrap gap-2.5">
                        @foreach($aiSkills as $skill)
                            <span class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3.5 py-1.5 text-sm text-amber-100">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="glass reveal rounded-2xl p-7">
                <p class="eyebrow text-xs uppercase text-amber-300">Education</p>
                <h2 class="mt-2 font-display text-xl font-bold text-white">Academic background</h2>
                <div class="mt-5 space-y-4">
                    @foreach($educations as $education)
                        <div class="rounded-xl border border-white/10 bg-slate-950/50 p-4">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <div class="font-semibold text-white">{{ $education->degree }}</div>
                                <div class="font-mono text-[11px] uppercase tracking-[0.2em] text-slate-500">{{ $education->year }}</div>
                            </div>
                            <div class="mt-1 text-sm text-slate-300">{{ $education->institution }}</div>
                            <div class="mt-2 font-mono text-sm text-emerald-300">CGPA {{ $education->cgpa }} / {{ $education->out_of_cgpa }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            @if(!empty($personalDetails))
                <div class="glass reveal rounded-2xl p-7">
                    <p class="eyebrow text-xs uppercase text-amber-300">Personal details</p>
                    <h2 class="mt-2 font-display text-xl font-bold text-white">Quick facts</h2>
                    <div class="mt-5 space-y-3">
                        @foreach($personalDetails as $detail)
                            <div class="flex items-center gap-3 rounded-xl border border-white/10 bg-slate-950/50 px-4 py-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white/5 text-amber-300">
                                    <i class="{{ $detail['icon'] }}"></i>
                                </div>
                                <div class="min-w-0">
                                    <div class="text-[11px] uppercase tracking-[0.15em] text-slate-500">{{ $detail['label'] }}</div>
                                    <div class="truncate text-sm font-semibold text-white">{{ $detail['value'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Main column -->
        <div class="space-y-6">
            <div class="glass reveal rounded-2xl p-7 sm:p-8">
                <p class="eyebrow text-xs uppercase text-amber-300">Summary</p>
                <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">What I bring to a team or client</h2>
                <div class="mt-5 grid gap-4 md:grid-cols-2">
                    <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                        <div class="font-semibold text-white">Laravel and SaaS delivery</div>
                        <p class="mt-2 text-sm leading-7 text-slate-400">I build maintainable systems, stable dashboards, and business software that can grow with the product.</p>
                    </div>
                    <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                        <div class="font-semibold text-white">AI and automation</div>
                        <p class="mt-2 text-sm leading-7 text-slate-400">I can add AI-assisted features, workflow automation, and smarter content processing to existing products.</p>
                    </div>
                    <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                        <div class="font-semibold text-white">Business thinking</div>
                        <p class="mt-2 text-sm leading-7 text-slate-400">I focus on clarity, delivery, and features that help users actually get work done faster.</p>
                    </div>
                    <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                        <div class="font-semibold text-white">Communication</div>
                        <p class="mt-2 text-sm leading-7 text-slate-400">I work well with clients and teams, keeping updates clear and expectations realistic.</p>
                    </div>
                </div>
            </div>

            @if(!empty($experiences))
                <div class="glass reveal rounded-2xl p-7 sm:p-8">
                    <p class="eyebrow text-xs uppercase text-amber-300">Experience</p>
                    <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">Professional experience</h2>
                    <div class="relative mt-6 space-y-6 border-l border-white/10 pl-6">
                        @foreach($experiences as $exp)
                            <div class="relative">
                                <span class="timeline-dot absolute -left-[27px] top-1.5 h-3 w-3 rounded-full {{ !empty($exp['current']) ? 'bg-emerald-400' : 'bg-slate-500' }}"></span>
                                <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <h3 class="font-display text-lg font-bold text-white">{{ $exp['role'] }}</h3>
                                        @if(!empty($exp['current']))
                                            <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-emerald-200">Current</span>
                                        @endif
                                    </div>
                                    <div class="mt-1 text-sm font-semibold text-amber-200">{{ $exp['company'] }}</div>
                                    <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 font-mono text-[11px] text-slate-500">
                                        <span><i class="fa-regular fa-calendar mr-1"></i>{{ $exp['period'] }}</span>
                                        <span><i class="fa-solid fa-location-dot mr-1"></i>{{ $exp['location'] }}</span>
                                    </div>
                                    <p class="mt-3 text-sm leading-7 text-slate-400">{{ $exp['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="glass reveal rounded-2xl p-7 sm:p-8">
                <p class="eyebrow text-xs uppercase text-amber-300">Portfolio</p>
                <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">Selected work by category</h2>
                <div class="mt-6 space-y-5">
                    @foreach($categories as $category)
                        @php $categoryProjects = $projects->where('category_id', $category->id); @endphp
                        @if($categoryProjects->count())
                            <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                                <div class="text-sm font-semibold text-white">{{ $category->name }}</div>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @foreach($categoryProjects as $project)
                                        <a href="{{ route('projects.study-case', $project) }}" class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3.5 py-1.5 text-xs text-slate-200 transition hover:border-amber-400/30 hover:bg-white/10">
                                            {{ $project->name }}
                                            <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-amber-300"></i>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            @if($personalQualities->count())
                <div class="glass reveal rounded-2xl p-7 sm:p-8">
                    <p class="eyebrow text-xs uppercase text-amber-300">Why hire me</p>
                    <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">Working style</h2>
                    <div class="mt-5 grid gap-3 md:grid-cols-2">
                        @foreach($personalQualities->take(6) as $quality)
                            <div class="rounded-xl border border-white/10 bg-slate-950/50 p-4">
                                <div class="font-semibold text-white">{{ $quality->title ?? $quality->name }}</div>
                                <div class="mt-2 text-sm leading-7 text-slate-400">{{ $quality->description }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</main>

<footer class="border-t border-white/5 bg-slate-950/80">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-8 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
        <div>
            <div class="font-display text-xl font-bold text-white">{{ $profileName }}</div>
            <p class="mt-2 text-sm text-slate-400">{{ $profileTitle }}</p>
        </div>
        <a href="{{ route('frontend.index') }}" class="btn-ghost w-fit rounded-full px-5 py-2.5 text-sm font-semibold text-white transition">
            Back to portfolio
        </a>
    </div>
</footer>

<script>
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
        }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
        items.forEach(function (el) { io.observe(el); });
    })();
</script>
</body>
</html>
