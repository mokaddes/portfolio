@extends('layouts.portfolio')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Projects | '.$profileName)
@section('meta_description', 'Browse all projects built by '.$profileName.' — Laravel, SaaS, e-commerce, platforms, and business solutions with case studies.')
@section('header_tag', 'Projects')

@section('content')
    <section class="mx-auto max-w-7xl px-4 pb-4 pt-10 sm:px-6 lg:px-8 lg:pt-14">
        <div class="reveal max-w-3xl">
            <p class="eyebrow text-xs uppercase text-amber-300">Projects</p>
            <h1 class="mt-3 font-display text-4xl font-bold text-white sm:text-5xl">Full portfolio of shipped projects.</h1>
            <p class="mt-5 text-base leading-8 text-slate-300 sm:text-lg">Every project built — from SaaS platforms and e-commerce stores to management systems and business solutions. Each includes a case study with the problem, solution, and technologies used.</p>
        </div>

        @if($categories->count())
            <div class="no-scrollbar reveal mt-8 flex gap-2.5 overflow-x-auto pb-1" id="category-filters" style="transition-delay:80ms">
                <button type="button" data-filter="all" class="filter-pill is-active shrink-0 rounded-full border border-amber-400/30 bg-amber-400/15 px-4 py-2 text-sm font-semibold text-amber-200 transition">
                    All projects
                </button>
                @foreach($categories as $category)
                    <button type="button" data-filter="{{ Str::slug($category) }}" class="filter-pill shrink-0 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-300 transition hover:border-amber-400/25 hover:text-white">
                        {{ $category }}
                    </button>
                @endforeach
            </div>
        @endif
    </section>

    <section class="mx-auto max-w-7xl px-4 pb-20 pt-6 sm:px-6 lg:px-8">
        <div id="projects-grid" class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse($projects as $project)
                <article class="glass group overflow-hidden rounded-2xl transition duration-300 hover:-translate-y-1.5 hover:border-amber-400/25" data-category="{{ Str::slug($project->category->name ?? '') }}">
                    <div class="flex h-52 items-center justify-center overflow-hidden bg-white">
                        <img src="{{ asset($project->image) }}" alt="{{ $project->name }} — {{ $project->short_description }}" class="h-full w-full object-contain p-6 transition duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between gap-3">
                            <p class="eyebrow text-[11px] uppercase text-amber-300">{{ $project->category->name ?? 'Project' }}</p>
                            @if($project->is_featured)
                                <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-[11px] font-semibold text-emerald-200">Featured</span>
                            @endif
                        </div>
                        <h2 class="mt-4 font-display text-xl font-bold text-white">{{ $project->name }}</h2>
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
                <div class="glass col-span-full rounded-2xl p-10 text-center text-slate-300">
                    No projects found yet — check back soon.
                </div>
            @endforelse
        </div>
        <p id="no-results" class="glass mt-6 hidden rounded-2xl p-10 text-center text-slate-300">
            No projects match that category yet.
        </p>
    </section>
@endsection

@push('styles')
    .filter-pill.is-active { border-color: rgba(242,169,59,0.4); background: rgba(242,169,59,0.16); color: #fcd9a4; }
@endpush

@push('scripts')
<script>
    (function () {
        const wrap = document.getElementById('category-filters');
        const grid = document.getElementById('projects-grid');
        const noResults = document.getElementById('no-results');
        if (!wrap || !grid) return;

        const pills = Array.from(wrap.querySelectorAll('.filter-pill'));
        const cards = Array.from(grid.querySelectorAll('[data-category]'));

        wrap.addEventListener('click', function (e) {
            const pill = e.target.closest('.filter-pill');
            if (!pill) return;

            pills.forEach(function (p) { p.classList.remove('is-active'); });
            pill.classList.add('is-active');

            const filter = pill.dataset.filter;
            let visibleCount = 0;
            cards.forEach(function (card) {
                const show = filter === 'all' || card.dataset.category === filter;
                card.style.display = show ? '' : 'none';
                if (show) visibleCount++;
            });
            noResults.classList.toggle('hidden', visibleCount !== 0);
        });
    })();
</script>
@endpush