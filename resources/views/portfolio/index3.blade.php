@extends('layouts.portfolio')

@php
    use Illuminate\Support\Str;

    $featuredProjects = collect($projects ?? [])->where('is_featured', true);
    $featuredBlogs = collect($blogs ?? [])->take(3);
    $firstProject = $featuredProjects->first();
    $profileHighlights = [
        'Laravel, SaaS, and business software delivery',
        'AI-assisted workflows and automation',
        'Database-driven portfolio and content systems',
    ];

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

@section('title', $settings?->meta_title ?: ($profileName.' | Portfolio'))
@section('meta_description', $settings?->meta_description ?: 'Content-driven Laravel portfolio with live projects, services, about details, and blog articles.')
@section('header_tag', 'Portfolio')

@section('content')
    <section id="home" class="relative overflow-hidden">
        <div class="orb orb-anim h-64 w-64 bg-amber-400/20" style="top:4rem; left:-4rem;"></div>
        <div class="orb orb-anim h-72 w-72 bg-emerald-400/15" style="top:6rem; right:-4rem; animation-delay:2s;"></div>

        <div class="mx-auto grid max-w-7xl gap-8 px-4 pb-12 pt-8 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:gap-10 lg:px-8 lg:pb-16 lg:pt-10">
            <div class="relative z-10 order-2 reveal lg:order-1">
                <div class="mb-5 inline-flex items-center gap-2.5 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3.5 py-1.5 eyebrow text-xs text-emerald-200">
                    <span class="status-dot h-2 w-2 rounded-full bg-emerald-300"></span>
                    Available for Full-time, Remote & Freelance Opportunities
                </div>

                <h2 class="font-display max-w-xl text-3xl font-bold leading-[1.15] text-white sm:text-4xl lg:text-5xl">
                    Senior Laravel Developer Building Scalable SaaS & AI-Powered Web Applications
                </h2>

                <p class="mt-4 max-w-lg text-sm leading-6 text-slate-300 sm:text-base" style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">
                    {{ $careerSummary }}
                </p>

                <div class="mt-5 flex flex-wrap items-center gap-3">
                    <a href="#projects" class="btn-primary rounded-full px-6 py-3 text-sm font-bold transition">
                        Explore My Work
                    </a>
                    <a href="{{ $resumeLink }}" target="_blank" rel="noopener" class="btn-ghost rounded-full px-6 py-3 text-sm font-semibold text-white transition">
                        Download CV
                    </a>
                    <a href="#contact" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-300 transition hover:text-amber-300">
                        Let's Connect <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>

                <div class="mt-7 flex flex-wrap items-center gap-x-6 gap-y-3 border-t border-white/5 pt-5">
                    @foreach($aboutStats as $stat)
                        <div>
                            <div class="font-mono text-xl font-bold text-white">{{ $stat['value'] }}</div>
                            <div class="mt-1 text-xs text-slate-400">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative z-10 order-1 reveal lg:order-2" style="transition-delay:120ms">
                <div class="term overflow-hidden rounded-2xl shadow-2xl">
                    <div class="flex flex-col items-center gap-3 bg-white/[0.02] px-6 pb-6 pt-8">
                        <div class="h-24 w-24 shrink-0 overflow-hidden rounded-full ring-4 ring-amber-400/20 ring-offset-4 ring-offset-[#0b0f16] sm:h-28 sm:w-28">
                            <img src="{{ asset($settings?->portfolio_image ?: 'assets/images/hero.png') }}" alt="{{ $profileName }}" class="h-full w-full object-cover object-top">
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
                    <div id="terminal-body" class="h-44 overflow-y-auto px-4 py-4 text-[13px] leading-6 text-slate-300 sm:h-48 sm:text-sm"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="mb-8 reveal">
            <p class="eyebrow text-[10px] uppercase text-amber-300">What I Can Help You Build</p>
            <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">
                From custom Laravel development to AI integration and business automation, I deliver secure, scalable, and high-performance web solutions tailored to your business goals.
            </h2>
        </div>
        <div id="services-slider" class="no-scrollbar -mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-2 md:mx-0 md:grid md:snap-none md:gap-5 md:overflow-visible md:px-0 md:grid-cols-2 xl:grid-cols-4">
            @foreach($services as $service)
                <article class="glass reveal w-[82%] shrink-0 snap-center rounded-xl p-5 transition duration-300 hover:-translate-y-1.5 hover:border-amber-400/25 md:w-auto md:shrink" style="transition-delay:{{ $loop->index * 60 }}ms">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/5 text-amber-300">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                        <div class="rounded-full border border-white/10 bg-white/5 px-2.5 py-0.5 font-mono text-[10px] text-slate-300">{{ $service['subtitle'] }}</div>
                    </div>
                    <h3 class="mt-4 font-display text-lg font-bold text-white">{{ $service['title'] }}</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-400">{{ $service['description'] }}</p>
                </article>
            @endforeach
        </div>
        <div id="services-dots" class="mt-3 flex justify-center gap-1.5 md:hidden"></div>
    </section>

    <section id="about" class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-6 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="glass reveal rounded-xl p-5 sm:p-6">
                <p class="eyebrow text-[10px] uppercase text-amber-300">About</p>
                <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">Crafting Scalable Solutions for Your Business</h2>
                <p class="mt-4 text-sm leading-7 text-slate-300 sm:text-base">
                    I specialize in developing secure, scalable, and maintainable web applications using Laravel. My expertise includes SaaS platforms, CRM systems, AI integration, REST APIs, payment gateways, Google Maps, automation workflows, and database optimization. I enjoy turning complex business requirements into reliable software that delivers measurable value.
                </p>
                <div class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach($personalQualities->take(4) as $quality)
                        <div class="rounded-lg border border-white/10 bg-white/5 p-3">
                            <div class="text-sm font-semibold text-white">{{ $quality->title ?? $quality->name ?? 'Quality' }}</div>
                            <div class="mt-1 text-xs leading-5 text-slate-400">{{ $quality->description }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="space-y-5">
                <div class="glass reveal rounded-xl p-5 sm:p-6">
                    <div class="flex items-center justify-between gap-4">
                        <h3 class="font-display text-lg font-bold text-white">Technology Stack</h3>
                        <span class="rounded-full border border-white/10 bg-white/5 px-2.5 py-0.5 font-mono text-[10px] text-slate-300">{{ $skills->count() }} skills / {{ $tools->count() }} tools</span>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach($skills as $skill)
                            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-slate-200">{{ $skill->name }}</span>
                        @endforeach
                        @foreach($tools as $tool)
                            <span class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3 py-1 text-xs text-amber-100">{{ $tool->name }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="glass reveal rounded-xl p-5 sm:p-6">
                    <h3 class="font-display text-lg font-bold text-white">Education</h3>
                    <div class="mt-4 space-y-3">
                        @foreach($educations as $education)
                            <div class="rounded-lg border border-white/10 bg-white/5 p-3">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <div class="text-sm font-semibold text-white">{{ $education->degree }}</div>
                                    <div class="font-mono text-[10px] uppercase tracking-[0.2em] text-slate-400">{{ $education->year }}</div>
                                </div>
                                <div class="mt-0.5 text-xs text-slate-300">{{ $education->institution }}</div>
                                <div class="mt-1 font-mono text-xs text-emerald-300">CGPA {{ $education->cgpa }} / {{ $education->out_of_cgpa }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-3 reveal sm:flex-row sm:items-end sm:justify-between">
            <div class="max-w-2xl">
                <p class="eyebrow text-[10px] uppercase text-amber-300">Featured Projects</p>
                <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">A selection of highlighted projects from the portfolio.</h2>
            </div>
            <a href="{{ route('projects.index') }}" class="btn-primary rounded-full px-4 py-2 text-xs font-bold transition">
                View All Projects
            </a>
        </div>

        <div id="projects-slider" class="no-scrollbar -mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-2 md:mx-0 md:grid md:snap-none md:gap-5 md:overflow-visible md:px-0 md:grid-cols-2 xl:grid-cols-3">
            @forelse($featuredProjects as $project)
                <article class="glass reveal group w-[82%] shrink-0 snap-center overflow-hidden rounded-xl transition duration-300 hover:-translate-y-1.5 hover:border-amber-400/25 md:w-auto md:shrink" style="transition-delay:{{ $loop->index * 60 }}ms">
                    <div class="flex h-44 items-center justify-center overflow-hidden bg-white">
                        <img src="{{ asset($project->image) }}" alt="{{ $project->name }} — {{ $project->short_description }}" class="h-full w-full object-contain p-5 transition duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between gap-3">
                            <p class="eyebrow text-[10px] uppercase text-amber-300">{{ $project->category->name ?? 'Project' }}</p>
                        </div>
                        <h3 class="mt-3 font-display text-lg font-bold text-white">{{ $project->name }}</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-400">{{ $project->short_description }}</p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            @foreach(collect($project->technologies ?? [])->take(4) as $tech)
                                <span class="rounded-full border border-white/10 bg-white/5 px-2.5 py-0.5 font-mono text-[10px] text-slate-200">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <div class="mt-5 flex items-center gap-2">
                            <a href="{{ route('projects.study-case', $project) }}" class="btn-primary rounded-full px-3.5 py-1.5 text-xs font-bold">
                                Study case
                            </a>
                            @if($project->url)
                                <a href="{{ $project->url }}" target="_blank" rel="noopener" class="btn-ghost rounded-full px-3.5 py-1.5 text-xs font-semibold text-white transition">
                                    Live site
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="glass rounded-xl p-6 text-sm text-slate-300">No featured projects found.</div>
            @endforelse
        </div>
        <div id="projects-dots" class="mt-3 flex justify-center gap-1.5 md:hidden"></div>
    </section>

    @if($settings?->certificate_image || $settings?->certificate_title)
        <section id="certificate" class="relative mx-auto max-w-7xl overflow-hidden px-4 py-12 sm:px-6 lg:px-8">
            <div class="orb orb-anim h-72 w-72 bg-emerald-400/10" style="bottom:-5rem; right:-6rem; animation-delay:1s;"></div>
            <div class="orb orb-anim h-56 w-56 bg-amber-400/10" style="top:-4rem; left:-5rem; animation-delay:3s;"></div>

            <div class="relative z-10 glass reveal rounded-2xl p-5 sm:p-8 lg:p-10">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                    <div class="max-w-2xl">
                        <div class="inline-flex items-center gap-2.5">
                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-400/10 text-amber-300">
                                <i class="fa-solid fa-award text-sm"></i>
                            </span>
                            <p class="eyebrow text-[10px] uppercase text-amber-300">Professional Certificate</p>
                        </div>
                        <h2 class="mt-3 font-display text-2xl font-bold text-white sm:text-3xl">
                            A credential earned through real, verifiable work.
                        </h2>
                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            A certification that reflects the skills, practice, and standards applied to the projects in this portfolio.
                        </p>
                    </div>
                    <div class="inline-flex w-fit items-center gap-2 rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3.5 py-1.5 text-xs font-semibold text-emerald-200">
                        <span class="status-dot h-2 w-2 rounded-full bg-emerald-300"></span>
                        Verified credential
                    </div>
                </div>

                <div class="mt-8 grid items-center gap-8 lg:grid-cols-[1.15fr_0.85fr] lg:gap-10">
                    <div class="group relative">
                        <div class="absolute -inset-4 rounded-3xl bg-gradient-to-tr from-amber-400/15 via-transparent to-emerald-400/15 blur-2xl opacity-0 transition duration-500 group-hover:opacity-100"></div>
                        <div class="relative overflow-hidden rounded-xl border border-white/10 bg-white p-3 shadow-2xl shadow-black/40 transition duration-500 group-hover:-translate-y-1.5 sm:p-5">
                            @if($settings->certificate_image)
                                <button type="button" data-cert-open class="block w-full cursor-zoom-in">
                                    <img src="{{ asset($settings->certificate_image) }}" alt="{{ $settings->certificate_title ?? 'Professional certificate' }}" class="mx-auto max-h-[440px] w-auto object-contain transition duration-500 group-hover:scale-[1.02]">
                                </button>
                            @endif
                            <div class="pointer-events-none absolute right-4 top-4 inline-flex items-center gap-1.5 rounded-full bg-emerald-500 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-white shadow-lg shadow-emerald-500/30">
                                <i class="fa-solid fa-shield-halved text-[10px]"></i>
                                Verified
                            </div>
                            @if($settings->certificate_image)
                                <div class="absolute inset-x-0 bottom-0 flex items-center justify-center gap-1.5 bg-gradient-to-t from-black/70 to-transparent pb-4 pt-10 text-[11px] font-semibold text-white opacity-0 transition duration-300 group-hover:opacity-100">
                                    <i class="fa-solid fa-magnifying-glass-plus text-[10px]"></i>
                                    Click to view full size
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="rounded-xl border border-white/10 bg-slate-950/45 p-4">
                            <div class="eyebrow text-[9px] uppercase text-slate-500">Certificate</div>
                            <div class="mt-1.5 font-display text-lg font-bold leading-snug text-white">{{ $settings->certificate_title ?? 'Professional Certificate' }}</div>
                        </div>
                        <div class="rounded-xl border border-white/10 bg-slate-950/45 p-4">
                            <div class="eyebrow text-[9px] uppercase text-slate-500">Issued by</div>
                            <div class="mt-1.5 flex items-center gap-2 text-sm font-semibold text-white">
                                <span class="flex h-7 w-7 items-center justify-center rounded-md bg-white/5 text-amber-300">
                                    <i class="fa-solid fa-building-columns text-[11px]"></i>
                                </span>
                                {{ $settings->certificate_issuer ?? '—' }}
                            </div>
                        </div>
                        <div class="rounded-xl border border-white/10 bg-slate-950/45 p-4">
                            <div class="flex items-center gap-3">
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-emerald-400/10 text-emerald-300">
                                    <i class="fa-solid fa-circle-check text-[11px]"></i>
                                </span>
                                <div>
                                    <div class="eyebrow text-[9px] uppercase text-slate-500">Status</div>
                                    <div class="mt-0.5 text-sm font-semibold text-white">Issued & active</div>
                                </div>
                            </div>
                        </div>
                        @if($settings->certificate_image)
                            <button type="button" data-cert-open class="btn-primary inline-flex w-full items-center justify-center gap-2 rounded-full px-5 py-2.5 text-xs font-bold transition sm:w-auto">
                                <i class="fa-solid fa-expand text-[11px]"></i>
                                View full size
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <div id="cert-lightbox" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/85 p-4 backdrop-blur-sm">
            <button type="button" data-cert-close aria-label="Close certificate preview" class="absolute right-5 top-5 flex h-10 w-10 items-center justify-center rounded-full border border-white/15 bg-white/5 text-white transition hover:bg-white/15">
                <i class="fa-solid fa-xmark"></i>
            </button>
            @if($settings->certificate_image)
                <img src="{{ asset($settings->certificate_image) }}" alt="{{ $settings->certificate_title ?? 'Professional certificate' }}" class="max-h-[88vh] max-w-full rounded-lg object-contain shadow-2xl">
            @endif
        </div>
    @endif

    <section id="contact" class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-6 lg:grid-cols-[1fr_0.9fr]">
            <div class="glass reveal rounded-xl p-5 sm:p-6">
                <p class="eyebrow text-[10px] uppercase text-amber-300">Contact</p>
                <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">Let&apos;s build something useful together.</h2>
                <p class="mt-4 max-w-2xl text-sm leading-6 text-slate-300 sm:text-base">
                    Need Laravel development, project structure, or a database-driven portfolio and blog? Send a message and I&apos;ll reply.
                </p>

                <div class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach($contactCards as $card)
                        <a href="{{ $card['href'] }}" target="{{ str_starts_with($card['href'], 'http') ? '_blank' : '_self' }}" rel="noopener" class="rounded-lg border border-white/10 bg-slate-950/45 p-4 transition hover:-translate-y-1 hover:border-amber-400/25 hover:bg-white/10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/5 text-amber-300">
                                    <i class="{{ $card['icon'] }}"></i>
                                </div>
                                <div class="min-w-0">
                                    <div class="eyebrow text-[9px] uppercase text-slate-500">{{ $card['label'] }}</div>
                                    <div class="mt-0.5 truncate text-sm font-semibold text-white">{{ $card['value'] }}</div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="glass reveal rounded-xl p-5 sm:p-6" style="transition-delay:120ms">
                <h3 class="font-display text-lg font-bold text-white">Send a message</h3>
                <form id="contact-form" action="{{ route('contact') }}" method="post" class="mt-4 space-y-3">
                    @csrf
                    <div>
                        <label for="name" class="mb-1.5 block text-xs font-semibold text-slate-300">Name</label>
                        <input id="name" name="name" type="text" required class="w-full rounded-lg border border-white/10 bg-slate-950/60 px-3.5 py-2.5 text-sm text-white outline-none transition focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20">
                    </div>
                    <div>
                        <label for="email" class="mb-1.5 block text-xs font-semibold text-slate-300">Email</label>
                        <input id="email" name="email" type="email" required class="w-full rounded-lg border border-white/10 bg-slate-950/60 px-3.5 py-2.5 text-sm text-white outline-none transition focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20">
                    </div>
                    <div>
                        <label for="message" class="mb-1.5 block text-xs font-semibold text-slate-300">Message</label>
                        <textarea id="message" name="message" rows="4" required class="w-full rounded-lg border border-white/10 bg-slate-950/60 px-3.5 py-2.5 text-sm text-white outline-none transition focus:border-amber-400/50 focus:ring-2 focus:ring-amber-400/20"></textarea>
                    </div>
                    @if(($settings->is_captcha_enable ?? false) && $settings->captcha_key)
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        <div class="text-xs text-slate-500">Protected by reCAPTCHA v3.</div>
                    @endif
                    <button type="submit" id="contact-submit-btn" class="btn-primary flex w-full items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-xs font-bold transition disabled:cursor-not-allowed disabled:opacity-70">
                        <span class="btn-label">Send message</span>
                        <span class="btn-loader hidden">
                            <span class="loader-spinner"></span>
                        </span>
                    </button>
                    <div id="contact-form-message" class="hidden rounded-lg border px-3.5 py-2.5 text-xs font-semibold"></div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    .status-dot { box-shadow: 0 0 0 4px rgba(52,211,153,0.16); }
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
    .orb { position:absolute; border-radius:9999px; filter: blur(70px); pointer-events:none; }
    .orb-anim { animation: drift 14s ease-in-out infinite alternate; }
    @keyframes drift { from { transform: translate(0,0);} to { transform: translate(18px,-14px);} }
    .loader-spinner {
        display:inline-block; width:14px; height:14px;
        border:2px solid rgba(26,18,4,0.35); border-top-color:#1a1204;
        border-radius:9999px; animation: spin .6s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
    #contact-form-message.error { border-color: rgba(251,113,133,0.25); background: rgba(251,113,133,0.10); color: #fecdd3; }
    #contact-form-message.success { border-color: rgba(52,211,153,0.25); background: rgba(52,211,153,0.10); color: #a7f3d0; }
@endpush

@push('scripts')
<script>
    (function () {
        const lightbox = document.getElementById('cert-lightbox');
        if (!lightbox) return;
        const openers = document.querySelectorAll('[data-cert-open]');
        const closer = document.querySelector('[data-cert-close]');

        function open() {
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function close() {
            lightbox.classList.add('hidden');
            document.body.style.overflow = '';
        }
        openers.forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                open();
            });
        });
        if (closer) closer.addEventListener('click', close);
        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox) close();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') close();
        });
    })();
