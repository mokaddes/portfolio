<!-- Professional Skills - Grid View -->
<!DOCTYPE html>

<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Professional Skills - Grid View</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Config -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b6cee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                        "surface-dark": "#1c2230",
                        "surface-light": "#ffffff",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "2xl": "1rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        /* Custom scrollbar for a cleaner look */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #111318;
        }
        ::-webkit-scrollbar-thumb {
            background: #3b4354;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #2b6cee;
        }

        /* Subtle pattern for background */
        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-white min-h-screen flex flex-col overflow-x-hidden transition-colors duration-300">
<!-- Top Navigation -->
<header class="sticky top-0 z-50 w-full border-b border-slate-200 dark:border-[#282e39] bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo Area -->
            <div class="flex items-center gap-3 text-slate-900 dark:text-white">
                <div class="flex items-center justify-center size-8 rounded-lg bg-primary/20 text-primary">
                    <span class="material-symbols-outlined text-2xl">terminal</span>
                </div>
                <h2 class="text-lg font-bold leading-tight tracking-tight">DevPortfolio</h2>
            </div>
            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-slate-600 dark:text-slate-300 text-sm font-medium hover:text-primary dark:hover:text-primary transition-colors" href="#">Work</a>
                <a class="text-slate-900 dark:text-white text-sm font-bold hover:text-primary dark:hover:text-primary transition-colors" href="#">Skills</a>
                <a class="text-slate-600 dark:text-slate-300 text-sm font-medium hover:text-primary dark:hover:text-primary transition-colors" href="#">About</a>
                <a class="text-slate-600 dark:text-slate-300 text-sm font-medium hover:text-primary dark:hover:text-primary transition-colors" href="#">Contact</a>
            </nav>
            <!-- CTA Button -->
            <div class="flex items-center gap-4">
                <button class="hidden sm:flex min-w-[100px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-5 bg-primary hover:bg-blue-600 text-white text-sm font-bold leading-normal tracking-wide transition-all shadow-lg shadow-primary/20">
                    Hire Me
                </button>
                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 text-slate-600 dark:text-slate-300">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </div>
</header>
<!-- Main Content Area -->
<main class="flex-grow flex flex-col relative">
    <!-- Background Decor -->
    <div class="absolute inset-0 z-0 pointer-events-none bg-grid-pattern opacity-50"></div>
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[400px] h-[400px] bg-purple-500/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="relative z-10 w-full max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <!-- Section Header -->
        <div class="flex flex-col gap-6 mb-16 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 border border-primary/20 w-fit">
                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-primary">Technical Expertise</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tight text-slate-900 dark:text-white leading-[1.1]">
                My Technical <br class="hidden sm:block"/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-500">Arsenal &amp; Skills</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-600 dark:text-slate-400 font-medium leading-relaxed max-w-2xl">
                Leveraging a modern stack to build scalable, robust, and user-centric web applications. My expertise spans backend architecture to reactive frontend interfaces.
            </p>
        </div>
        <!-- Skills Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Skill Card 1: Laravel -->
            <div class="group relative flex flex-col p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-white/5 hover:border-primary/50 dark:hover:border-primary/50 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center justify-center size-12 rounded-xl bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">php</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-md bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-bold uppercase tracking-wide border border-green-500/20">
                            Expert
                        </span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Laravel Framework</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                    Building scalable APIs, Eloquent ORM relationships, and custom packages using the TALL stack ecosystem.
                </p>
                <div class="mt-auto pt-4 border-t border-slate-100 dark:border-white/5 flex gap-2 flex-wrap">
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">Eloquent</span>
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">Queues</span>
                </div>
            </div>
            <!-- Skill Card 2: PHP 8+ -->
            <div class="group relative flex flex-col p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-white/5 hover:border-primary/50 dark:hover:border-primary/50 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center justify-center size-12 rounded-xl bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">code</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-md bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-bold uppercase tracking-wide border border-green-500/20">
                            Expert
                        </span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">PHP 8+</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                    Utilizing modern PHP features like JIT compilation, Attributes, and strict typing for high-performance codebases.
                </p>
                <div class="mt-auto pt-4 border-t border-slate-100 dark:border-white/5 flex gap-2 flex-wrap">
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">OOP</span>
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">JIT</span>
                </div>
            </div>
            <!-- Skill Card 3: Vue/Frontend -->
            <div class="group relative flex flex-col p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-white/5 hover:border-primary/50 dark:hover:border-primary/50 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center justify-center size-12 rounded-xl bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">javascript</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-md bg-blue-500/10 text-blue-600 dark:text-blue-400 text-xs font-bold uppercase tracking-wide border border-blue-500/20">
                            Advanced
                        </span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Vue.js Ecosystem</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                    Creating dynamic, reactive user interfaces and seamless single-page applications with Vue 3 and Nuxt.
                </p>
                <div class="mt-auto pt-4 border-t border-slate-100 dark:border-white/5 flex gap-2 flex-wrap">
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">Composition API</span>
                </div>
            </div>
            <!-- Skill Card 4: Database -->
            <div class="group relative flex flex-col p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-white/5 hover:border-primary/50 dark:hover:border-primary/50 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center justify-center size-12 rounded-xl bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">database</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-md bg-blue-500/10 text-blue-600 dark:text-blue-400 text-xs font-bold uppercase tracking-wide border border-blue-500/20">
                            Advanced
                        </span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Database Design</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                    Designing complex schemas, optimizing queries, and ensuring data integrity with MySQL and PostgreSQL.
                </p>
                <div class="mt-auto pt-4 border-t border-slate-100 dark:border-white/5 flex gap-2 flex-wrap">
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">MySQL</span>
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">Redis</span>
                </div>
            </div>
            <!-- Skill Card 5: DevOps -->
            <div class="group relative flex flex-col p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-white/5 hover:border-primary/50 dark:hover:border-primary/50 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center justify-center size-12 rounded-xl bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">cloud</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-md bg-purple-500/10 text-purple-600 dark:text-purple-400 text-xs font-bold uppercase tracking-wide border border-purple-500/20">
                            Intermediate
                        </span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">DevOps &amp; Docker</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                    Containerization and CI/CD pipelines for reliable, automated deployments using GitHub Actions.
                </p>
                <div class="mt-auto pt-4 border-t border-slate-100 dark:border-white/5 flex gap-2 flex-wrap">
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">CI/CD</span>
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">AWS</span>
                </div>
            </div>
            <!-- Skill Card 6: Tailwind -->
            <div class="group relative flex flex-col p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-white/5 hover:border-primary/50 dark:hover:border-primary/50 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center justify-center size-12 rounded-xl bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">palette</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-md bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-bold uppercase tracking-wide border border-green-500/20">
                            Expert
                        </span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Tailwind CSS</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                    Rapid UI development with utility-first CSS for clean, modern, and responsive designs that scale.
                </p>
                <div class="mt-auto pt-4 border-t border-slate-100 dark:border-white/5 flex gap-2 flex-wrap">
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">Responsive</span>
                </div>
            </div>
            <!-- Skill Card 7: Testing -->
            <div class="group relative flex flex-col p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-white/5 hover:border-primary/50 dark:hover:border-primary/50 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center justify-center size-12 rounded-xl bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">bug_report</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-md bg-blue-500/10 text-blue-600 dark:text-blue-400 text-xs font-bold uppercase tracking-wide border border-blue-500/20">
                            Advanced
                        </span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Automated Testing</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                    Ensuring code quality and stability through rigorous testing with PHPUnit and the Pest framework.
                </p>
                <div class="mt-auto pt-4 border-t border-slate-100 dark:border-white/5 flex gap-2 flex-wrap">
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">TDD</span>
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">Pest</span>
                </div>
            </div>
            <!-- Skill Card 8: API -->
            <div class="group relative flex flex-col p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-white/5 hover:border-primary/50 dark:hover:border-primary/50 shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center justify-center size-12 rounded-xl bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">api</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-md bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-bold uppercase tracking-wide border border-green-500/20">
                            Expert
                        </span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">API Development</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                    Designing robust RESTful and GraphQL APIs for seamless third-party integrations and mobile app backends.
                </p>
                <div class="mt-auto pt-4 border-t border-slate-100 dark:border-white/5 flex gap-2 flex-wrap">
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">REST</span>
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">GraphQL</span>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Footer -->
<footer class="border-t border-slate-200 dark:border-[#282e39] bg-background-light dark:bg-background-dark py-12">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center gap-6">
            <!-- Social Links -->
            <div class="flex items-center justify-center gap-8">
                <a class="text-slate-500 dark:text-[#9da6b9] hover:text-primary dark:hover:text-white transition-colors flex items-center gap-2 group" href="#">
                    <span class="material-symbols-outlined group-hover:scale-110 transition-transform">code</span>
                    <span class="text-sm font-medium">GitHub</span>
                </a>
                <a class="text-slate-500 dark:text-[#9da6b9] hover:text-primary dark:hover:text-white transition-colors flex items-center gap-2 group" href="#">
                    <span class="material-symbols-outlined group-hover:scale-110 transition-transform">work</span>
                    <span class="text-sm font-medium">LinkedIn</span>
                </a>
                <a class="text-slate-500 dark:text-[#9da6b9] hover:text-primary dark:hover:text-white transition-colors flex items-center gap-2 group" href="#">
                    <span class="material-symbols-outlined group-hover:scale-110 transition-transform">chat_bubble</span>
                    <span class="text-sm font-medium">Twitter</span>
                </a>
            </div>
            <div class="h-px w-24 bg-slate-200 dark:bg-slate-800"></div>
            <p class="text-slate-400 dark:text-[#9da6b9] text-sm font-medium text-center">
                © 2024 Laravel Developer Portfolio. All rights reserved.
            </p>
        </div>
    </div>
