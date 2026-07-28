@php
    $tags = collect($blog->tags ?? []);
    $words = str_word_count(strip_tags($blog->content ?? ''));
    $readMins = max(1, (int) ceil($words / 200));
    $headings = [];
    preg_match_all('/<h[2-3][^>]*>(.*?)<\/h[2-3]>/i', $blog->content ?? '', $matches);
    $headings = $matches[1] ?? [];
@endphp

@extends('layouts.portfolio')

@section('title', $blog->title.' | '.$profileName)
@section('meta_description', $blog->excerpt ?? ($profileName.' — blog article.'))
@section('header_tag', 'Blog')

@section('content')
    <section class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <a href="{{ route('blog.index') }}" class="reveal inline-flex items-center gap-2 text-sm font-semibold text-slate-300 transition hover:text-amber-300">
            <i class="fa-solid fa-arrow-left text-xs"></i> All posts
        </a>

        <article class="glass reveal mt-6 overflow-hidden rounded-2xl" style="transition-delay:80ms">
            <div class="h-64 overflow-hidden bg-slate-900 sm:h-[380px]">
                <img src="{{ asset($blog->cover_image) }}" alt="{{ $blog->title }}" class="h-full w-full object-cover">
            </div>
            <div class="p-6 sm:p-10">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3 py-1 text-xs font-semibold text-amber-200">{{ $blog->category ?? 'Article' }}</span>
                    <span class="font-mono text-xs text-slate-500">{{ optional($blog->published_at)->format('M d, Y') }}</span>
                    <span class="font-mono text-xs text-slate-500">&middot; {{ $readMins }} min read</span>
                </div>

                <h1 class="mt-5 font-display text-3xl font-bold text-white sm:text-5xl">{{ $blog->title }}</h1>
                <p class="mt-4 text-base leading-8 text-slate-300 sm:text-lg">{{ $blog->excerpt }}</p>

                <div class="mt-6 flex items-center gap-3 border-y border-white/10 py-4">
                    <img src="{{ $profileImage }}" alt="{{ $profileName }}" class="h-10 w-10 rounded-full object-cover ring-1 ring-white/10">
                    <div>
                        <div class="text-sm font-semibold text-white">{{ $profileName }}</div>
                        <div class="text-xs text-slate-500">{{ $profileTitle }}</div>
                    </div>
                </div>

                @if(count($headings) > 1)
                    <div class="mt-8 rounded-2xl border border-white/10 bg-white/5 p-6">
                        <h2 class="font-display text-lg font-bold text-white">Table of Contents</h2>
                        <ul class="mt-3 list-inside list-disc space-y-1">
                            @foreach($headings as $h)
                                <li class="text-sm text-slate-400">{{ strip_tags($h) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="prose prose-invert prose-slate mt-8 max-w-none prose-p:leading-8 prose-p:text-slate-300 prose-headings:font-display prose-headings:text-white prose-a:text-amber-300 prose-a:no-underline hover:prose-a:underline prose-code:text-amber-200 prose-pre:bg-slate-800 prose-img:rounded-xl">
                    {!! $blog->content !!}
                </div>

                @if($tags->count())
                    <div class="mt-10 flex flex-wrap items-center gap-2 border-t border-white/10 pt-6">
                        <span class="eyebrow mr-1 text-xs uppercase text-slate-500">Tags</span>
                        @foreach($tags as $tag)
                            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs text-slate-300">#{{ $tag }}</span>
                        @endforeach
                    </div>
                @endif

                <div class="mt-8 flex items-center gap-4 border-t border-white/10 pt-6">
                    <span class="text-xs uppercase text-slate-500">Share</span>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="text-slate-400 transition hover:text-amber-300" title="Share on Twitter">
                        <i class="fa-brands fa-x-twitter text-lg"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="text-slate-400 transition hover:text-amber-300" title="Share on LinkedIn">
                        <i class="fa-brands fa-linkedin-in text-lg"></i>
                    </a>
                    <button onclick="navigator.clipboard.writeText(window.location.href).then(() => { this.querySelector('.tooltip').classList.remove('hidden'); setTimeout(() => { this.querySelector('.tooltip').classList.add('hidden'); }, 2000); })" class="text-slate-400 transition hover:text-amber-300 relative" title="Copy link">
                        <i class="fa-solid fa-link text-lg"></i>
                        <span class="tooltip hidden absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-700 text-xs text-white px-2 py-1 rounded">Copied!</span>
                    </button>
                </div>

                @if(!empty($blog->related_topics))
                    <div class="mt-6 rounded-2xl border border-amber-400/20 bg-amber-400/5 p-6">
                        <h3 class="font-display text-lg font-bold text-amber-200">Explore related topics</h3>
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach($blog->related_topics as $topic)
                                <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-300">{{ $topic }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </article>

        @if($relatedBlogs->isNotEmpty())
            <section class="mt-14">
                <p class="reveal eyebrow text-xs uppercase text-amber-300">Keep reading</p>
                <h2 class="reveal mt-2 font-display text-3xl font-bold text-white">Related posts</h2>
                <div class="mt-6 grid gap-6 md:grid-cols-3">
                    @foreach($relatedBlogs as $related)
                        @include('portfolio.component.blog-card', ['blog' => $related])
                    @endforeach
                </div>
            </section>
        @endif

        <section class="mt-14 glass reveal rounded-2xl p-6 sm:p-10">
            <h2 class="font-display text-2xl font-bold text-white">Leave a comment</h2>
            <p class="mt-2 text-sm text-slate-400">Have questions or thoughts? Reach out via the contact form or start a discussion.</p>
            <a href="{{ route('frontend.index') }}#contact" class="mt-4 inline-flex items-center gap-2 rounded-full bg-amber-400/10 px-6 py-2 text-sm font-semibold text-amber-300 transition hover:bg-amber-400/20">
                <i class="fa-solid fa-message"></i> Contact me
            </a>
        </section>
    </section>
@endsection
