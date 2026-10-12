@extends('frontend.layouts.app')

@section('content')

@if(isset($page) && !empty($page->content))
<section class="py-8 bg-slate-900/60 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-invert max-w-none">
        {!! $page->content !!}
    </div>
</section>
@endif

<!-- Services Hero Section -->
<section class="relative pt-16 pb-24 lg:pt-24 lg:pb-32 overflow-hidden">
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-gradient-to-tr from-brand-600/15 via-accent-600/15 to-transparent rounded-full blur-[130px] pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-block px-3.5 py-1.5 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400 bg-cyan-950/60 border border-cyan-800/60 animate-fade-in-up">
            Full-Spectrum Engineering Capabilities
        </span>
        <h1 class="font-display font-black text-4xl sm:text-5xl lg:text-6xl text-white tracking-tight max-w-4xl mx-auto leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
            Enterprise Solutions for <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 via-cyan-300 to-accent-400">Scale, Speed &amp; Supremacy</span>.
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto font-normal leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
            We engineer resilient web platforms, autonomous AI workflows, conversion-optimized design systems, and aggressive search engine architectures.
        </p>
    </div>
</section>

<!-- Dynamic Services Catalog -->
<section class="py-20 border-t border-white/5 bg-slate-950/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="group rounded-3xl glass-card border border-white/10 p-8 shadow-card-hover transition-all duration-300 hover:-translate-y-2 hover:border-cyan-500/40 hover:shadow-card-hover-dark flex flex-col justify-between">
                <div>
                    @if(!empty($service->image))
                    <div class="h-44 rounded-2xl overflow-hidden mb-6 bg-slate-900 border border-white/5">
                        <img loading="lazy" src="{{ $service->image }}" alt="{{ $service->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    @else
                    <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 flex items-center justify-center mb-6 font-display font-black text-xl">
                        {{ substr($service->title, 0, 1) }}
                    </div>
                    @endif

                    <h3 class="font-display font-bold text-2xl text-white mb-3 group-hover:text-cyan-300 transition-colors">
                        {{ $service->title }}
                    </h3>

                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed mb-6">
                        {{ $service->description ?? $service->short_description }}
                    </p>
                </div>

                <div class="pt-6 border-t border-white/10 flex items-center justify-between">
                    <button @click="estimatorOpen = true" class="text-xs font-mono font-bold uppercase tracking-wider text-cyan-400 hover:text-cyan-300 flex items-center space-x-1.5">
                        <span>ESTIMATE SCOPE</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                    <span class="text-[10px] font-mono text-slate-500 uppercase">SLA &bull; 99.98%</span>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Engineering Standards Matrix (Comparison Table) -->
<section class="py-24 border-t border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-emerald-400 bg-emerald-950/60 border border-emerald-800/60">
                The Webyotic Advantage
            </span>
            <h2 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight">
                Webyotic Enterprise Standard vs Typical Web Agencies
            </h2>
        </div>

        <div class="rounded-3xl glass-card border border-white/10 overflow-hidden shadow-card-hover-dark">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs sm:text-sm">
                    <thead>
                        <tr class="bg-slate-950/90 border-b border-white/10 text-slate-300 font-mono text-xs uppercase">
                            <th class="p-6">Architectural Benchmark</th>
                            <th class="p-6 text-cyan-400 font-bold bg-cyan-950/30">Webyotic Standard</th>
                            <th class="p-6 text-slate-400">Typical Agency / Freelancers</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-slate-300">
                        <tr>
                            <td class="p-6 font-semibold text-white">Stack Architecture</td>
                            <td class="p-6 text-cyan-300 font-medium bg-cyan-950/10">Bespoke Laravel 12 + Next.js / Tailwind (Clean Code)</td>
                            <td class="p-6 text-slate-400">Heavy bloated WordPress themes &amp; brittle plugins</td>
                        </tr>
                        <tr>
                            <td class="p-6 font-semibold text-white">Core Web Vitals &amp; PageSpeed</td>
                            <td class="p-6 text-emerald-400 font-bold bg-cyan-950/10">95 - 100 Mobile Score (&lt; 200ms latency)</td>
                            <td class="p-6 text-slate-400">30 - 65 Score (3 to 6 second load times)</td>
                        </tr>
                        <tr>
                            <td class="p-6 font-semibold text-white">Security Protocol</td>
                            <td class="p-6 text-cyan-300 font-medium bg-cyan-950/10">Zero-Trust, CSRF, sanitization, encrypted secrets, strict headers</td>
                            <td class="p-6 text-slate-400">Default settings, vulnerable shared hosting, unpatched scripts</td>
                        </tr>
                        <tr>
                            <td class="p-6 font-semibold text-white">Direct Architect Access</td>
                            <td class="p-6 text-cyan-300 font-medium bg-cyan-950/10">Direct communication with founders Vinay &amp; Shivam</td>
                            <td class="p-6 text-slate-400">Passed down to junior interns &amp; account handlers</td>
                        </tr>
                        <tr>
                            <td class="p-6 font-semibold text-white">Search Engine Architecture</td>
                            <td class="p-6 text-emerald-400 font-bold bg-cyan-950/10">Programmatic SEO, JSON-LD Schema graph, instant indexing</td>
                            <td class="p-6 text-slate-400">Basic meta tag plugins without structured semantic data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- Interactive Technical FAQs (Alpine.js) -->
