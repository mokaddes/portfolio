@extends('layouts.portfolio')

@php use Illuminate\Support\Str; @endphp

@section('title', $project->name.' | Case Study')
@section('meta_description', $project->short_description.' — Read the full case study for '.$project->name.' by '.($profileName ?? 'Mokaddes Hosain').'.')
@section('header_tag', 'Case Study')

@section('content')
    <nav class="mx-auto max-w-7xl px-4 pt-8 sm:px-6 lg:px-8 lg:pt-10">
        <div class="reveal flex items-center gap-2 text-xs text-slate-400">
            <a href="{{ route('projects.index') }}" class="transition hover:text-amber-300">Projects</a>
            <span class="text-slate-600">/</span>
            <span class="text-white">{{ $project->name }}</span>
        </div>
    </nav>

    <section class="relative mx-auto max-w-7xl px-4 pb-10 pt-4 sm:px-6 lg:px-8 lg:pb-14 lg:pt-8">
        <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute left-1/4 top-1/4 h-[30vw] w-[30vw] rounded-full bg-amber-400/5 opacity-40 mix-blend-screen blur-[80px]"></div>
            <div class="absolute bottom-1/4 right-1/4 h-[20vw] w-[20vw] rounded-full bg-emerald-400/5 opacity-20 mix-blend-screen blur-[60px]"></div>
        </div>

        <div class="reveal flex flex-col items-center gap-8 lg:flex-row lg:gap-16">
            <div class="relative z-10 w-full lg:w-5/12">
                <div class="mb-4 inline-flex items-center gap-1.5 rounded-full border border-white/5 bg-white/5 px-2.5 py-1 text-[10px] uppercase tracking-[0.18em] text-slate-300 backdrop-blur-md">
                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-emerald-400"></span>
                    Case Study
                </div>
                <h1 class="font-display text-2xl font-bold text-white sm:text-3xl lg:text-4xl">
                    {{ $project->name }}
                    <span class="block bg-gradient-to-r from-amber-400 to-emerald-400 bg-clip-text text-transparent">{{ $project->category->name ?? 'Platform' }}</span>
                </h1>
                <p class="mt-3 max-w-xl text-base leading-7 text-slate-300">{{ $project->short_description }}</p>

                <div class="mt-4 flex flex-wrap items-center gap-2">
                    <span class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3 py-1 text-[10px] font-semibold text-amber-200">{{ $project->category->name ?? 'Project' }}</span>
                    @if($project->is_featured)
                        <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-[10px] font-semibold text-emerald-200">Featured</span>
                    @endif
                    @foreach(collect($project->technologies ?? [])->take(3) as $tech)
                        <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-[10px] text-slate-200">{{ $tech }}</span>
                    @endforeach
                </div>

                <div class="mt-5 flex flex-wrap items-center gap-3">
                    @if($project->url)
                        <a href="{{ $project->url }}" target="_blank" rel="noopener" class="btn-primary inline-flex items-center gap-1.5 rounded-full px-5 py-2 text-xs font-bold transition hover:scale-[1.02]">
                            Visit Live Site <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    @endif
                    <a href="{{ route('projects.index') }}" class="btn-ghost inline-flex items-center gap-1.5 rounded-full px-5 py-2 text-xs font-semibold text-white transition">
                        <i class="fa-solid fa-th-large text-[10px]"></i> All Projects
                    </a>
                </div>
            </div>

            <div class="relative z-10 w-full lg:w-7/12">
                <div class="group relative aspect-[16/9] overflow-hidden rounded-lg border border-white/5 bg-slate-950/60 shadow-xl shadow-black/50">
                    <div class="pointer-events-none absolute inset-0 z-10 bg-gradient-to-tr from-amber-400/10 to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                    <img src="{{ asset($projectImage) }}" alt="{{ $project->name }} — {{ $project->short_description }}" class="h-full w-full rounded-lg object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="absolute -bottom-4 -left-4 h-20 w-20 rounded-full border border-amber-400/20 blur-sm"></div>
                <div class="absolute -right-4 -top-4 h-16 w-16 rounded-full border border-emerald-400/20 blur-sm"></div>
            </div>
        </div>
    </section>

    <section class="border-y border-white/5 bg-slate-950/40 py-10">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-6 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
            <div class="lg:col-span-4">
                <h2 class="font-display text-xl font-bold text-white sm:text-2xl">System Overview</h2>
                <div class="mt-3 h-0.5 w-10 rounded-full bg-amber-400/50"></div>
            </div>
            <div class="lg:col-span-8">
                <p class="leading-7 text-slate-300">{{ $project->long_description }}</p>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-4 md:grid-cols-3">
            <div class="group relative flex h-full flex-col rounded-lg border-t border-white/10 bg-white/5 p-5 shadow transition-all duration-300 hover:border-amber-400/30 hover:shadow-[0_4px_20px_rgba(242,169,59,0.06)]">
                <div class="pointer-events-none absolute inset-0 rounded-lg bg-gradient-to-b from-white/5 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-white/5 bg-slate-950/60 transition-colors group-hover:border-amber-400/20">
                    <i class="fa-solid fa-circle-exclamation text-xs text-slate-400 transition-colors group-hover:text-amber-300"></i>
                </div>
                <h3 class="mb-2 font-display text-base font-bold text-white">The Challenge</h3>
                <p class="flex-grow text-sm leading-6 text-slate-400">{{ $project->problem }}</p>
            </div>
            <div class="group relative flex h-full flex-col rounded-lg border-t border-white/10 bg-white/5 p-5 shadow transition-all duration-300 hover:border-emerald-400/30 hover:shadow-[0_4px_20px_rgba(52,211,153,0.06)]">
                <div class="pointer-events-none absolute inset-0 rounded-lg bg-gradient-to-b from-white/5 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-white/5 bg-slate-950/60 transition-colors group-hover:border-emerald-400/20">
                    <i class="fa-solid fa-lightbulb text-xs text-slate-400 transition-colors group-hover:text-emerald-300"></i>
                </div>
                <h3 class="mb-2 font-display text-base font-bold text-white">The Solution</h3>
                <p class="flex-grow text-sm leading-6 text-slate-400">{{ $project->solution }}</p>
            </div>
            <div class="group relative flex h-full flex-col rounded-lg border-t border-white/10 bg-white/5 p-5 shadow transition-all duration-300 hover:border-sky-400/30 hover:shadow-[0_4px_20px_rgba(56,189,248,0.06)]">
                <div class="pointer-events-none absolute inset-0 rounded-lg bg-gradient-to-b from-white/5 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-white/5 bg-slate-950/60 transition-colors group-hover:border-sky-400/20">
                    <i class="fa-solid fa-user-gear text-xs text-slate-400 transition-colors group-hover:text-sky-300"></i>
                </div>
                <h3 class="mb-2 font-display text-base font-bold text-white">My Role</h3>
                <p class="flex-grow text-sm leading-6 text-slate-400">{{ $project->my_contribution }}</p>
            </div>
        </div>
    </section>

    @php
        $allImages = collect();

        foreach ($galleryItems as $gallery) {
            $allImages->push(['type' => 'gallery', 'src' => $gallery->image, 'caption' => $gallery->caption ?? null]);
        }
    @endphp

    @if($allImages->count() > 1)
        <section class="relative overflow-hidden border-y border-white/5 bg-slate-950/40 py-10">
            <div class="pointer-events-none absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.12) 1px, transparent 0); background-size: 32px 32px;"></div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <h2 class="font-display text-xl font-bold text-white sm:text-2xl">Interface Gallery</h2>
                        <p class="mt-1 text-xs text-slate-400">Visualizing the project interface and key workflows.</p>
                    </div>
                    <div class="hidden gap-3 md:flex">
                        <button type="button" id="slider-prev" aria-label="Previous image" class="flex h-9 w-9 items-center justify-center rounded-full border border-white/10 bg-white/5 text-xs text-slate-300 transition hover:border-white/20 hover:bg-white/10">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button type="button" id="slider-next" aria-label="Next image" class="flex h-9 w-9 items-center justify-center rounded-full border border-white/10 bg-white/5 text-xs text-slate-300 transition hover:border-white/20 hover:bg-white/10">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div id="slider-container" class="relative w-full rounded-2xl overflow-hidden bg-surface-container aspect-video md:aspect-[21/9] shadow-2xl border border-white/5 group" role="region" aria-label="Project images" tabindex="0">
                    <div class="flex w-full h-full transition-transform duration-500 ease-in-out" id="slider-track">
                        @foreach($allImages as $index => $image)
                            {{-- AFTER (Forces exact 100% width per slide) --}}
                            <div class="w-full h-full relative shrink-0" role="group" aria-label="{{ ($index + 1).' of '.$allImages->count() }}" aria-roledescription="slide">
                                <img src="{{ asset($image['src']) }}" alt="{{ $image['caption'] ?? $project->name.' screenshot' }}" class="h-full w-full object-cover object-top">
                                @if($image['caption'])
                                    <div class="pointer-events-none absolute bottom-0 left-0 w-full bg-gradient-to-t from-slate-950 via-slate-950/80 to-transparent p-5">
                                        <span class="mb-1 block text-[10px] uppercase tracking-[0.18em] text-amber-300">Screenshot</span>
                                        <h4 class="font-display text-sm font-bold text-white">{{ $image['caption'] }}</h4>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="absolute inset-y-0 left-0 flex w-12 items-center justify-center bg-gradient-to-r from-slate-950/50 to-transparent opacity-0 transition-opacity group-hover:opacity-100 md:hidden">
                        <button type="button" id="slider-prev-mobile" aria-label="Previous image" class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-950/50 text-white backdrop-blur">
                            <i class="fa-solid fa-chevron-left text-xs"></i>
                        </button>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex w-12 items-center justify-center bg-gradient-to-l from-slate-950/50 to-transparent opacity-0 transition-opacity group-hover:opacity-100 md:hidden">
                        <button type="button" id="slider-next-mobile" aria-label="Next image" class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-950/50 text-white backdrop-blur">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>
                <div id="slider-dots" class="mt-4 flex justify-center gap-2" role="tablist" aria-label="Slides">
                    @foreach($allImages as $index => $image)
                        <button type="button" role="tab" aria-label="Slide {{ $index + 1 }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}" class="h-2 w-2 rounded-full transition-all focus:outline-none focus:ring-2 focus:ring-amber-400/50 {{ $index === 0 ? 'bg-amber-400' : 'bg-slate-700 hover:bg-slate-600' }}"></button>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2">
            @if(collect($project->features ?? [])->isNotEmpty())
                <div>
                    <h2 class="font-display mb-5 flex items-center gap-3 text-xl font-bold text-white sm:text-2xl">
                        <i class="fa-solid fa-microchip text-amber-400"></i>
                        Key Features
                    </h2>
                    <div class="space-y-3">
                        @foreach($project->features as $feature)
                            <div class="group relative overflow-hidden rounded-lg border-t border-white/5 bg-white/5 p-4">
                                <div class="absolute bottom-0 left-0 top-0 w-0.5 bg-amber-400/20 transition-colors group-hover:bg-amber-400"></div>
                                <div class="flex gap-3">
                                    <i class="fa-solid fa-check mt-0.5 text-xs text-emerald-400"></i>
                                    <span class="text-sm leading-6 text-slate-300">{{ $feature }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div>
                <h2 class="font-display mb-5 flex items-center gap-3 text-xl font-bold text-white sm:text-2xl">
                    <i class="fa-solid fa-sitemap text-emerald-400"></i>
                    Architecture
                </h2>
                <div class="space-y-3 leading-7 text-slate-300">
                    <p>The platform is built on a robust <strong class="text-white">Laravel</strong> foundation, chosen for its elegant syntax and powerful ecosystem. The frontend delivers a responsive experience with clean, component-driven UI patterns.</p>
                    <p>Data persistence is managed via <strong class="text-white">MySQL</strong>, ensuring reliable transactions, while the architecture follows MVC principles for maintainable, scalable code.</p>
                </div>
                <h3 class="mb-3 mt-6 text-[10px] uppercase tracking-[0.25em] text-slate-500">Core Technologies</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach(collect($project->technologies ?? []) as $tech)
                        <span class="cursor-default rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-[10px] text-slate-300 transition-colors hover:border-amber-400/30 hover:text-white">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @if(collect($project->skills_used ?? [])->isNotEmpty())
        <section class="border-y border-white/5 bg-slate-950/40 py-10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="font-display mb-5 text-xl font-bold text-white sm:text-2xl">Skills & Expertise</h2>
                <div class="flex flex-wrap gap-2">
                    @foreach($project->skills_used as $skill)
                        <span class="rounded-full border border-amber-400/15 bg-amber-400/10 px-4 py-1.5 text-[11px] text-amber-100">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($relatedProjects->isNotEmpty())
        <section class="relative mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-amber-400/5 to-transparent"></div>
            @php $nextProject = $relatedProjects->first(); @endphp
            <div class="relative z-10 flex flex-col items-center justify-between gap-4 sm:flex-row">
                <div>
                    <span class="mb-0.5 block text-[10px] uppercase tracking-[0.25em] text-slate-500">Next Project</span>
                    <h3 class="font-display text-lg font-bold text-white">{{ $nextProject->name }}</h3>
                    <p class="mt-0.5 text-xs text-slate-400">{{ $nextProject->category->name ?? 'Project' }}</p>
                </div>
                <a href="{{ route('projects.study-case', $nextProject) }}" class="flex h-12 w-12 items-center justify-center rounded-full bg-amber-400 text-slate-950 shadow-lg shadow-amber-400/30 transition hover:scale-110">
                    <i class="fa-solid fa-arrow-right text-base"></i>
                </a>
            </div>
        </section>
    @endif
@endsection

@push('scripts')
<script>
    (function () {
        const track = document.getElementById('slider-track');
        const prevBtns = [document.getElementById('slider-prev'), document.getElementById('slider-prev-mobile')];
        const nextBtns = [document.getElementById('slider-next'), document.getElementById('slider-next-mobile')];
        const dotsContainer = document.getElementById('slider-dots');
        const container = document.getElementById('slider-container');
        if (!track || !dotsContainer || !container) return;

        const dots = Array.from(dotsContainer.children);
        const slideCount = dots.length;
        if (slideCount <= 1) return;

        let currentIndex = 0;

        function updateSlider(index) {
            if (index < 0) index = slideCount - 1;
            if (index >= slideCount) index = 0;
            currentIndex = index;
            track.style.transform = 'translateX(-' + (currentIndex * 100) + '%)';
            dots.forEach(function (dot, i) {
                const active = i === currentIndex;
                dot.setAttribute('aria-selected', active ? 'true' : 'false');
                dot.className = active
                    ? 'h-3 w-3 rounded-full bg-amber-400 transition-all focus:outline-none focus:ring-2 focus:ring-amber-400/50'
                    : 'h-3 w-3 rounded-full bg-slate-700 hover:bg-slate-600 transition-all focus:outline-none focus:ring-2 focus:ring-amber-400/50';
            });
        }

        prevBtns.forEach(function (btn) { if (btn) btn.addEventListener('click', function () { updateSlider(currentIndex - 1); }); });
        nextBtns.forEach(function (btn) { if (btn) btn.addEventListener('click', function () { updateSlider(currentIndex + 1); }); });
        dots.forEach(function (dot, i) { dot.addEventListener('click', function () { updateSlider(i); }); });
        container.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowLeft') updateSlider(currentIndex - 1);
            if (e.key === 'ArrowRight') updateSlider(currentIndex + 1);
        });
    })();
</script>
@endpush