</footer>
</body>
</html>

<!-- About Me Section - Professional Bio -->
<!DOCTYPE html>

<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>About Me - Professional Portfolio</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b6cee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622", // Matches the deep dark theme
                        "surface-dark": "#1a202c",
                        "border-dark": "#282e39",
                        "text-secondary": "#9da6b9"
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
</head>
<body class="bg-background-light dark:bg-background-dark min-h-screen flex flex-col font-display selection:bg-primary/30 selection:text-white">
<!-- TopNavBar -->
<header class="sticky top-0 z-50 w-full border-b border-solid border-gray-200 dark:border-border-dark bg-background-light/95 dark:bg-[#111318]/95 backdrop-blur-sm">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-10 py-3 flex items-center justify-between whitespace-nowrap">
        <div class="flex items-center gap-4 text-gray-900 dark:text-white">
            <div class="size-8 text-primary">
                <span class="material-symbols-outlined text-3xl">terminal</span>
            </div>
            <h2 class="text-lg font-bold leading-tight tracking-[-0.015em]">Portfolio</h2>
        </div>
        <div class="hidden md:flex flex-1 justify-end gap-8 items-center">
            <div class="flex items-center gap-9">
                <a class="text-gray-600 dark:text-white text-sm font-medium hover:text-primary transition-colors" href="#">Home</a>
                <a class="text-primary text-sm font-bold" href="#">About</a>
                <a class="text-gray-600 dark:text-white text-sm font-medium hover:text-primary transition-colors" href="#">Projects</a>
                <a class="text-gray-600 dark:text-white text-sm font-medium hover:text-primary transition-colors" href="#">Contact</a>
            </div>
            <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-6 bg-primary text-white text-sm font-bold hover:bg-blue-600 transition-colors shadow-lg shadow-blue-500/20">
                <span class="truncate">Hire Me</span>
            </button>
        </div>
        <!-- Mobile Menu Button -->
        <button class="md:hidden text-gray-900 dark:text-white">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>