</script>
@if(($settings->is_captcha_enable ?? false) && $settings->captcha_key)
    <script src="https://www.google.com/recaptcha/api.js?render={{ $settings->captcha_key }}"></script>
@endif
<script>
    (function () {
        const siteKey = @json(($settings->is_captcha_enable ?? false) ? $settings->captcha_key : null);
        const form = document.getElementById('contact-form');
        if (!form) return;

        const btn = document.getElementById('contact-submit-btn');
        const btnLabel = btn.querySelector('.btn-label');
        const btnLoader = btn.querySelector('.btn-loader');
        const msgBox = document.getElementById('contact-form-message');

        function showMessage(type, text) {
            msgBox.textContent = text;
            msgBox.classList.remove('hidden', 'error', 'success');
            msgBox.classList.add(type);
            clearTimeout(showMessage._timer);
            showMessage._timer = setTimeout(function () {
                msgBox.classList.add('hidden');
            }, 8000);
        }

        function setLoading(loading) {
            btn.disabled = loading;
            btnLabel.classList.toggle('hidden', loading);
            btnLoader.classList.toggle('hidden', !loading);
        }

        function submitAjax() {
            setLoading(true);
            msgBox.classList.add('hidden');

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new FormData(form)
            })
                .then(function (res) {
                    return res.json().catch(function () { return null; }).then(function (data) {
                        return { ok: res.ok, data: data };
                    });
                })
                .then(function (result) {
                    if (result.ok && result.data && result.data.success) {
                        showMessage('success', result.data.message || 'Thank you for your message.');
                        form.reset();
                    } else {
                        showMessage('error', (result.data && result.data.message) || 'Something went wrong. Please try again.');
                    }
                })
                .catch(function () {
                    showMessage('error', 'Something went wrong. Please try again.');
                })
                .finally(function () {
                    setLoading(false);
                });
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (btn.disabled) return;

            if (siteKey && window.grecaptcha) {
                grecaptcha.ready(function () {
                    grecaptcha.execute(siteKey, { action: 'contact' }).then(function (token) {
                        document.getElementById('g-recaptcha-response').value = token;
                        submitAjax();
                    });
                });
            } else {
                submitAjax();
            }
        });
    })();
</script>
<script>
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
@endpush
