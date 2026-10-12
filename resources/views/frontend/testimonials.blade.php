@extends('frontend.layouts.app')

@section('content')

@if(isset($page) && !empty($page->content))
<section class="py-8 bg-slate-900/60 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-invert max-w-none">
        {!! $page->content !!}
    </div>
</section>
@endif

<!-- Testimonials Hero Section -->
<section class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 overflow-hidden">
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-gradient-to-tr from-brand-600/15 via-accent-600/15 to-transparent rounded-full blur-[130px] pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-block px-3.5 py-1.5 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-amber-400 bg-amber-950/60 border border-amber-800/60 animate-fade-in-up">
            Authentic Social Proof
        </span>
        <h1 class="font-display font-black text-4xl sm:text-5xl lg:text-6xl text-white tracking-tight max-w-4xl mx-auto leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
            Trusted by <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-yellow-300 to-emerald-400">Industry Leaders &amp; CTOs</span>.
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto font-normal leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
            Discover how founders, technical executives, and growth leaders transform their systems and dominate organic pipelines with Webyotic.
        </p>
    </div>
</section>

<!-- Trust Metrics Summary Bar -->
<section class="py-10 border-y border-white/5 bg-slate-950/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="font-display font-black text-3xl sm:text-4xl text-amber-400">4.9 / 5.0</div>
                <div class="text-xs text-slate-400 mt-1 uppercase font-mono font-semibold">Average Client Rating</div>
            </div>
            <div>
                <div class="font-display font-black text-3xl sm:text-4xl text-emerald-400">98.7%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase font-mono font-semibold">On-Time Delivery Rate</div>
            </div>
            <div>
                <div class="font-display font-black text-3xl sm:text-4xl text-cyan-400">250+</div>
                <div class="text-xs text-slate-400 mt-1 uppercase font-mono font-semibold">Global Deployments</div>
            </div>
            <div>
                <div class="font-display font-black text-3xl sm:text-4xl text-purple-400">68%</div>
                <div class="text-xs text-slate-400 mt-1 uppercase font-mono font-semibold">Avg Backend Latency Cut</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Grid -->
<section class="py-20 bg-slate-950/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="rounded-3xl glass-card border border-white/10 p-8 shadow-card-hover transition-all duration-300 hover:border-amber-500/40 flex flex-col justify-between">
                <div class="space-y-4">
                    <!-- Rating Stars -->
                    <div class="flex items-center space-x-1 text-amber-400">
                        @for($i = 0; $i < ($testimonial->rating ?? 5); $i++)
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                        <span class="ml-2 text-xs font-mono text-emerald-400 font-bold">&bull; Verified Enterprise Client</span>
                    </div>

                    <p class="text-slate-200 text-sm sm:text-base leading-relaxed italic">
                        &ldquo;{{ $testimonial->content }}&rdquo;
                    </p>
                </div>

                <div class="pt-6 border-t border-white/10 flex items-center space-x-4 mt-6">
                    <img loading="lazy" src="{{ $testimonial->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($testimonial->name) }}" alt="{{ $testimonial->name }}" class="w-14 h-14 rounded-full object-cover ring-2 ring-brand-500/40">
                    <div>
                        <h4 class="font-bold text-white text-base">{{ $testimonial->name }}</h4>
                        <p class="text-xs text-slate-400">{{ $testimonial->position }} &bull; <span class="text-cyan-300 font-semibold">{{ $testimonial->company }}</span></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Call to Action -->
<section class="py-20 border-t border-white/5 text-center">
    <div class="max-w-4xl mx-auto px-4 space-y-6">
        <h2 class="font-display font-bold text-3xl sm:text-4xl text-white">Join Our Cohort of High-Growth Partners</h2>
        <p class="text-slate-400 text-base max-w-xl mx-auto">Discover how your company can achieve unprecedented velocity and organic market dominance.</p>
        <div class="pt-2">
            <a href="{{ route('contact') }}" class="inline-flex px-8 py-3.5 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-brand-500 via-cyan-500 to-accent-600 shadow-glow-cyan hover:scale-105 transition-all">
                Initiate Project Discussion
            </a>
        </div>
    </div>
</section>

@endsection
