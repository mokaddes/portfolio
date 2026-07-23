@php
    $tags = collect($blog->tags ?? []);
    $words = str_word_count(strip_tags($blog->content ?? ''));
    $readMins = max(1, (int) ceil($words / 200));
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

                <div class="prose prose-invert prose-slate mt-8 max-w-none prose-p:leading-8 prose-p:text-slate-300 prose-headings:font-display prose-headings:text-white">
                    {!! nl2br(e($blog->content)) !!}
                </div>

                @if($tags->count())
                    <div class="mt-10 flex flex-wrap items-center gap-2 border-t border-white/10 pt-6">
                        <span class="eyebrow mr-1 text-xs uppercase text-slate-500">Tags</span>
                        @foreach($tags as $tag)
                            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs text-slate-300">#{{ $tag }}</span>
                        @endforeach
                    </div>
                @endif

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
    </section>
@endsection
