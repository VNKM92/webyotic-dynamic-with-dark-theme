@extends('frontend.layouts.app')

@section('content')

@if(isset($page) && !empty($page->content))
<section class="py-8 bg-slate-900/60 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-invert max-w-none">
        {!! $page->content !!}
    </div>
</section>
@endif

<!-- Gallery Hero Section -->
<section class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 overflow-hidden">
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-gradient-to-tr from-brand-600/15 via-accent-600/15 to-transparent rounded-full blur-[130px] pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-block px-3.5 py-1.5 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-purple-400 bg-purple-950/60 border border-purple-800/60 animate-fade-in-up">
            Proven Commercial Impact
        </span>
        <h1 class="font-display font-black text-4xl sm:text-5xl lg:text-6xl text-white tracking-tight max-w-4xl mx-auto leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
            Engineering <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400">Showcase &amp; Case Studies</span>.
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto font-normal leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
            Explore our curated catalog of production web applications, enterprise dashboards, high-converting platforms, and scalable cloud architectures.
        </p>
    </div>
</section>

<!-- Interactive Portfolio Grid with Reactive Filtering -->
<section class="py-16 border-t border-white/5 bg-slate-950/40" x-data="{ 
    selectedCategory: 'all',
    searchQuery: '',
    selectedProject: null
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Controls Bar -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <!-- Category Pills -->
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" @click="selectedCategory = 'all'" :class="selectedCategory === 'all' ? 'bg-cyan-500 text-obsidian font-bold shadow-glow-cyan' : 'bg-white/5 text-slate-300 hover:bg-white/10 border border-white/10'" class="px-5 py-2.5 rounded-xl text-xs font-medium transition-all">
                    All Case Studies ({{ $projects->count() }})
                </button>
                @foreach($categories as $category)
                <button type="button" @click="selectedCategory = '{{ strtolower($category) }}'" :class="selectedCategory === '{{ strtolower($category) }}' ? 'bg-cyan-500 text-obsidian font-bold shadow-glow-cyan' : 'bg-white/5 text-slate-300 hover:bg-white/10 border border-white/10'" class="px-5 py-2.5 rounded-xl text-xs font-medium transition-all">
                    {{ $category }}
                </button>
                @endforeach
            </div>

            <!-- Search Input -->
            <div class="relative w-full md:w-72">
                <input type="text" x-model="searchQuery" placeholder="Search by title or tech..." class="w-full bg-white/5 border border-white/10 rounded-xl pl-9 pr-4 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 transition-colors">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
        </div>

        <!-- Project Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            @php
                $cat = strtolower($project->category ?? 'other');
                $tagsArr = is_array($project->tags) ? $project->tags : (json_decode($project->tags, true) ?? []);
                $tagsText = strtolower(implode(' ', $tagsArr));
                $titleText = strtolower($project->title);
            @endphp
            <div x-show="(selectedCategory === 'all' || selectedCategory === '{{ $cat }}') && (searchQuery === '' || '{{ $titleText }} {{ $tagsText }}'.includes(searchQuery.toLowerCase()))" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="group rounded-3xl glass-card border border-white/10 overflow-hidden shadow-card-hover transition-all duration-300 hover:-translate-y-2 hover:border-cyan-500/40 hover:shadow-card-hover-dark flex flex-col justify-between">
                <div>
                    <!-- Image Showcase -->
                    <div class="relative h-60 overflow-hidden bg-slate-900">
                        <img loading="lazy" src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-obsidian/30 to-transparent"></div>
                        
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[11px] font-mono font-semibold bg-obsidian/85 backdrop-blur-md text-cyan-300 border border-white/10">
                            {{ $project->category ?? 'Case Study' }}
                        </span>

                        @if(!empty($project->link) && $project->link !== '#')
                        <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer" class="absolute top-4 right-4 p-2 rounded-full bg-obsidian/80 backdrop-blur-md text-white hover:text-cyan-300 border border-white/10 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6 space-y-3">
                        <h3 class="font-display font-bold text-xl text-white group-hover:text-cyan-300 transition-colors">
                            {{ $project->title }}
                        </h3>

                        <p class="text-xs text-slate-400 leading-relaxed line-clamp-3">
                            {{ $project->description }}
                        </p>

                        <!-- Tech Tags -->
                        @if(!empty($tagsArr))
                        <div class="flex flex-wrap gap-1.5 pt-3">
                            @foreach($tagsArr as $tag)
                            <span class="px-2.5 py-1 rounded-lg text-[10px] font-mono text-cyan-300 bg-cyan-950/40 border border-cyan-800/40">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-white/10 mt-4 flex items-center justify-between text-xs">
                    <span class="text-emerald-400 font-mono flex items-center space-x-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Delivered to Production</span>
                    </span>
                    <button @click="estimatorOpen = true" class="text-slate-400 hover:text-white font-semibold">
                        Build Similar &rarr;
                    </button>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Call to Action -->
<section class="py-20 border-t border-white/5 text-center">
    <div class="max-w-4xl mx-auto px-4 space-y-6">
        <h2 class="font-display font-bold text-3xl sm:text-4xl text-white">Have a Complex Enterprise Application in Mind?</h2>
        <p class="text-slate-400 text-base max-w-xl mx-auto">Let's discuss architecture requirements, expected traffic, and engineering sprints.</p>
        <div class="pt-2">
            <a href="{{ route('contact') }}" class="inline-flex px-8 py-3.5 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-brand-500 via-cyan-500 to-accent-600 shadow-glow-cyan hover:scale-105 transition-all">
                Schedule Engineering Review
            </a>
        </div>
    </div>
</section>

@endsection