</header>
<!-- Main Content -->
<main class="flex-1 flex justify-center py-10 md:py-16 px-4 md:px-10">
    <div class="w-full max-w-[1120px]">
        <!-- Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">
            <!-- Left Column: Profile Card & Quick Actions -->
            <div class="lg:col-span-5 flex flex-col gap-8">
                <div class="relative group">
                    <!-- Decorative gradient blob -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary to-purple-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                    <!-- Profile Image Container -->
                    <div class="relative aspect-[4/5] w-full overflow-hidden rounded-xl bg-gray-800 border border-border-dark shadow-2xl">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Professional headshot of a developer in a dark shirt looking confident" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAhpX8bPZ9ShNROe3pu7jf0HKb37JLx3gmNfaNGwjWqOgM0DaXm2O_0dfqIFK_gJkUT8FZbQEtWh4q1P4kkZ37bHkuP_92hcw9Y0P2zCOHGw05PlJG9ybqxMUEWZrVDGgJ9DRqa--abhHoVB78cRbkF__3CsUn7tWj64DgQ8EM-ZzSY7cOz6O57SRDN4e9bDfiRqkPmX0nWfbGPeWd2RVrZoFxD-rww8GG0Sl1H7kiV-yEw6WOI60pHwdUT9-HrqmZkQIfo739T9JA");'>
                        </div>
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-background-dark/90 via-transparent to-transparent"></div>
                        <!-- Overlay Content -->
                        <div class="absolute bottom-0 left-0 w-full p-6">
                            <h1 class="text-white text-3xl font-bold tracking-tight mb-1">Alex Morgan</h1>
                            <p class="text-primary font-medium flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">code</span>
                                Senior Laravel Developer
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Socials & CV -->
                <div class="flex flex-col gap-4">
                    <button class="w-full h-12 flex items-center justify-center gap-2 bg-gray-200 dark:bg-[#282e39] hover:dark:bg-[#343b49] text-gray-900 dark:text-white rounded-lg font-bold text-sm transition-all border border-transparent hover:border-gray-300 dark:hover:border-gray-600">
                        <span class="material-symbols-outlined">download</span>
                        Download CV
                    </button>
                    <div class="flex gap-3 justify-center">
                        <a class="size-10 flex items-center justify-center rounded-lg bg-gray-200 dark:bg-[#282e39] text-gray-600 dark:text-text-secondary hover:text-primary hover:dark:text-white transition-colors" href="#">
                            <span class="material-symbols-outlined">alternate_email</span> <!-- abstract for social -->
                        </a>
                        <a class="size-10 flex items-center justify-center rounded-lg bg-gray-200 dark:bg-[#282e39] text-gray-600 dark:text-text-secondary hover:text-primary hover:dark:text-white transition-colors" href="#">
                            <span class="material-symbols-outlined">code</span> <!-- abstract for github -->
                        </a>
                        <a class="size-10 flex items-center justify-center rounded-lg bg-gray-200 dark:bg-[#282e39] text-gray-600 dark:text-text-secondary hover:text-primary hover:dark:text-white transition-colors" href="#">
                            <span class="material-symbols-outlined">link</span> <!-- abstract for linkedin -->
                        </a>
                    </div>
                </div>
                <!-- Quick Stats (Optional addition for "Stats Row" idea) -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-100 dark:bg-[#1a202c] p-4 rounded-xl border border-gray-200 dark:border-border-dark text-center">
                        <p class="text-2xl font-bold text-primary">5+</p>
                        <p class="text-xs text-text-secondary uppercase tracking-wider font-semibold">Years Exp.</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-[#1a202c] p-4 rounded-xl border border-gray-200 dark:border-border-dark text-center">
                        <p class="text-2xl font-bold text-primary">42</p>
                        <p class="text-xs text-text-secondary uppercase tracking-wider font-semibold">Projects</p>
                    </div>
                </div>
            </div>
            <!-- Right Column: Narrative & Timeline -->
            <div class="lg:col-span-7 flex flex-col">
                <!-- Bio Section -->
                <div class="mb-12">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="h-px w-8 bg-primary"></span>
                        <span class="text-primary text-sm font-bold uppercase tracking-widest">About Me</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white leading-tight mb-6">
                        I build robust, scalable back-ends that power modern web applications.
                    </h2>
                    <div class="space-y-4 text-gray-600 dark:text-text-secondary text-lg leading-relaxed">
                        <p>
                            I am a passionate backend developer specializing in the <strong class="text-primary">TALL stack</strong>. With over 5 years of hands-on experience, I've transitioned from building simple websites to architecting complex, data-driven enterprise applications.
                        </p>
                        <p>
                            My philosophy is simple: code should be clean, efficient, and maintainable. I thrive in environments where performance matters and solving difficult algorithmic challenges is part of the daily routine. When I'm not pushing commits, I'm likely exploring the latest Laravel updates or contributing to open source.
                        </p>
                    </div>
                </div>
                <!-- Tech Stack Chips -->
                <div class="mb-12">
                    <h3 class="text-gray-900 dark:text-white text-lg font-bold mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">terminal</span>
                        Technical Arsenal
                    </h3>
                    <div class="flex flex-wrap gap-3">
                        <!-- Chip Item -->
                        <div class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-[#282e39] border border-gray-200 dark:border-transparent pl-4 pr-4 shadow-sm">
                            <span class="size-2 rounded-full bg-[#777BB4]"></span> <!-- PHP color hint -->
                            <p class="text-gray-800 dark:text-white text-sm font-medium">PHP 8.2</p>
                        </div>
                        <div class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-[#282e39] border border-gray-200 dark:border-transparent pl-4 pr-4 shadow-sm">
                            <span class="size-2 rounded-full bg-[#FF2D20]"></span> <!-- Laravel color hint -->
                            <p class="text-gray-800 dark:text-white text-sm font-medium">Laravel 10</p>
                        </div>
                        <div class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-[#282e39] border border-gray-200 dark:border-transparent pl-4 pr-4 shadow-sm">
                            <span class="size-2 rounded-full bg-[#41B883]"></span> <!-- Vue color hint -->
                            <p class="text-gray-800 dark:text-white text-sm font-medium">Vue.js</p>
                        </div>
                        <div class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-[#282e39] border border-gray-200 dark:border-transparent pl-4 pr-4 shadow-sm">
                            <span class="size-2 rounded-full bg-[#00758F]"></span> <!-- MySQL color hint -->
                            <p class="text-gray-800 dark:text-white text-sm font-medium">MySQL</p>
                        </div>
                        <div class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-[#282e39] border border-gray-200 dark:border-transparent pl-4 pr-4 shadow-sm">
                            <span class="size-2 rounded-full bg-[#2496ED]"></span>
                            <p class="text-gray-800 dark:text-white text-sm font-medium">Docker</p>
                        </div>
                        <div class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-[#282e39] border border-gray-200 dark:border-transparent pl-4 pr-4 shadow-sm">
                            <span class="size-2 rounded-full bg-[#D82C20]"></span>
                            <p class="text-gray-800 dark:text-white text-sm font-medium">Redis</p>
                        </div>
                        <div class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-[#282e39] border border-gray-200 dark:border-transparent pl-4 pr-4 shadow-sm">
                            <span class="size-2 rounded-full bg-[#38B2AC]"></span>
                            <p class="text-gray-800 dark:text-white text-sm font-medium">Tailwind CSS</p>
                        </div>
                        <div class="flex h-9 items-center justify-center gap-x-2 rounded-lg bg-white dark:bg-[#282e39] border border-gray-200 dark:border-transparent pl-4 pr-4 shadow-sm">
                            <span class="size-2 rounded-full bg-[#FB70A9]"></span>
                            <p class="text-gray-800 dark:text-white text-sm font-medium">Livewire</p>
                        </div>
                    </div>
                </div>
                <!-- Education History Timeline -->
                <div>
                    <h3 class="text-gray-900 dark:text-white text-2xl font-bold mb-8 border-b border-gray-200 dark:border-border-dark pb-4">Education History</h3>
                    <!-- Timeline Container -->
                    <div class="relative pl-3 md:pl-4 border-l-2 border-gray-200 dark:border-border-dark space-y-10">
                        <!-- Item 1 -->
                        <div class="relative pl-8 group">
                            <!-- Dot -->
                            <span class="absolute -left-[9px] md:-left-[10px] top-2 size-[18px] rounded-full border-4 border-background-light dark:border-background-dark bg-primary shadow-[0_0_0_4px_rgba(43,108,238,0.2)]"></span>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-primary transition-colors">Master of Computer Science</h4>
                                <span class="inline-flex items-center rounded-md bg-blue-50 dark:bg-blue-900/30 px-2 py-1 text-xs font-medium text-blue-700 dark:text-blue-200 ring-1 ring-inset ring-blue-700/10 dark:ring-blue-400/20 mt-2 sm:mt-0 w-fit">2020 - 2022</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-3 flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">school</span>
                                Tech University of Berlin
                            </div>
                            <p class="text-gray-600 dark:text-text-secondary leading-relaxed">
                                Specialized in Software Engineering and Distributed Systems. Thesis focused on "Optimizing Database Queries in High-Traffic Laravel Applications".
                            </p>
                        </div>
                        <!-- Item 2 -->
                        <div class="relative pl-8 group">
                            <!-- Dot -->
                            <span class="absolute -left-[9px] md:-left-[10px] top-2 size-[18px] rounded-full border-4 border-background-light dark:border-background-dark bg-gray-400 dark:bg-gray-600 group-hover:bg-primary transition-colors"></span>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-primary transition-colors">Bachelor of Science in IT</h4>
                                <span class="inline-flex items-center rounded-md bg-gray-50 dark:bg-gray-800 px-2 py-1 text-xs font-medium text-gray-600 dark:text-gray-300 ring-1 ring-inset ring-gray-500/10 dark:ring-gray-400/20 mt-2 sm:mt-0 w-fit">2016 - 2020</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-3 flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">school</span>
                                State University
                            </div>
                            <p class="text-gray-600 dark:text-text-secondary leading-relaxed">
                                Graduated with Honors. Coursework included Data Structures, Algorithms, Web Development, and Database Management Systems.
                            </p>
                        </div>
                        <!-- Item 3 -->
                        <div class="relative pl-8 group">
                            <!-- Dot -->
                            <span class="absolute -left-[9px] md:-left-[10px] top-2 size-[18px] rounded-full border-4 border-background-light dark:border-background-dark bg-gray-400 dark:bg-gray-600 group-hover:bg-primary transition-colors"></span>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-primary transition-colors">Full Stack Web Bootcamp</h4>
                                <span class="inline-flex items-center rounded-md bg-gray-50 dark:bg-gray-800 px-2 py-1 text-xs font-medium text-gray-600 dark:text-gray-300 ring-1 ring-inset ring-gray-500/10 dark:ring-gray-400/20 mt-2 sm:mt-0 w-fit">2016</span>
                            </div>
                            <div class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-3 flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">code_blocks</span>
                                CodeAcademy
                            </div>
                            <p class="text-gray-600 dark:text-text-secondary leading-relaxed">
                                Intensive 12-week program focused on modern web technologies including HTML5, CSS3, JavaScript, and PHP basics.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body></html>

<!-- Featured Projects Showcase -->
<!DOCTYPE html>

<html class="dark" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Featured Projects - Laravel Developer Portfolio</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b6cee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                        "card-dark": "#1c1f27",
                        "card-light": "#ffffff",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"],
                        "body": ["Noto Sans", "sans-serif"],
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-neutral-900 dark:text-white font-display overflow-x-hidden transition-colors duration-300">
<div class="relative flex h-auto min-h-screen w-full flex-col">
    <!-- Top Navigation -->
    <header class="sticky top-0 z-50 w-full border-b border-neutral-200 dark:border-[#282e39] bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md">
        <div class="flex items-center justify-between px-6 py-4 max-w-7xl mx-auto w-full">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center size-10 rounded-lg bg-primary/10 text-primary">
                    <span class="material-symbols-outlined text-[24px]">terminal</span>
                </div>
                <h2 class="text-xl font-bold tracking-tight">DevPortfolio</h2>
            </div>
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-sm font-medium hover:text-primary transition-colors" href="#">Work</a>
                <a class="text-sm font-medium hover:text-primary transition-colors" href="#">About</a>
                <a class="text-sm font-medium hover:text-primary transition-colors" href="#">Services</a>
                <a class="text-sm font-medium hover:text-primary transition-colors" href="#">Contact</a>
            </nav>
            <div class="flex items-center gap-4">
                <button class="hidden sm:flex h-10 px-5 cursor-pointer items-center justify-center rounded-lg bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-all shadow-lg shadow-primary/25">
                    Hire Me
                </button>
                <!-- Mobile Menu Icon -->
                <button class="md:hidden flex items-center justify-center p-2 text-neutral-500 hover:text-primary">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </header>
    <main class="flex-1 flex flex-col items-center py-10 px-4 md:px-8">
        <div class="w-full max-w-6xl flex flex-col gap-10">
            <!-- Section Header -->
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between border-b border-neutral-200 dark:border-[#282e39] pb-8">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <div class="flex items-center gap-2 text-primary font-bold uppercase tracking-wider text-xs">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Portfolio
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight tracking-tight">
                        Selected Works
                    </h1>
                    <p class="text-neutral-500 dark:text-neutral-400 text-lg mt-2 leading-relaxed">
                        A curated collection of high-performance web applications, SaaS platforms, and digital experiences built with the Laravel ecosystem.
                    </p>
                </div>
                <!-- Filters -->
                <div class="flex flex-wrap gap-2 md:justify-end mt-4 md:mt-0">
                    <button class="flex h-9 items-center justify-center rounded-lg bg-primary text-white px-4 text-sm font-medium shadow-md shadow-primary/20 transition-all">
                        All Projects
                    </button>
                    <button class="flex h-9 items-center justify-center rounded-lg bg-white dark:bg-[#282e39] hover:bg-neutral-100 dark:hover:bg-[#323946] border border-neutral-200 dark:border-transparent px-4 text-sm font-medium transition-all">
                        SaaS
                    </button>
                    <button class="flex h-9 items-center justify-center rounded-lg bg-white dark:bg-[#282e39] hover:bg-neutral-100 dark:hover:bg-[#323946] border border-neutral-200 dark:border-transparent px-4 text-sm font-medium transition-all">
                        E-commerce
                    </button>
                    <button class="flex h-9 items-center justify-center rounded-lg bg-white dark:bg-[#282e39] hover:bg-neutral-100 dark:hover:bg-[#323946] border border-neutral-200 dark:border-transparent px-4 text-sm font-medium transition-all">
                        Open Source
                    </button>
                </div>
            </div>
            <!-- Featured Project (Hero Card) -->
            <div class="@container w-full">
                <div class="group relative flex flex-col lg:flex-row overflow-hidden rounded-2xl bg-card-light dark:bg-card-dark shadow-xl ring-1 ring-neutral-200 dark:ring-[#282e39] transition-all hover:shadow-2xl hover:shadow-primary/5">
                    <!-- Image Section -->
                    <div class="w-full lg:w-3/5 h-64 lg:h-auto relative overflow-hidden bg-neutral-100 dark:bg-[#111318]">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Modern analytics dashboard interface on a laptop screen" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCjsai5EWnQUqIoKntm_onblHGD9vQoSAxNgRP2UWoY4rlApBw_eYajsnxDJnxDB8PS7H1Wse-GRyrKq9aBVFR0Oo4fircizzeNIN9VGUZrXg-0D3VhnXUH9RdG86cqKR7zw1-zVYLjs-vPPhOAL3DYB2tlacfbV8l0qR4fRkU0oodhMFqsH67BbISs3MlTokApijoMGW03NYiLGHLsBKZDPYb-SuKmacYh0AThTpIdRxyblQlP4McPOfuSwn_rp-epctO8NZH-L4M");'>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent lg:bg-gradient-to-r lg:from-transparent lg:to-card-dark/20"></div>
                        <!-- Floating Tag -->
                        <div class="absolute top-4 left-4">
<span class="px-3 py-1 rounded-full bg-white/90 dark:bg-black/80 backdrop-blur text-xs font-bold uppercase tracking-wider shadow-sm">
                                    Featured Project
                                </span>
                        </div>
                    </div>
                    <!-- Content Section -->
                    <div class="flex flex-col p-6 md:p-10 lg:w-2/5 justify-center relative z-10">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2.5 py-1 rounded-md bg-blue-500/10 text-blue-600 dark:text-blue-400 text-xs font-semibold">Laravel 10</span>
                            <span class="px-2.5 py-1 rounded-md bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 text-xs font-semibold">React</span>
                            <span class="px-2.5 py-1 rounded-md bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-xs font-semibold">Tailwind</span>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold mb-3 group-hover:text-primary transition-colors">Orbit Analytics</h3>
                        <p class="text-neutral-600 dark:text-neutral-400 mb-8 leading-relaxed">
                            A comprehensive SaaS analytics platform processing over 1M events daily. Features real-time websocket updates, custom reporting builder, and stripe subscription management.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 mt-auto">
                            <button class="flex items-center justify-center gap-2 h-11 px-6 rounded-lg bg-primary text-white font-bold shadow-lg shadow-primary/25 hover:bg-primary/90 hover:-translate-y-0.5 transition-all">
                                <span class="material-symbols-outlined text-[20px]">rocket_launch</span>
                                Live Demo
                            </button>
                            <button class="flex items-center justify-center gap-2 h-11 px-6 rounded-lg bg-transparent border border-neutral-300 dark:border-neutral-600 text-neutral-700 dark:text-neutral-200 font-medium hover:bg-neutral-100 dark:hover:bg-[#282e39] transition-all">
                                <span class="material-symbols-outlined text-[20px]">code</span>
                                View Code
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 2: E-commerce -->
                <div class="group flex flex-col rounded-xl bg-card-light dark:bg-card-dark overflow-hidden shadow-md ring-1 ring-neutral-200 dark:ring-[#282e39] hover:ring-primary/50 transition-all hover:-translate-y-1">
                    <div class="h-48 w-full bg-cover bg-center relative overflow-hidden" data-alt="Digital payment processing interface on tablet" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDTR01iP2U7N05mXhnXtm7AS50PTsSFJ7X0Vk4gsd5GiCLIcXhsmwLNnlcfea_8isucNIRu89IoCSPcOmCJOxR0otOYjLUa44eckcKM5AYGBXRGe6bfQns_b-qAZsowxDq-9wIdYYNGTSNaMQyVYu9ZRfOvfp9tqT1Q3sxPgawiV6f0NPUvpzo1UlJ3y0bTIygjP2b_hRkr_bu1bXCBUT7nc2o19pX3Jyd3kgggssUyna2hmiFYQy74a9giwKtsHHA4u37tRtV1M5c");'>
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="flex flex-col p-5 flex-grow">
                        <div class="flex gap-2 mb-3 text-xs font-mono text-neutral-400">
                            <span>Vue.js</span> • <span>Laravel</span> • <span>Stripe</span>
                        </div>
                        <h4 class="text-xl font-bold mb-2 group-hover:text-primary transition-colors">Velvet E-commerce</h4>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400 line-clamp-3 mb-6">
                            A headless e-commerce solution featuring dynamic product catalogs, secure payments, and inventory management syncing in real-time.
                        </p>
                        <div class="mt-auto flex items-center justify-between border-t border-neutral-100 dark:border-[#282e39] pt-4">
                            <a class="text-sm font-bold text-primary hover:underline flex items-center gap-1" href="#">
                                View Project <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                            <div class="flex gap-3">
                                <button class="text-neutral-400 hover:text-white transition-colors" title="View Code">
                                    <span class="material-symbols-outlined text-[20px]">code</span>
                                </button>
                                <button class="text-neutral-400 hover:text-white transition-colors" title="Live Preview">
                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 3: API Tool -->
                <div class="group flex flex-col rounded-xl bg-card-light dark:bg-card-dark overflow-hidden shadow-md ring-1 ring-neutral-200 dark:ring-[#282e39] hover:ring-primary/50 transition-all hover:-translate-y-1">
                    <div class="h-48 w-full bg-cover bg-center relative overflow-hidden" data-alt="Code editor screen showing complex backend logic" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBDb7BjfBnqn5JaB2YKXRe3UfEQ2C4WsbA1UEM69bPdh3UxlmAFs7CLmKppPmWHytfLHig6tyW-ld4KDJ-Dw99UIV7CuF6v3aRZpTbDRyrISBtvLE5vq7-ikSBYWNsu-a8QaWrDssR0F9GwUFAsPSxakzpLUc8KdwmNUMJC824G3PH21HJS_1MB_bq3UQ8lA6h3dkAFzU82KNwGHMI7fxTwDAQ4b7YAFICt5q4QijdW-N8SFSASeRWKufnuSPHqeJWFCrAXDQmumyQ");'>
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="flex flex-col p-5 flex-grow">
                        <div class="flex gap-2 mb-3 text-xs font-mono text-neutral-400">
                            <span>Redis</span> • <span>Docker</span> • <span>Microservices</span>
                        </div>
                        <h4 class="text-xl font-bold mb-2 group-hover:text-primary transition-colors">LaraCache API</h4>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400 line-clamp-3 mb-6">
                            High-performance caching layer for legacy APIs. Reduced response times by 85% using Redis clusters and asynchronous queue processing.
                        </p>
                        <div class="mt-auto flex items-center justify-between border-t border-neutral-100 dark:border-[#282e39] pt-4">
                            <a class="text-sm font-bold text-primary hover:underline flex items-center gap-1" href="#">
                                View Project <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                            <div class="flex gap-3">
                                <button class="text-neutral-400 hover:text-white transition-colors" title="View Code">
                                    <span class="material-symbols-outlined text-[20px]">code</span>
                                </button>
                                <button class="text-neutral-400 hover:text-white transition-colors" title="Live Preview">
                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 4: Real Estate -->
                <div class="group flex flex-col rounded-xl bg-card-light dark:bg-card-dark overflow-hidden shadow-md ring-1 ring-neutral-200 dark:ring-[#282e39] hover:ring-primary/50 transition-all hover:-translate-y-1">
                    <div class="h-48 w-full bg-cover bg-center relative overflow-hidden" data-alt="Modern building facade representing real estate portfolio" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuADqRDt_szDtHNJGkYRDKig016AOaaD0GDsdKUXRTysljpOIZbo2sxYshioI_9M6AXKRL8ZxitrccjsF2d50Z38D__uHlyFjliZwMFqJvlPQvioMP8wXFCU8xn8GG_9EgFxL97ZjTT3iQnUwA5nBcZ3OpeEfGzOkSzUCwiRodeAUZsxN9MEF1Sn8xMCnaPq_CccAB0SSVG-ypC4KNbyCcjNYo5NhsFq1iGO10RlBfLwV0kAkEnLMw93lOPxSULEEPsxUpDjHr80MCg");'>
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                    </div>
                    <div class="flex flex-col p-5 flex-grow">
                        <div class="flex gap-2 mb-3 text-xs font-mono text-neutral-400">
                            <span>Livewire</span> • <span>Alpine.js</span> • <span>Mapbox</span>
                        </div>
                        <h4 class="text-xl font-bold mb-2 group-hover:text-primary transition-colors">Urban Estate</h4>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400 line-clamp-3 mb-6">
                            A property listing platform with interactive maps and virtual tours. Utilizes Livewire for SPA-like feel without the complexity of a JS framework.
                        </p>
                        <div class="mt-auto flex items-center justify-between border-t border-neutral-100 dark:border-[#282e39] pt-4">
                            <a class="text-sm font-bold text-primary hover:underline flex items-center gap-1" href="#">
                                View Project <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                            <div class="flex gap-3">
                                <button class="text-neutral-400 hover:text-white transition-colors" title="View Code">
                                    <span class="material-symbols-outlined text-[20px]">code</span>
                                </button>
                                <button class="text-neutral-400 hover:text-white transition-colors" title="Live Preview">
                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call to Action / Footer of section -->
            <div class="flex justify-center mt-6">
                <button class="group flex items-center justify-center gap-2 px-8 py-3 rounded-full border border-neutral-200 dark:border-[#282e39] bg-white dark:bg-[#1c1f27] text-sm font-bold hover:border-primary hover:text-primary transition-all shadow-sm">
                    View All Projects
                    <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </button>
            </div>
        </div>
    </main>
    <!-- Simple Footer for context -->
    <footer class="w-full border-t border-neutral-200 dark:border-[#282e39] py-8 bg-background-light dark:bg-background-dark">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-neutral-500 text-sm">© 2023 DevPortfolio. Built with Laravel &amp; Tailwind.</p>
            <div class="flex gap-6">
                <a class="text-neutral-400 hover:text-primary" href="#"><span class="material-symbols-outlined">mail</span></a>
                <a class="text-neutral-400 hover:text-primary" href="#"><span class="material-symbols-outlined">share</span></a>
            </div>
        </div>
    </footer>
</div>
</body></html>

<!-- Tools & Technologies - Toolkit Overview -->
<!DOCTYPE html>

<html class="dark" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tools &amp; Technologies - Toolkit Overview</title>
    <!-- Google Fonts: Manrope -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b6cee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                        "card-dark": "#1a2230", // Slightly lighter than background-dark
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Manrope', sans-serif;
        }
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 300,
                'GRAD' 0,
                'opsz' 24
        }
        /* Custom scrollbar for a cleaner look */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #101622;
        }
        ::-webkit-scrollbar-thumb {
            background: #2b6cee;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1e4eb5;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen flex flex-col overflow-x-hidden">
<!-- Main Container -->
<div class="flex-grow w-full max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
    <!-- Header Section -->
    <div class="flex flex-col items-center justify-center text-center mb-16 space-y-4">
        <h1 class="font-display text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white">
            My <span class="text-primary">Toolkit</span>
        </h1>
        <p class="max-w-2xl text-lg text-slate-600 dark:text-slate-400 font-medium">
            The software, frameworks, and technologies I use daily to build robust, scalable, and modern web applications.
        </p>
        <div class="h-1 w-20 bg-primary rounded-full mt-4"></div>
    </div>
    <!-- Grid Layout -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Card 1: PhpStorm -->
        <div class="group relative flex flex-col gap-4 p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-card-dark shadow-sm hover:shadow-xl hover:shadow-primary/10 hover:border-primary/50 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <span class="material-symbols-outlined text-3xl">terminal</span>
                </div>
                <h3 class="text-xl font-bold font-display text-slate-900 dark:text-white">PhpStorm</h3>
            </div>
            <div>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Primary IDE for robust PHP development. Features intelligent coding assistance and deep code understanding.
                </p>
            </div>
        </div>
        <!-- Card 2: Laravel -->
        <div class="group relative flex flex-col gap-4 p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-card-dark shadow-sm hover:shadow-xl hover:shadow-primary/10 hover:border-primary/50 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <span class="material-symbols-outlined text-3xl">layers</span>
                </div>
                <h3 class="text-xl font-bold font-display text-slate-900 dark:text-white">Laravel</h3>
            </div>
            <div>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    The framework of choice for scalable backends. Elegant syntax for complex web applications.
                </p>
            </div>
        </div>
        <!-- Card 3: Git -->
        <div class="group relative flex flex-col gap-4 p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-card-dark shadow-sm hover:shadow-xl hover:shadow-primary/10 hover:border-primary/50 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <span class="material-symbols-outlined text-3xl">account_tree</span>
                </div>
                <h3 class="text-xl font-bold font-display text-slate-900 dark:text-white">Git</h3>
            </div>
            <div>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Version control and CI/CD pipelines. Essential for collaboration and maintaining code history.
                </p>
            </div>
        </div>
        <!-- Card 4: Composer -->
        <div class="group relative flex flex-col gap-4 p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-card-dark shadow-sm hover:shadow-xl hover:shadow-primary/10 hover:border-primary/50 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <span class="material-symbols-outlined text-3xl">package_2</span>
                </div>
                <h3 class="text-xl font-bold font-display text-slate-900 dark:text-white">Composer</h3>
            </div>
            <div>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Dependency management master. Managing libraries and external packages effortlessly.
                </p>
            </div>
        </div>
        <!-- Card 5: Docker -->
        <div class="group relative flex flex-col gap-4 p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-card-dark shadow-sm hover:shadow-xl hover:shadow-primary/10 hover:border-primary/50 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <span class="material-symbols-outlined text-3xl">view_in_ar</span>
                </div>
                <h3 class="text-xl font-bold font-display text-slate-900 dark:text-white">Docker</h3>
            </div>
            <div>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Containerization for consistent environments. ensuring "it works on my machine" everywhere.
                </p>
            </div>
        </div>
        <!-- Card 6: MySQL -->
        <div class="group relative flex flex-col gap-4 p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-card-dark shadow-sm hover:shadow-xl hover:shadow-primary/10 hover:border-primary/50 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <span class="material-symbols-outlined text-3xl">database</span>
                </div>
                <h3 class="text-xl font-bold font-display text-slate-900 dark:text-white">MySQL</h3>
            </div>
            <div>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Database design and optimization. Storing and retrieving data with speed and reliability.
                </p>
            </div>
        </div>
        <!-- Card 7: Tailwind CSS -->
        <div class="group relative flex flex-col gap-4 p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-card-dark shadow-sm hover:shadow-xl hover:shadow-primary/10 hover:border-primary/50 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <span class="material-symbols-outlined text-3xl">palette</span>
                </div>
                <h3 class="text-xl font-bold font-display text-slate-900 dark:text-white">Tailwind CSS</h3>
            </div>
            <div>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Rapid UI development. Utility-first CSS framework for building modern designs efficiently.
                </p>
            </div>
        </div>
        <!-- Card 8: Vue.js -->
        <div class="group relative flex flex-col gap-4 p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-card-dark shadow-sm hover:shadow-xl hover:shadow-primary/10 hover:border-primary/50 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <span class="material-symbols-outlined text-3xl">code_blocks</span>
                </div>
                <h3 class="text-xl font-bold font-display text-slate-900 dark:text-white">Vue.js</h3>
            </div>
            <div>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Interactive frontend interfaces. The progressive JavaScript framework for the modern web.
                </p>
            </div>
        </div>
    </div>
    <!-- Optional Bottom Action -->
    <div class="mt-16 flex justify-center">
        <button class="flex items-center gap-2 px-8 py-3 bg-primary hover:bg-blue-600 text-white font-bold rounded-lg transition-colors duration-300 shadow-lg shadow-primary/30">
            <span class="material-symbols-outlined">download</span>
            Download My Resume
        </button>
    </div>
</div>
</body></html>

<!-- Contact Form - Reach Out -->
<!DOCTYPE html>

<html class="dark" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Contact - LaravelDev</title>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Google Fonts: Manrope -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Tailwind Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b6cee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                        "surface-dark": "#1c1f27",
                        "border-dark": "#282e39",
                        "input-border": "#3b4354",
                        "text-secondary": "#9da6b9",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-gray-900 dark:text-white font-display overflow-x-hidden antialiased selection:bg-primary/30 selection:text-primary">
<div class="relative flex min-h-screen flex-col">
    <!-- Navigation -->
    <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-border-dark px-6 py-4 lg:px-10 bg-background-dark/95 backdrop-blur-md sticky top-0 z-50">
        <div class="flex items-center gap-4 text-white cursor-pointer">
            <div class="size-8 flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-[32px]">terminal</span>
            </div>
            <h2 class="text-white text-xl font-bold leading-tight tracking-[-0.015em]">LaravelDev</h2>
        </div>
        <div class="hidden lg:flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-8">
                <a class="text-white text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Portfolio</a>
                <a class="text-white text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Services</a>
                <a class="text-white text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">About</a>
                <a class="text-white text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Blog</a>
                <a class="text-primary text-sm font-bold leading-normal" href="#">Contact</a>
            </div>
            <button class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary hover:bg-blue-600 transition-colors text-white text-sm font-bold leading-normal tracking-[0.015em] shadow-lg shadow-primary/20">
                <span class="truncate">Hire Me</span>
            </button>
        </div>
        <div class="lg:hidden text-white">
            <span class="material-symbols-outlined">menu</span>
        </div>
    </header>
    <!-- Main Content -->
    <main class="flex-1 flex flex-col items-center justify-center py-10 lg:py-16 px-4 md:px-10">
        <div class="layout-content-container flex flex-col max-w-[1200px] w-full flex-1 gap-12">
            <!-- Page Header -->
            <div class="flex flex-col gap-4 text-center max-w-3xl mx-auto">
                <h1 class="text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em]">
                    Let's Work Together
                </h1>
                <p class="text-text-secondary text-lg font-normal leading-relaxed">
                    Have a project in mind? Let's discuss how we can create scalable, robust solutions with Laravel tailored to your business needs.
                </p>
            </div>
            <!-- Contact Split Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 mt-4">
                <!-- Left Column: Contact Info -->
                <div class="lg:col-span-5 flex flex-col gap-8 order-2 lg:order-1">
                    <div class="flex flex-col gap-6">
                        <h2 class="text-white text-2xl font-bold tracking-tight">Direct Channels</h2>
                        <p class="text-text-secondary text-base">Prefer to reach out directly? Use the information below for immediate inquiries.</p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <!-- Email Card -->
                        <div class="flex items-center gap-4 rounded-xl border border-border-dark bg-surface-dark p-5 transition-all hover:border-primary/50 group">
                            <div class="flex items-center justify-center size-12 rounded-full bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined">mail</span>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-white text-base font-bold">Email</h3>
                                <a class="text-text-secondary text-sm hover:text-white transition-colors" href="mailto:hello@developer.com">hello@developer.com</a>
                            </div>
                        </div>
                        <!-- Phone Card -->
                        <div class="flex items-center gap-4 rounded-xl border border-border-dark bg-surface-dark p-5 transition-all hover:border-primary/50 group">
                            <div class="flex items-center justify-center size-12 rounded-full bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined">call</span>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-white text-base font-bold">Phone</h3>
                                <a class="text-text-secondary text-sm hover:text-white transition-colors" href="tel:+15551234567">+1 (555) 123-4567</a>
                            </div>
                        </div>
                        <!-- Socials Card -->
                        <div class="flex items-center gap-4 rounded-xl border border-border-dark bg-surface-dark p-5 transition-all hover:border-primary/50 group">
                            <div class="flex items-center justify-center size-12 rounded-full bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined">share</span>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-white text-base font-bold">Socials</h3>
                                <div class="flex gap-4 mt-1">
                                    <a class="text-text-secondary text-xs font-bold uppercase tracking-wider hover:text-primary" href="#">LinkedIn</a>
                                    <span class="text-text-secondary text-xs">•</span>
                                    <a class="text-text-secondary text-xs font-bold uppercase tracking-wider hover:text-primary" href="#">GitHub</a>
                                    <span class="text-text-secondary text-xs">•</span>
                                    <a class="text-text-secondary text-xs font-bold uppercase tracking-wider hover:text-primary" href="#">Twitter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Map / Location Visual -->
                    <div class="w-full h-48 rounded-xl overflow-hidden relative border border-border-dark mt-auto bg-surface-dark">
                        <div class="absolute inset-0 bg-gradient-to-tr from-background-dark/80 to-transparent z-10"></div>
                        <div class="absolute bottom-4 left-4 z-20">
                            <p class="text-white font-bold text-sm flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-lg">location_on</span>
                                San Francisco, CA
                            </p>
                        </div>
                        <div class="w-full h-full bg-cover bg-center opacity-60 grayscale hover:grayscale-0 transition-all duration-500" data-alt="Map view of San Francisco city streets" data-location="San Francisco Map" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCvwyCjcUAekvVVtJHw4ohyicceP-k3Z8iPdlHRkoHicOJwXAdG7kYnDi7EDsvnNKixG4zh80kDOhM8fLni220QKiDVXUwWQGu768fCZrGRlE5bk_QdZNOQnyZnnFkRX7NHurvMF6-cQGIeFoorD7tnL_t19seW4uv1WozNrFKWsXYbC4BW101pbBFvCvd9zAFFTDUS2Q5Ohuop_QooV2hoitMcTyp_Jfmc4E_cVDf1WGNU6s9iYEG5yqi_vkmx-6P_Bed3SiMoEFY');"></div>
                    </div>
                </div>
                <!-- Right Column: Form -->
                <div class="lg:col-span-7 order-1 lg:order-2">
                    <div class="flex flex-col rounded-2xl border border-border-dark bg-surface-dark p-6 md:p-8 lg:p-10 shadow-2xl shadow-black/40">
                        <h2 class="text-white text-2xl font-bold mb-6">Send a Message</h2>
                        <form class="flex flex-col gap-6">
                            <!-- Row 1: Name & Email -->
                            <div class="flex flex-col md:flex-row gap-6">
                                <label class="flex flex-col flex-1 gap-2">
                                    <span class="text-white text-sm font-semibold">Full Name</span>
                                    <input class="w-full rounded-lg border border-input-border bg-background-dark px-4 py-3.5 text-white placeholder-text-secondary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-all" placeholder="John Doe" type="text"/>
                                </label>
                                <label class="flex flex-col flex-1 gap-2">
                                    <span class="text-white text-sm font-semibold">Email Address</span>
                                    <input class="w-full rounded-lg border border-input-border bg-background-dark px-4 py-3.5 text-white placeholder-text-secondary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-all" placeholder="john@example.com" type="email"/>
                                </label>
                            </div>
                            <!-- Row 2: Phone & Subject -->
                            <div class="flex flex-col md:flex-row gap-6">
                                <label class="flex flex-col flex-1 gap-2">
                                    <span class="text-white text-sm font-semibold">Phone (Optional)</span>
                                    <input class="w-full rounded-lg border border-input-border bg-background-dark px-4 py-3.5 text-white placeholder-text-secondary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-all" placeholder="+1 (555) 000-0000" type="tel"/>
                                </label>
                                <label class="flex flex-col flex-1 gap-2">
                                    <span class="text-white text-sm font-semibold">Subject</span>
                                    <div class="relative">
                                        <select class="w-full appearance-none rounded-lg border border-input-border bg-background-dark px-4 py-3.5 text-white focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-all">
                                            <option>General Inquiry</option>
                                            <option>Project Proposal</option>
                                            <option>Consultation</option>
                                            <option>Other</option>
                                        </select>
                                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-text-secondary pointer-events-none">expand_more</span>
                                    </div>
                                </label>
                            </div>
                            <!-- Row 3: Message -->
                            <label class="flex flex-col gap-2">
                                <span class="text-white text-sm font-semibold">Message</span>
                                <textarea class="w-full rounded-lg border border-input-border bg-background-dark px-4 py-3.5 text-white placeholder-text-secondary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary resize-y transition-all" placeholder="Tell me about your project..." rows="5"></textarea>
                            </label>
                            <!-- Submit Button -->
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-text-secondary text-sm hidden md:block">I usually respond within 24 hours.</p>
                                <button class="w-full md:w-auto flex cursor-pointer items-center justify-center gap-2 rounded-lg bg-primary px-8 py-3.5 text-white font-bold text-base shadow-lg shadow-primary/25 hover:bg-blue-600 hover:shadow-primary/40 transition-all active:scale-[0.98]" type="button">
                                    <span>Send Message</span>
                                    <span class="material-symbols-outlined text-[20px]">send</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Minimal Footer -->
    <footer class="border-t border-border-dark py-8 bg-background-dark">
        <div class="flex flex-col md:flex-row items-center justify-center gap-6 px-10 text-center">
            <p class="text-text-secondary text-sm font-medium">© 2024 LaravelDev Portfolio. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a class="text-text-secondary hover:text-white transition-colors text-sm" href="#">Privacy Policy</a>
                <a class="text-text-secondary hover:text-white transition-colors text-sm" href="#">Terms of Service</a>
            </div>
        </div>
    </footer>
</div>
</body></html>

<!-- Hero Section - Modern Portfolio -->
<!DOCTYPE html>

<html class="dark" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Mokaddes Hosain - Modern Portfolio</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2b6cee",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                        "card-dark": "#1a202c",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                    animation: {
                        'blob': 'blob 7s infinite',
                    },
                    keyframes: {
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        }
                    }
                },
            },
        }
    </script>
    <style>
        /* Custom scrollbar for a cleaner look */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #101622;
        }
        ::-webkit-scrollbar-thumb {
            background: #2b6cee;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1e4baf;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white font-display overflow-x-hidden selection:bg-primary selection:text-white">
<!-- Top Navigation -->
<header class="fixed top-0 left-0 right-0 z-50 bg-background-light/90 dark:bg-background-dark/90 backdrop-blur-md border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="size-10 rounded bg-primary flex items-center justify-center text-white shadow-lg shadow-primary/30">
                <span class="material-symbols-outlined text-[24px]">terminal</span>
            </div>
            <h2 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Mokaddes<span class="text-primary">.dev</span></h2>
        </div>
        <nav class="hidden md:flex items-center gap-8">
            <a class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Home</a>
            <a class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">About</a>
            <a class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Portfolio</a>
            <a class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Blog</a>
        </nav>
        <div class="flex items-center gap-4">
            <button class="hidden sm:flex h-10 px-5 items-center justify-center rounded-lg bg-primary hover:bg-blue-600 text-white text-sm font-bold shadow-lg shadow-primary/20 transition-all transform hover:-translate-y-0.5">
                Hire Me
            </button>
            <button class="md:hidden p-2 text-gray-600 dark:text-gray-300 hover:text-primary">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </div>
</header>
<!-- Main Content Wrapper -->
<main class="relative pt-20 flex flex-col justify-center min-h-screen">
    <!-- Background Abstract Elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500/10 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute top-40 right-10 w-72 h-72 bg-primary/10 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-1/2 w-72 h-72 bg-pink-500/10 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
    <div class="container max-w-7xl mx-auto px-6 py-12 lg:py-20 relative z-10 flex flex-col-reverse lg:flex-row items-center gap-12 lg:gap-20">
        <!-- Left Column: Text Content -->
        <div class="flex-1 flex flex-col items-start text-left space-y-8 animate-fade-in-up">
            <div class="space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-sm font-bold tracking-wide uppercase">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
</span>
                    Available for work
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-[1.1] tracking-tight text-gray-900 dark:text-white">
                    Hello, I'm <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-500 dark:from-white dark:to-gray-400">Mokaddes Hosain</span>
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-500 dark:text-gray-400">
                    Senior <span class="text-primary">Laravel Developer</span>
                </h2>
            </div>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-xl leading-relaxed">
                I craft secure, scalable, and high-performance web applications. Specializing in the TALL stack and modern backend architecture to bring digital ideas to life.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                <button class="h-12 px-8 flex items-center justify-center gap-2 rounded-lg bg-primary hover:bg-blue-600 text-white font-bold text-base shadow-lg shadow-primary/25 transition-all transform hover:-translate-y-1">
                    <span class="material-symbols-outlined text-[20px]">download</span>
                    <span>Download CV</span>
                </button>
                <button class="h-12 px-8 flex items-center justify-center gap-2 rounded-lg border border-gray-300 dark:border-gray-700 hover:border-primary dark:hover:border-primary text-gray-700 dark:text-white hover:text-primary dark:hover:text-primary font-bold text-base bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm transition-all transform hover:-translate-y-1">
                    <span class="material-symbols-outlined text-[20px]">mail</span>
                    <span>Contact Me</span>
                </button>
            </div>
            <!-- Social Proof / Links -->
            <div class="pt-6 border-t border-gray-200 dark:border-gray-800 w-full max-w-md">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-4">Connect with me</p>
                <div class="flex gap-4">
                    <a class="group flex items-center justify-center size-12 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-primary text-gray-500 dark:text-gray-400 hover:text-white transition-all" href="#">
                        <span class="material-symbols-outlined group-hover:scale-110 transition-transform">code</span>
                    </a>
                    <a class="group flex items-center justify-center size-12 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-[#0077b5] text-gray-500 dark:text-gray-400 hover:text-white transition-all" href="#">
                        <span class="material-symbols-outlined group-hover:scale-110 transition-transform">work</span>
                    </a>
                    <a class="group flex items-center justify-center size-12 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-sky-500 text-gray-500 dark:text-gray-400 hover:text-white transition-all" href="#">
                        <span class="material-symbols-outlined group-hover:scale-110 transition-transform">alternate_email</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Right Column: Visual -->
        <div class="flex-1 w-full flex justify-center lg:justify-end relative">
            <div class="relative w-[320px] h-[400px] md:w-[400px] md:h-[500px] lg:w-[450px] lg:h-[550px]">
                <!-- Decorative back layers -->
                <div class="absolute top-0 right-0 w-full h-full bg-gradient-to-bl from-primary to-purple-600 rounded-[2rem] opacity-20 rotate-6 transform translate-x-4 translate-y-4"></div>
                <div class="absolute top-0 right-0 w-full h-full border border-gray-200 dark:border-gray-700 rounded-[2rem] -rotate-3 transform -translate-x-2 -translate-y-2 bg-background-light dark:bg-gray-900"></div>
                <!-- Main Image Container -->
                <div class="absolute inset-0 rounded-[2rem] overflow-hidden shadow-2xl bg-gray-800">
                    <img alt="Professional portrait of developer in a studio setting" class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-700 ease-out" data-alt="Professional portrait of developer in a studio setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAn5N6bD8Gt4E68bqDiqFqsuAzbeooDNIyJnFAwsAg9T8d7v0rcqMALmpdeYw9TCxbxypvs15JkRUxkh2eDTTdN4KcxUs5MEMo0Ycza-_77PsZPuXM-BwkXO6ZoFl2GfYRwIczVzAZnL186bxzjdqh2spfrMLMtu05REq7ci1h1im_Wr0zdikpKlFzmVif9eqs64uvxZPaIrkXS970Rq_cmc79VdZE0rmUQjssV8n6PenzblmosalkZsZZ_0a1FYkPtt4PWBnbmfz4"/>
                    <!-- Gradient Overlay at bottom for better text contrast if needed -->
                    <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>
                <!-- Floating Badge: Experience -->
                <div class="absolute -bottom-6 -left-6 md:bottom-10 md:-left-12 bg-white dark:bg-card-dark p-4 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 flex items-center gap-4 animate-bounce-slow">
                    <div class="flex items-center justify-center size-12 rounded-full bg-primary/10 text-primary">
                        <span class="material-symbols-outlined">hotel_class</span>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white leading-none">5+</p>
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400 mt-1">Years Experience</p>
                    </div>
                </div>
                <!-- Floating Badge: Projects -->
                <div class="absolute top-10 -right-4 md:top-20 md:-right-12 bg-white dark:bg-card-dark p-3 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 flex items-center gap-3 animate-pulse">
                    <div class="flex items-center justify-center size-10 rounded-full bg-green-500/10 text-green-500">
                        <span class="material-symbols-outlined text-[20px]">rocket_launch</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900 dark:text-white">50+ Projects</p>
                        <p class="text-[10px] font-medium text-gray-500 dark:text-gray-400">Completed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body></html>
