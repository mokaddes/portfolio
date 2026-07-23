@php
    use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->name }} | Study Case</title>
    <link rel="shortcut icon" href="{{ asset('images/mkds.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Manrope', 'ui-sans-serif', 'system-ui'], display: ['Space Grotesk', 'ui-sans-serif', 'system-ui'] } } }
        }
    </script>
    <style>
        body {
            font-family: 'Manrope', ui-sans-serif, system-ui;
            background: linear-gradient(180deg, #020617 0%, #050b1d 100%);
            color: #e2e8f0;
        }
    </style>
</head>
<body>
<header class="border-b border-white/5 bg-slate-950/70 backdrop-blur-xl">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('frontend.index') }}" class="font-display text-xl font-bold text-white">MK</a>
        <div class="flex items-center gap-3">
            <a href="{{ route('frontend.index') }}#projects" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-white">All projects</a>
            @if($project->url)
                <a href="{{ $project->url }}" target="_blank" rel="noopener" class="rounded-full bg-gradient-to-r from-cyan-400 via-blue-500 to-emerald-400 px-4 py-2 text-sm font-bold text-slate-950">Live site</a>
            @endif
        </div>
    </div>
</header>

<main class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr]">
        <section class="rounded-[2rem] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-black/30">
            <p class="text-xs uppercase tracking-[0.35em] text-cyan-300">Study case</p>
            <h1 class="mt-3 font-display text-4xl font-bold text-white sm:text-5xl">{{ $project->name }}</h1>
            <p class="mt-4 text-lg leading-8 text-slate-300">{{ $project->short_description }}</p>

            <div class="mt-6 flex flex-wrap gap-2">
                <span class="rounded-full border border-cyan-400/20 bg-cyan-400/10 px-3 py-1 text-xs text-cyan-100">{{ $project->category->name ?? 'Project' }}</span>
                @foreach(collect($project->technologies ?? [])->take(6) as $tech)
                    <span class="rounded-full border border-white/10 bg-slate-950/60 px-3 py-1 text-xs text-slate-200">{{ $tech }}</span>
                @endforeach
            </div>

            <div class="mt-8 grid gap-4 sm:grid-cols-3">
                <div class="rounded-[1.25rem] border border-white/10 bg-slate-950/50 p-4">
                    <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Category</div>
                    <div class="mt-2 text-sm font-semibold text-white">{{ $project->category->name ?? 'Uncategorized' }}</div>
                </div>
                <div class="rounded-[1.25rem] border border-white/10 bg-slate-950/50 p-4">
                    <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Status</div>
                    <div class="mt-2 text-sm font-semibold text-white">{{ $project->is_featured ? 'Featured' : 'Live project' }}</div>
                </div>
                <div class="rounded-[1.25rem] border border-white/10 bg-slate-950/50 p-4">
                    <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Link</div>
                    <div class="mt-2 text-sm font-semibold text-white">{{ $project->url ? 'Available' : 'Private' }}</div>
                </div>
            </div>

            <div class="mt-8 space-y-6 text-slate-300">
                <div>
                    <h2 class="font-display text-2xl font-bold text-white">Overview</h2>
                    <p class="mt-3 leading-8">{{ $project->long_description }}</p>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <div class="rounded-[1rem] border border-white/10 bg-slate-950/50 p-4">
                        <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Problem</div>
                        <p class="mt-3 leading-7 text-slate-300">{{ $project->problem }}</p>
                    </div>
                    <div class="rounded-[1rem] border border-white/10 bg-slate-950/50 p-4">
                        <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Solution</div>
                        <p class="mt-3 leading-7 text-slate-300">{{ $project->solution }}</p>
                    </div>
                    <div class="rounded-[1rem] border border-white/10 bg-slate-950/50 p-4">
                        <div class="text-xs uppercase tracking-[0.3em] text-slate-500">My contribution</div>
                        <p class="mt-3 leading-7 text-slate-300">{{ $project->my_contribution }}</p>
                    </div>
                </div>

                <div>
                    <h2 class="font-display text-2xl font-bold text-white">Key features</h2>
                    <div class="mt-4 grid gap-3 sm:grid-cols-2">
                        @foreach(collect($project->features ?? [])->take(8) as $feature)
                            <div class="rounded-[1rem] border border-white/10 bg-slate-950/50 p-4">{{ $feature }}</div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h2 class="font-display text-2xl font-bold text-white">How it was built</h2>
                    <div class="mt-4 grid gap-4 md:grid-cols-2">
                        <div class="rounded-[1rem] border border-white/10 bg-slate-950/50 p-4">
                            <div class="text-sm font-semibold text-white">Architecture</div>
                            <p class="mt-2 leading-7 text-slate-400">A Laravel backend, clean relationship structure, and reusable content fields keep the project maintainable as it grows.</p>
                        </div>
                        <div class="rounded-[1rem] border border-white/10 bg-slate-950/50 p-4">
                            <div class="text-sm font-semibold text-white">Delivery focus</div>
                            <p class="mt-2 leading-7 text-slate-400">The build emphasizes clarity, performance, and a practical user experience rather than decorative complexity.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <aside class="space-y-6">
            <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/5">
                <img src="{{ asset($project->image) }}" alt="{{ $project->name }}" class="h-[360px] w-full object-cover">
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
                <h3 class="font-display text-2xl font-bold text-white">Project screenshots</h3>
                <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-1">
                    @foreach($screenshots->take(4) as $shot)
                        <figure class="overflow-hidden rounded-[1rem] border border-white/10 bg-slate-950/50">
                            <img src="{{ asset($shot) }}" alt="{{ $project->name }} screenshot" class="h-40 w-full object-cover">
                        </figure>
                    @endforeach
                    @foreach($galleryItems->take(4) as $gallery)
                        <figure class="overflow-hidden rounded-[1rem] border border-white/10 bg-slate-950/50">
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->caption ?? $project->name }}" class="h-40 w-full object-cover">
                            @if($gallery->caption)
                                <figcaption class="px-4 py-3 text-sm text-slate-400">{{ $gallery->caption }}</figcaption>
                            @endif
                        </figure>
                    @endforeach
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
                <h3 class="font-display text-2xl font-bold text-white">Related projects</h3>
                <div class="mt-5 space-y-4">
                    @forelse($relatedProjects as $related)
                        <a href="{{ route('projects.study-case', $related) }}" class="block rounded-[1rem] border border-white/10 bg-slate-950/50 p-4 transition hover:border-cyan-400/30 hover:bg-white/10">
                            <div class="text-sm font-semibold text-white">{{ $related->name }}</div>
                            <div class="mt-1 text-xs uppercase tracking-[0.25em] text-slate-500">{{ $related->category->name ?? 'Project' }}</div>
                        </a>
                    @empty
                        <div class="text-sm text-slate-400">No related projects found.</div>
                    @endforelse
                </div>
            </div>
        </aside>
    </div>
</main>
</body>
</html>
