@extends('layouts.portfolio')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Blog | '.$profileName)
@section('meta_description', 'Articles about Laravel, SaaS, content structure, and automation by '.$profileName.'.')
@section('header_tag', 'Blog')

@section('content')
    <section class="mx-auto max-w-7xl px-4 pb-4 pt-10 sm:px-6 lg:px-8 lg:pt-14">
        <div class="reveal max-w-3xl">
            <p class="eyebrow text-xs uppercase text-amber-300">Blog</p>
            <h1 class="mt-3 font-display text-4xl font-bold text-white sm:text-5xl">Articles about Laravel, content structure, and automation.</h1>
            <p class="mt-5 text-base leading-8 text-slate-300 sm:text-lg">Notes from real project work — Laravel patterns, SaaS delivery, and AI-assisted workflows, driven by the same database as the rest of the site.</p>
        </div>

        @if($categories->count())
            <div class="no-scrollbar reveal mt-8 flex gap-2.5 overflow-x-auto pb-1" id="category-filters" style="transition-delay:80ms">
                <button type="button" data-filter="all" class="filter-pill is-active shrink-0 rounded-full border border-amber-400/30 bg-amber-400/15 px-4 py-2 text-sm font-semibold text-amber-200 transition">
                    All posts
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
        <div id="blog-grid" class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse($blogs as $blog)
                @include('portfolio.component.blog-card', ['blog' => $blog])
            @empty
                <div class="glass col-span-full rounded-2xl p-10 text-center text-slate-300">
                    No blog posts found yet — check back soon.
                </div>
            @endforelse
        </div>
        <p id="no-results" class="glass mt-6 hidden rounded-2xl p-10 text-center text-slate-300">
            No posts match that category yet.
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
        const grid = document.getElementById('blog-grid');
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