<section class="py-24 border-t border-white/5 bg-slate-950/60" x-data="{ activeFaq: null }">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16 space-y-4">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-purple-400 bg-purple-950/60 border border-purple-800/60">
                Technical Inquiries
            </span>
            <h2 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight">
                Frequently Asked Architectural Questions
            </h2>
        </div>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="rounded-2xl glass-card border border-white/10 overflow-hidden transition-all">
                <button type="button" @click="activeFaq = (activeFaq === 1 ? null : 1)" class="w-full p-6 text-left flex items-center justify-between font-bold text-white text-base">
                    <span>Why do you recommend Laravel combined with Tailwind and Next-Gen techniques?</span>
                    <svg class="w-5 h-5 text-cyan-400 transition-transform duration-300" :class="activeFaq === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="activeFaq === 1" x-collapse class="px-6 pb-6 text-xs sm:text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-4">
                    Laravel provides unmatched backend security, Eloquent ORM elegance, built-in queue processing, and rock-solid architectural foundations. Paired with lightweight utility Tailwind CSS and instant client prefetching, pages feel instantaneous without the bloated bundle sizes of monolithic SPAs.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="rounded-2xl glass-card border border-white/10 overflow-hidden transition-all">
                <button type="button" @click="activeFaq = (activeFaq === 2 ? null : 2)" class="w-full p-6 text-left flex items-center justify-between font-bold text-white text-base">
                    <span>Can you integrate custom AI models and autonomous agent workflows?</span>
                    <svg class="w-5 h-5 text-cyan-400 transition-transform duration-300" :class="activeFaq === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="activeFaq === 2" x-collapse class="px-6 pb-6 text-xs sm:text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-4">
                    Yes. We engineer private Retrieval-Augmented Generation (RAG) pipelines, autonomous task agents, custom OpenAI/Claude integrations, and streaming AI assistant interfaces directly into your enterprise dashboard and business workflows.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="rounded-2xl glass-card border border-white/10 overflow-hidden transition-all">
                <button type="button" @click="activeFaq = (activeFaq === 3 ? null : 3)" class="w-full p-6 text-left flex items-center justify-between font-bold text-white text-base">
                    <span>What is your typical turnaround timeline for an enterprise web application?</span>
                    <svg class="w-5 h-5 text-cyan-400 transition-transform duration-300" :class="activeFaq === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="activeFaq === 3" x-collapse class="px-6 pb-6 text-xs sm:text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-4">
                    Most full-scale enterprise products ship within 4 to 8 weeks through agile two-week sprint milestones. We provide staging environments, continuous deployment previews, and direct Slack/Discord channels with Vinay &amp; Shivam.
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Call to Action -->
<section class="py-20 border-t border-white/5 text-center">
    <div class="max-w-4xl mx-auto px-4 space-y-6">
        <h2 class="font-display font-bold text-3xl sm:text-4xl text-white">Need a Customized Architecture Consultation?</h2>
        <p class="text-slate-400 text-base max-w-xl mx-auto">Tell us what you are building and we will architect a turnkey solution for your stack.</p>
        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('contact') }}" class="px-8 py-3.5 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-brand-500 via-cyan-500 to-accent-600 shadow-glow-cyan hover:scale-105 transition-all">
                Start Architecture Dialogue
            </a>
            <button @click="estimatorOpen = true" type="button" class="px-8 py-3.5 rounded-2xl font-semibold text-sm text-slate-200 bg-white/5 hover:bg-white/10 border border-white/10 transition-all">
                Launch Instant Estimator
            </button>
        </div>
    </div>
</section>

@endsection
