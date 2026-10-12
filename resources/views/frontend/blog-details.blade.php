@extends('frontend.layouts.app')

@section('content')

<!-- Blog Post Hero -->
<section class="relative pt-20 pb-16 overflow-hidden">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-b from-brand-600/10 via-accent-600/5 to-transparent blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-xs font-mono text-slate-400">
            <a href="{{ route('home') }}" class="hover:text-cyan-300">Home</a>
            <span>/</span>
            <a href="{{ route('blog') }}" class="hover:text-cyan-300">Insights</a>
            <span>/</span>
            <span class="text-cyan-400 truncate max-w-xs">{{ $post->title }}</span>
        </nav>

        <!-- Category & Reading Time -->
        <div class="flex items-center space-x-3">
            <span class="px-3 py-1 rounded-full text-xs font-mono font-semibold text-cyan-300 bg-cyan-950/60 border border-cyan-800/60">
                {{ optional($post->category)->name ?? 'Engineering' }}
            </span>
            <span class="text-xs text-slate-400 font-mono">5 min read &bull; {{ $post->created_at?->format('F d, Y') }}</span>
        </div>

        <h1 class="font-display font-black text-3xl sm:text-4xl lg:text-5xl text-white tracking-tight leading-tight">
            {{ $post->title }}
        </h1>

        <!-- Author Pill -->
        <div class="flex items-center space-x-3 pt-2">
            <div class="w-10 h-10 rounded-full bg-cyan-500/20 text-cyan-300 border border-cyan-500/30 flex items-center justify-center font-bold font-display">
                {{ substr(optional($post->user)->name ?? 'V', 0, 1) }}
            </div>
            <div>
                <div class="text-xs font-bold text-white">{{ optional($post->user)->name ?? 'Vinay & Shivam' }}</div>
                <div class="text-[11px] text-slate-400 font-mono">Senior Engineering Staff &bull; Webyotic</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Article Body -->
<section class="py-12 border-t border-white/5 bg-slate-950/40">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(!empty($post->image))
        <div class="rounded-3xl overflow-hidden mb-12 border border-white/10 shadow-card-hover-dark">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-[500px]">
        </div>
        @endif

        <article class="prose prose-invert prose-lg max-w-none prose-headings:font-display prose-headings:font-bold prose-headings:text-white prose-a:text-cyan-400 hover:prose-a:text-cyan-300 prose-code:text-cyan-300 prose-code:bg-white/5 prose-code:p-1 prose-code:rounded prose-pre:bg-slate-950 prose-pre:border prose-pre:border-white/10 leading-relaxed text-slate-300">
            {!! $post->body !!}
        </article>

        <!-- Share & Return Footer -->
        <div class="mt-16 pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('blog') }}" class="text-xs font-mono font-bold text-cyan-400 hover:text-cyan-300 flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>BACK TO INSIGHTS</span>
            </a>

            <div class="flex items-center space-x-3">
                <span class="text-xs text-slate-400 font-mono">Share:</span>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 hover:text-white transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 hover:text-white transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Related Blueprints -->
@if(!empty($relatedPosts) && $relatedPosts->count())
<section class="py-20 border-t border-white/5 bg-slate-950/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="font-display font-bold text-2xl text-white mb-8">Related Architectural Insights</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedPosts as $related)
            <div class="rounded-3xl glass-card border border-white/10 p-6 flex flex-col justify-between hover:border-cyan-500/40 transition-all">
                <div class="space-y-3">
                    <span class="text-xs font-mono text-cyan-400 font-semibold">{{ $related->category->name ?? 'Article' }}</span>
                    <h4 class="font-display font-bold text-lg text-white line-clamp-2">
                        <a href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a>
                    </h4>
                    <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed">
                        {{ Str::limit(strip_tags($related->body), 100) }}
                    </p>
                </div>
                <div class="pt-4 border-t border-white/5 mt-4">
                    <a href="{{ route('blog.show', $related->slug) }}" class="text-xs font-bold text-cyan-400 hover:text-cyan-300">Read Blueprint &rarr;</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
