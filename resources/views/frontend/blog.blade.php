@extends('frontend.layouts.app')

@section('content')

@if(isset($page) && !empty($page->content))
<section class="py-8 bg-slate-900/60 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-invert max-w-none">
        {!! $page->content !!}
    </div>
</section>
@endif

<!-- Blog Hero Section -->
<section class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 overflow-hidden">
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-gradient-to-tr from-brand-600/15 via-accent-600/15 to-transparent rounded-full blur-[130px] pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-block px-3.5 py-1.5 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400 bg-cyan-950/60 border border-cyan-800/60 animate-fade-in-up">
            Architectural Insights &bull; Webyotic
        </span>
        <h1 class="font-display font-black text-4xl sm:text-5xl lg:text-6xl text-white tracking-tight max-w-4xl mx-auto leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
            Engineering <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 via-cyan-300 to-accent-400">Knowledge &amp; Blueprints</span>.
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto font-normal leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
            Deep dives into enterprise Laravel architectures, sub-second web performance, technical SEO strategies, and modern cloud deployment frameworks.
        </p>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="py-16 border-t border-white/5 bg-slate-950/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <article class="group rounded-3xl glass-card border border-white/10 overflow-hidden shadow-card-hover transition-all duration-300 hover:-translate-y-2 hover:border-cyan-500/40 hover:shadow-card-hover-dark flex flex-col justify-between">
                <div>
                    <!-- Post Image -->
                    <div class="relative h-56 overflow-hidden bg-slate-900">
                        <img loading="lazy" src="{{ $post->image ?? 'https://images.unsplash.com/photo-1499750310159-5b600aaf0320?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-obsidian/30 to-transparent"></div>
                        
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[11px] font-mono font-semibold bg-obsidian/85 backdrop-blur-md text-cyan-300 border border-white/10">
                            {{ optional($post->category)->name ?? 'Engineering' }}
                        </span>
                    </div>

                    <!-- Post Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span>{{ $post->created_at?->format('M d, Y') }}</span>
                            <span>&bull;</span>
                            <span>{{ optional($post->user)->name ?? 'Vinay & Shivam' }}</span>
                        </div>

                        <h2 class="font-display font-bold text-xl text-white group-hover:text-cyan-300 transition-colors line-clamp-2">
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>

                        <p class="text-xs text-slate-400 leading-relaxed line-clamp-3">
                            {{ Str::limit(strip_tags($post->body), 160) }}
                        </p>
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-white/10 mt-4 flex items-center justify-between text-xs">
                    <a href="{{ route('blog.show', $post->slug) }}" class="font-mono font-bold text-cyan-400 hover:text-cyan-300 flex items-center space-x-1.5">
                        <span>READ BLUEPRINT</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <span class="text-slate-500 font-mono text-[11px]">5 min read</span>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-16 text-slate-500">
                Articles will appear here.
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $posts->links() }}
        </div>

    </div>
</section>

@endsection
