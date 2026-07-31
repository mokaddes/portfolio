@php
    $settings = $settings ?? null;

    $profileName = $settings?->portfolio_name ?? 'Mokaddes Hosain';

    $defaultTitle = $settings?->meta_title
        ?? 'Mokaddes Hosain | Laravel Developer | SaaS Engineer | AI Automation';

    $defaultDescription = $settings?->meta_description
        ?? 'Laravel Developer specializing in SaaS applications, AI automation, REST APIs, Laravel, Vue.js, PHP, MySQL, WordPress, and scalable enterprise web applications.';

    $defaultKeywords = $settings?->keywords
        ?? 'Laravel Developer, SaaS Engineer, AI Automation, PHP Developer, Vue.js, REST API, Bangladesh';

    $seoTitle = trim($__env->yieldContent('title')) ?: $defaultTitle;
    $seoDescription = trim($__env->yieldContent('meta_description')) ?: $defaultDescription;

    $seoImage = $settings?->seo_image
        ? asset($settings->seo_image)
        : asset('assets/images/hero.png');

    $canonical = url()->current();
@endphp


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>{{ $seoTitle }}</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="{{ $seoDescription }}">
<meta name="keywords" content="{{ $defaultKeywords }}">
<meta name="author" content="{{ $profileName }}">
<meta name="robots" content="index,follow,max-image-preview:large">
<meta name="googlebot" content="index,follow">

<link rel="canonical" href="{{ $canonical }}">

<meta name="theme-color" content="#0f172a">

<link rel="icon" href="{{ asset($settings?->favicon ?? 'assets/images/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset($settings?->favicon ?? 'assets/images/favicon.png') }}">

<!-- ===================== -->
<!-- Open Graph -->
<!-- ===================== -->

<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ $profileName }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:image:secure_url" content="{{ $seoImage }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

{{-- Optional --}}
 <meta property="fb:app_id" content="2390583041430665">

<!-- ===================== -->
<!-- Twitter -->
<!-- ===================== -->

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

{{-- Optional --}}
 <meta name="twitter:site" content="@mkdsru">

<!-- ===================== -->
<!-- Person Schema -->
<!-- ===================== -->

<script type="application/ld+json">
    {
    "@context":"https://schema.org",
    "@type":"Person",
    "name":"Mokaddes Hosain",
    "url":"{{ url('/') }}",
"image":"{{ $seoImage }}",
"jobTitle":"Laravel Developer",
"description":"Laravel Developer, SaaS Engineer and AI Automation Specialist.",
"nationality":"Bangladesh",
"email":"mailto:mr.mokaddes@gmail.com",
"sameAs":[
"https://github.com/mokaddes",
"https://linkedin.com/in/mokaddes"
],
"knowsAbout":[
"Laravel",
"PHP",
"Vue.js",
"MySQL",
"REST API",
"WordPress",
"SaaS",
"AI Automation",
"OpenAI",
"n8n"
]
}
</script>

<!-- ===================== -->
<!-- Website Schema -->
<!-- ===================== -->

<script type="application/ld+json">
    {
    "@context":"https://schema.org",
    "@type":"WebSite",
    "name":"{{ $profileName }}",
"url":"{{ url('/') }}",
"description":"{{ $seoDescription }}",
"publisher":{
"@type":"Person",
"name":"Mokaddes Hosain"
},
"potentialAction":{
"@type":"SearchAction",
"target":"{{ url('/') }}/?q={search_term_string}",
"query-input":"required name=search_term_string"
}
}
</script>
<!-- Google Tag Manager -->
<script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start':
                new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-KN8XQ96L');</script>
<!-- End Google Tag Manager -->


<!-- Fonts -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link
    href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700;800&family=Manrope:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap"
    rel="stylesheet">
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
        --line: rgba(148, 163, 184, 0.14);
        --paper: #f4f6f8;
        --amber: #f2a93b;
        --green: #34d399;
        --muted: #8a97a8;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Manrope', ui-sans-serif, system-ui;
        background: radial-gradient(circle at 12% 8%, rgba(242, 169, 59, 0.10), transparent 32%),
        radial-gradient(circle at 88% 6%, rgba(52, 211, 153, 0.08), transparent 30%),
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
        background-image: linear-gradient(rgba(148, 163, 184, 0.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(148, 163, 184, 0.05) 1px, transparent 1px);
        background-size: 56px 56px;
        mask-image: linear-gradient(to bottom, rgba(0, 0, 0, .8), transparent 92%);
    }

    .eyebrow {
        font-family: 'JetBrains Mono', monospace;
        letter-spacing: 0.18em;
    }

    .btn-primary {
        background: linear-gradient(90deg, var(--amber) 0%, #f6c667 100%);
        color: #1a1204;
        box-shadow: 0 12px 30px rgba(242, 169, 59, 0.22);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 36px rgba(242, 169, 59, 0.32);
    }

    .btn-ghost {
        border: 1px solid var(--line);
        background: rgba(255, 255, 255, 0.03);
    }

    .btn-ghost:hover {
        border-color: rgba(242, 169, 59, 0.35);
        background: rgba(255, 255, 255, 0.06);
    }

    .nav-link {
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: -6px;
        height: 2px;
        background: linear-gradient(90deg, var(--amber), var(--green));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .25s ease;
    }

    .nav-link:hover::after,
    .nav-link.is-active::after {
        transform: scaleX(1);
    }

    .nav-link.is-active {
        color: #ffffff;
    }

    #mobile-menu {
        transition: opacity .22s ease, transform .22s ease;
    }

    #mobile-menu.menu-hidden {
        opacity: 0;
        transform: translateY(-8px);
        pointer-events: none;
    }

    .reveal {
        opacity: 0;
        transform: translateY(16px);
        transition: opacity .5s ease, transform .5s ease;
    }

    .reveal.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .no-scrollbar {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    @media (prefers-reduced-motion: reduce) {
        .reveal {
            transition: opacity .3s ease;
            transform: none;
        }
    }
    @stack('styles')
</style>





