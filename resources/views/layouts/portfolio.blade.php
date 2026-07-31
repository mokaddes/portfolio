<!DOCTYPE html>
<html lang="en">
<head>
   @include('layouts.head')

    <style>
        .grecaptcha-badge{
            /*left: 0 !important;*/
        }
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
    class="fixed bottom-5 left-10 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500 text-white shadow-2xl shadow-emerald-500/30 transition hover:scale-105 hover:bg-emerald-400"
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
