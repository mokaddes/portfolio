@php
    use Illuminate\Support\Str;

    $tags = collect($blog->tags ?? []);
    $words = str_word_count(strip_tags($blog->content ?? ''));
    $readMins = max(1, (int) ceil($words / 200));
@endphp
<article
    data-category="{{ Str::slug($blog->category ?? 'article') }}"
    class="glass reveal group flex h-full flex-col overflow-hidden rounded-2xl transition duration-300 hover:-translate-y-1.5 hover:border-amber-400/25"
>
    <div class="h-48 overflow-hidden bg-slate-900">
        <img src="{{ asset($blog->cover_image) }}" alt="{{ $blog->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
    </div>
    <div class="flex flex-1 flex-col p-6">
        <div class="flex flex-wrap items-center gap-2">
            <span class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3 py-1 text-[11px] font-semibold text-amber-200">{{ $blog->category ?? 'Article' }}</span>
            <span class="font-mono text-[11px] text-slate-500">{{ optional($blog->published_at)->format('M d, Y') }}</span>
            <span class="font-mono text-[11px] text-slate-600">&middot; {{ $readMins }} min read</span>
        </div>
        <h3 class="mt-4 font-display text-xl font-bold text-white">{{ $blog->title }}</h3>
        <p class="mt-3 flex-1 text-sm leading-7 text-slate-400">{{ $blog->excerpt }}</p>

        @if($tags->count())
            <div class="mt-4 flex flex-wrap gap-1.5">
                @foreach($tags->take(3) as $tag)
                    <span class="rounded-full border border-white/10 bg-white/5 px-2.5 py-1 text-[10px] text-slate-300">#{{ $tag }}</span>
                @endforeach
            </div>
        @endif

        <a href="{{ route('blog.show', $blog) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-amber-200">
            Read article
            <i class="fa-solid fa-arrow-right text-xs transition group-hover:translate-x-1"></i>
        </a>
    </div>
</article>
