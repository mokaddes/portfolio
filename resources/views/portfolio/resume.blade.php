@extends('layouts.portfolio')

@section('title', $profileName.' | Resume')
@section('meta_description', $profileName.'\'s resume — skills, experience, education, and portfolio.')
@section('header_tag', 'Resume')

@section('content')
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <!-- Profile strip -->
        <section class="glass reveal flex flex-col items-center gap-6 rounded-2xl p-7 text-center sm:p-9 lg:flex-row lg:items-center lg:text-left">
            <img src="{{ $profileImage }}" alt="{{ $profileName }}" class="h-28 w-28 shrink-0 rounded-full object-cover ring-4 ring-amber-400/20 ring-offset-4 ring-offset-[#0f141c] sm:h-32 sm:w-32">
            <div class="min-w-0 flex-1">
                <p class="eyebrow text-xs uppercase text-amber-300">Curriculum Vitae</p>
                <h1 class="mt-2 font-display text-3xl font-bold text-white sm:text-4xl">{{ $profileName }}</h1>
                <p class="mt-1 text-sm uppercase tracking-[0.18em] text-slate-400">{{ $designation }}</p>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base">{{ $careerSummary }}</p>
                <div class="mt-5 flex flex-wrap justify-center gap-3 lg:justify-start">
                    @foreach($contactCards as $card)
                        <a href="{{ $card['href'] }}" target="{{ str_starts_with($card['href'], 'http') ? '_blank' : '_self' }}" rel="noopener" class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3.5 py-2 text-xs text-slate-200 transition hover:border-amber-400/30 hover:bg-white/10">
                            <i class="{{ $card['icon'] }} text-amber-300"></i>
                            {{ $card['value'] }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="flex w-full shrink-0 gap-3 lg:w-auto">
                <a href="{{ $resumeLink }}" class="btn-primary flex-1 rounded-full px-6 py-3 text-center text-sm font-bold transition lg:flex-none">
                    <i class="fa-solid fa-download mr-1.5"></i> Download PDF
                </a>
            </div>
        </section>

        <div class="mt-8 grid gap-8 lg:grid-cols-[0.85fr_1.15fr]">
            <!-- Sidebar -->
            <div class="space-y-6">
                <div class="glass reveal rounded-2xl p-7">
                    <p class="eyebrow text-xs uppercase text-amber-300">Skills</p>
                    <h2 class="mt-2 font-display text-xl font-bold text-white">Technical skills</h2>
                    <div class="mt-5 flex flex-wrap gap-2.5">
                        @foreach($skills as $skill)
                            <span class="rounded-full border border-white/10 bg-white/5 px-3.5 py-1.5 text-sm text-slate-200">{{ $skill->name }}</span>
                        @endforeach
                    </div>

                    @php
                        $aiKeywords = ['ai', 'openai', 'prompt', 'rag', 'vector'];
                        $aiSkills = collect($skills)->filter(function ($skill) use ($aiKeywords) {
                            $name = strtolower($skill->name);
                            foreach ($aiKeywords as $keyword) {
                                if (str_contains($name, $keyword)) return true;
                            }
                            return false;
                        });
                    @endphp
                    @if($aiSkills->count())
                        <h3 class="mt-6 font-display text-base font-bold text-white">AI-related skills</h3>
                        <div class="mt-3 flex flex-wrap gap-2.5">
                            @foreach($aiSkills as $skill)
                                <span class="rounded-full border border-amber-400/20 bg-amber-400/10 px-3.5 py-1.5 text-sm text-amber-100">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="glass reveal rounded-2xl p-7">
                    <p class="eyebrow text-xs uppercase text-amber-300">Education</p>
                    <h2 class="mt-2 font-display text-xl font-bold text-white">Academic background</h2>
                    <div class="mt-5 space-y-4">
                        @foreach($educations as $education)
                            <div class="rounded-xl border border-white/10 bg-slate-950/50 p-4">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <div class="font-semibold text-white">{{ $education->degree }}</div>
                                    <div class="font-mono text-[11px] uppercase tracking-[0.2em] text-slate-500">{{ $education->year }}</div>
                                </div>
                                <div class="mt-1 text-sm text-slate-300">{{ $education->institution }}</div>
                                <div class="mt-2 font-mono text-sm text-emerald-300">CGPA {{ $education->cgpa }} / {{ $education->out_of_cgpa }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if(!empty($personalDetails))
                    <div class="glass reveal rounded-2xl p-7">
                        <p class="eyebrow text-xs uppercase text-amber-300">Personal details</p>
                        <h2 class="mt-2 font-display text-xl font-bold text-white">Quick facts</h2>
                        <div class="mt-5 space-y-3">
                            @foreach($personalDetails as $detail)
                                <div class="flex items-center gap-3 rounded-xl border border-white/10 bg-slate-950/50 px-4 py-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white/5 text-amber-300">
                                        <i class="{{ $detail['icon'] }}"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <div class="text-[11px] uppercase tracking-[0.15em] text-slate-500">{{ $detail['label'] }}</div>
                                        <div class="truncate text-sm font-semibold text-white">{{ $detail['value'] }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Main column -->
            <div class="space-y-6">
                <div class="glass reveal rounded-2xl p-7 sm:p-8">
                    <p class="eyebrow text-xs uppercase text-amber-300">Summary</p>
                    <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">What I bring to a team or client</h2>
                    <div class="mt-5 grid gap-4 md:grid-cols-2">
                        <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                            <div class="font-semibold text-white">Laravel and SaaS delivery</div>
                            <p class="mt-2 text-sm leading-7 text-slate-400">I build maintainable systems, stable dashboards, and business software that can grow with the product.</p>
                        </div>
                        <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                            <div class="font-semibold text-white">AI and automation</div>
                            <p class="mt-2 text-sm leading-7 text-slate-400">I can add AI-assisted features, workflow automation, and smarter content processing to existing products.</p>
                        </div>
                        <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                            <div class="font-semibold text-white">Business thinking</div>
                            <p class="mt-2 text-sm leading-7 text-slate-400">I focus on clarity, delivery, and features that help users actually get work done faster.</p>
                        </div>
                        <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                            <div class="font-semibold text-white">Communication</div>
                            <p class="mt-2 text-sm leading-7 text-slate-400">I work well with clients and teams, keeping updates clear and expectations realistic.</p>
                        </div>
                    </div>
                </div>

                @if(!empty($experiences))
                    <div class="glass reveal rounded-2xl p-7 sm:p-8">
                        <p class="eyebrow text-xs uppercase text-amber-300">Experience</p>
                        <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">Professional experience</h2>
                        <div class="relative mt-6 space-y-6 border-l border-white/10 pl-6">
                            @foreach($experiences as $exp)
                                <div class="relative">
                                    <span class="timeline-dot absolute -left-[27px] top-1.5 h-3 w-3 rounded-full {{ !empty($exp['current']) ? 'bg-emerald-400' : 'bg-slate-500' }}"></span>
                                    <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                                        <div class="flex flex-wrap items-center justify-between gap-2">
                                            <h3 class="font-display text-lg font-bold text-white">{{ $exp['role'] }}</h3>
                                            @if(!empty($exp['current']))
                                                <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-emerald-200">Current</span>
                                            @endif
                                        </div>
                                        <div class="mt-1 text-sm font-semibold text-amber-200">{{ $exp['company'] }}</div>
                                        <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 font-mono text-[11px] text-slate-500">
                                            <span><i class="fa-regular fa-calendar mr-1"></i>{{ $exp['period'] }}</span>
                                            <span><i class="fa-solid fa-location-dot mr-1"></i>{{ $exp['location'] }}</span>
                                        </div>
                                        <p class="mt-3 text-sm leading-7 text-slate-400">{{ $exp['description'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="glass reveal rounded-2xl p-7 sm:p-8">
                    <p class="eyebrow text-xs uppercase text-amber-300">Portfolio</p>
                    <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">Selected work by category</h2>
                    <div class="mt-6 space-y-5">
                        @foreach($categories as $category)
                            @php $categoryProjects = $projects->where('category_id', $category->id); @endphp
                            @if($categoryProjects->count())
                                <div class="rounded-xl border border-white/10 bg-slate-950/50 p-5">
                                    <div class="text-sm font-semibold text-white">{{ $category->name }}</div>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        @foreach($categoryProjects as $project)
                                            <a href="{{ route('projects.study-case', $project) }}" class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3.5 py-1.5 text-xs text-slate-200 transition hover:border-amber-400/30 hover:bg-white/10">
                                                {{ $project->name }}
                                                <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-amber-300"></i>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if($highlights)
                    <div class="glass reveal rounded-2xl p-7 sm:p-8">
                        <p class="eyebrow text-xs uppercase text-amber-300">Why hire me</p>
                        <h2 class="mt-2 font-display text-2xl font-bold text-white sm:text-3xl">Working style</h2>
                        <div class="mt-5 grid gap-3 md:grid-cols-2">
                            @foreach($highlights as $quality)
                                <div class="rounded-xl border border-white/10 bg-slate-950/50 p-4">
                                    <div class="font-semibold text-white">{{ $quality['title'] ?? $quality['name'] }}</div>
                                    <div class="mt-2 text-sm leading-7 text-slate-400">{{ $quality['description'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('styles')
    .timeline-dot { box-shadow: 0 0 0 4px rgba(242,169,59,0.14); }
@endpush
