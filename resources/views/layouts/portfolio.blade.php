@php
    $settings = $settings ?? null;
    $profileName = $settings?->portfolio_name ?: ($profileName ?? 'Mokaddes Hosain');
    $profileTitle = $profileTitle ?? 'Laravel Developer | SaaS | Automation';
    $resumeLink = $resumeLink ?? route('resume.download');
    $whatsappHref = $whatsappHref ?? '#contact';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', $settings?->meta_description ?: $profileName.' — Laravel developer, SaaS builder, and automation engineer. Portfolio, resume, and blog.')">
    <meta name="keywords" content="{{ $settings?->keywords ?? '' }}">
    <title>@yield('title', $settings?->meta_title ?: $profileName.' | Portfolio')</title>
    <link rel="shortcut icon" href="{{ asset($settings?->favicon ?: 'images/mkds.jpg') }}" type="image/x-icon">
    @if($settings?->seo_image)
        <meta property="og:image" content="{{ asset($settings->seo_image) }}">
        <meta name="twitter:image" content="{{ asset($settings->seo_image) }}">
    @endif
    <meta property="og:title" content="@yield('title', $settings?->meta_title ?: $profileName . ' | Portfolio')">
    <meta property="og:description" content="@yield('meta_description', $settings?->meta_description)">
    <meta property="og:image" content="{{ asset($settings?->seo_image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $profileName }}">
    <meta property="og:locale" content="en_US">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', $settings?->meta_title ?: $profileName . ' | Portfolio')">
    <meta name="twitter:description" content="@yield('meta_description', $settings?->meta_description)">
    <meta name="twitter:image" content="{{ asset($settings?->seo_image) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta property="fb:app_id" content="2390583041430665">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KN8XQ96L');</script>
    <!-- End Google Tag Manager -->

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
        .grid-glow {
            background-image:
                linear-gradient(rgba(148,163,184,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148,163,184,0.05) 1px, transparent 1px);
            background-size: 56px 56px;
            mask-image: linear-gradient(to bottom, rgba(0,0,0,.8), transparent 92%);
        }
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
        .nav-link:hover::after,
        .nav-link.is-active::after { transform: scaleX(1); }
        .nav-link.is-active { color: #ffffff; }
        #mobile-menu { transition: opacity .22s ease, transform .22s ease; }
        #mobile-menu.menu-hidden { opacity: 0; transform: translateY(-8px); pointer-events: none; }
        .reveal { opacity: 0; transform: translateY(16px); transition: opacity .5s ease, transform .5s ease; }
        .reveal.is-visible { opacity: 1; transform: translateY(0); }
        .no-scrollbar { scrollbar-width: none; -ms-overflow-style: none; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        @media (prefers-reduced-motion: reduce) {
            .reveal { transition: opacity .3s ease; transform: none; }
        }
        @stack('styles')
    </style>
</head>
<body class="overflow-x-hidden">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KN8XQ96L"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="fixed inset-0 pointer-events-none grid-glow"></div>

<header class="sticky top-0 z-50 border-b border-white/5 bg-slate-950/70 backdrop-blur-xl">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3.5 sm:px-6 lg:px-8">
        <a href="{{ route('frontend.index') }}" class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-amber-300 to-emerald-400 text-sm font-black text-slate-950">
                MH
            </div>
            <div>
                <div class="font-display text-base font-bold leading-none text-white">{{ $profileName }}</div>
                <div class="mt-1 eyebrow text-[10px] uppercase text-slate-500">@yield('header_tag', 'Portfolio')</div>
            </div>
        </a>

        <div class="hidden items-center gap-7 lg:flex">
            <a href="{{ route('frontend.index') }}#services" class="nav-link text-sm text-slate-300 transition hover:text-white">Services</a>
            <a href="{{ route('frontend.index') }}#about" class="nav-link text-sm text-slate-300 transition hover:text-white">About</a>
            <a href="{{ route('frontend.index') }}#projects" class="nav-link text-sm transition hover:text-white {{ request()->routeIs('projects.*') ? 'is-active' : 'text-slate-300' }}">Projects</a>
            <a href="{{ route('resume') }}" class="nav-link text-sm transition hover:text-white {{ request()->routeIs('resume') ? 'is-active' : 'text-slate-300' }}">Resume</a>
{{--            <a href="{{ route('blog.index') }}" class="nav-link text-sm transition hover:text-white {{ request()->routeIs('blog.*') ? 'is-active' : 'text-slate-300' }}">Blog</a>--}}
            <a href="{{ route('frontend.index') }}#contact" class="nav-link text-sm text-slate-300 transition hover:text-white">Contact</a>
        </div>

        <div class="hidden items-center gap-3 lg:flex">
            <a href="{{ $resumeLink }}" class="btn-ghost rounded-full px-5 py-2.5 text-sm font-semibold text-white transition">
                Download Resume
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
            <a href="{{ route('frontend.index') }}#projects" class="rounded-lg px-3 py-2.5 text-sm hover:bg-white/5 {{ request()->routeIs('projects.*') ? 'text-white bg-white/5' : 'text-slate-200' }}">Projects</a>
            <a href="{{ route('resume') }}" class="rounded-lg px-3 py-2.5 text-sm hover:bg-white/5 {{ request()->routeIs('resume') ? 'text-white bg-white/5' : 'text-slate-200' }}">Resume</a>
{{--            <a href="{{ route('blog.index') }}" class="rounded-lg px-3 py-2.5 text-sm hover:bg-white/5 {{ request()->routeIs('blog.*') ? 'text-white bg-white/5' : 'text-slate-200' }}">Blog</a>--}}
            <a href="{{ route('frontend.index') }}#contact" class="rounded-lg px-3 py-2.5 text-sm text-slate-200 hover:bg-white/5">Contact</a>
        </div>
        <div class="mt-4 flex gap-3">
            <a href="{{ $resumeLink }}" class="btn-ghost flex-1 rounded-full px-4 py-2.5 text-center text-sm font-semibold text-white">Resume</a>
            <a href="{{ route('frontend.index') }}#contact" class="btn-primary flex-1 rounded-full px-4 py-2.5 text-center text-sm font-bold">Hire Me</a>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="border-t border-white/5 bg-slate-950/80">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-8 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
        <div>
            <div class="font-display text-xl font-bold text-white">{{ $profileName }}</div>
            <p class="mt-2 text-sm text-slate-400">{{ $profileTitle }}</p>
        </div>
        <div class="flex flex-wrap gap-4 text-sm text-slate-400">
            <a href="{{ route('frontend.index') }}#services" class="transition hover:text-white">Services</a>
            <a href="{{ route('frontend.index') }}#about" class="transition hover:text-white">About</a>
            <a href="{{ route('projects.index') }}" class="transition hover:text-white">Projects</a>
            <a href="{{ route('blog.index') }}" class="transition hover:text-white">Blog</a>
            <a href="{{ route('frontend.index') }}#contact" class="transition hover:text-white">Contact</a>
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
        }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
        items.forEach(function (el) { io.observe(el); });
    })();
</script>
@stack('scripts')
</body>
</html>
