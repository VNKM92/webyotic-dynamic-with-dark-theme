@extends('frontend.layouts.app')

@section('content')

@if(!empty($page?->content))
<section class="py-8 bg-slate-900/60 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-invert max-w-none">
        {!! $page->content !!}
    </div>
</section>
@endif

<!-- About Hero Section -->
<section class="relative pt-16 pb-24 lg:pt-24 lg:pb-32 overflow-hidden">
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-gradient-to-tr from-brand-600/15 via-accent-600/15 to-transparent rounded-full blur-[130px] pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-block px-3.5 py-1.5 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400 bg-cyan-950/60 border border-cyan-800/60 animate-fade-in-up">
            Architecting Digital Supremacy
        </span>
        <h1 class="font-display font-black text-4xl sm:text-5xl lg:text-6xl text-white tracking-tight max-w-4xl mx-auto leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
            Engineering <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 via-cyan-300 to-accent-400">Mission-Critical Software</span> &amp; Market Leadership.
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto font-normal leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
            Webyotic is an enterprise digital engineering agency where relentless technical precision meets cutting-edge creative growth strategy.
        </p>
    </div>
</section>

<!-- Founders & Origin Story Section -->
<section class="py-20 border-t border-white/5 bg-slate-950/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Story Copy (7 cols) -->
            <div class="lg:col-span-7 space-y-6">
                <span class="text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400">Founders &bull; Vision &bull; Heritage</span>
                <h2 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight">
                    Founded on the Synthesis of Deep Code and High Growth
                </h2>
                
                <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                    Webyotic was established by two visionaries: <strong class="text-white">Vinay</strong>, a senior Software Architect with an obsession for resilient, sub-second backend systems and scalable cloud infrastructure; and <strong class="text-white">Shivam</strong>, a creative powerhouse and growth strategist specializing in conversion design and organic search domination.
                </p>

                <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                    Frustrated by agencies that delivered slow, cookie-cutter templates with zero engineering rigor, Vinay and Shivam set out to create a modern agency standard: zero technical debt, sub-100ms response times, enterprise-grade security protocols, and measurable organic search dominance.
                </p>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4">
                    <div class="p-5 rounded-2xl glass-card border border-white/10">
                        <div class="font-display font-black text-3xl text-cyan-400">250+</div>
                        <div class="text-xs text-slate-400 mt-1 font-medium">Projects Deployed</div>
                    </div>
                    <div class="p-5 rounded-2xl glass-card border border-white/10">
                        <div class="font-display font-black text-3xl text-emerald-400">99.98%</div>
                        <div class="text-xs text-slate-400 mt-1 font-medium">Uptime Track Record</div>
                    </div>
                    <div class="p-5 rounded-2xl glass-card border border-white/10 col-span-2 sm:col-span-1">
                        <div class="font-display font-black text-3xl text-indigo-400">98.7%</div>
                        <div class="text-xs text-slate-400 mt-1 font-medium">Client Retention Rate</div>
                    </div>
                </div>
            </div>

            <!-- Visual Showcase (5 cols) -->
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl glass-card border border-white/10 p-6 space-y-6 shadow-card-hover-dark">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 border border-white/5">
                            <div class="w-14 h-14 rounded-xl bg-cyan-500/20 text-cyan-400 border border-cyan-500/30 flex items-center justify-center font-display font-black text-xl">
                                V
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-base">Vinay</h4>
                                <p class="text-xs text-cyan-400 font-mono font-semibold uppercase">Head of Engineering &amp; Architecture</p>
                                <p class="text-xs text-slate-400 mt-1">Specializes in Laravel 12 core, high-concurrency microservices, database tuning, and cloud DevOps.</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 rounded-2xl bg-white/5 border border-white/5">
                            <div class="w-14 h-14 rounded-xl bg-purple-500/20 text-purple-400 border border-purple-500/30 flex items-center justify-center font-display font-black text-xl">
                                S
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-base">Shivam</h4>
                                <p class="text-xs text-purple-400 font-mono font-semibold uppercase">Chief Creative &amp; Growth Strategist</p>
                                <p class="text-xs text-slate-400 mt-1">Specializes in enterprise UI/UX systems, brand identity, programmatic SEO, and user acquisition.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 text-xs flex items-center space-x-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span>Verified Leadership: Every project is personally overseen by both founders.</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Core Engineering Principles -->
<section class="py-24 border-t border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400 bg-cyan-950/60 border border-cyan-800/60">
                Our Non-Negotiables
            </span>
            <h2 class="font-display font-black text-3xl sm:text-4xl lg:text-5xl text-white tracking-tight">
                Architectural Principles That Govern Every Line of Code
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="rounded-3xl glass-card border border-white/10 p-8 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="font-display font-bold text-xl text-white">Sub-Second Velocity</h3>
                <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                    We eliminate sluggish assets, bloated scripts, and unindexed database queries. Our applications load within 100-200ms, rivaling top Next.js and static web experiences.
                </p>
            </div>

            <div class="rounded-3xl glass-card border border-white/10 p-8 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h3 class="font-display font-bold text-xl text-white">Zero-Compromise Security</h3>
                <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                    CSRF protection, sanitization, encrypted environment secrets, role-based access control, and adherence to OWASP Top 10 standards are ingrained in our core DNA.
                </p>
            </div>

            <div class="rounded-3xl glass-card border border-white/10 p-8 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <h3 class="font-display font-bold text-xl text-white">Commercial Conversion</h3>
                <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                    Clean software means nothing if it doesn't convert users into revenue. We engineer every customer journey with psychological clarity, fast forms, and data instrumentation.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Company Milestones Timeline -->
<section class="py-24 border-t border-white/5 bg-slate-950/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-amber-400 bg-amber-950/60 border border-amber-800/60">
                Track Record
            </span>
            <h2 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight">
                Our Evolution Over the Years
            </h2>
        </div>

        <div class="max-w-3xl mx-auto space-y-8 relative before:absolute before:inset-0 before:left-5 before:w-0.5 before:bg-white/10">
            <div class="relative flex items-start space-x-6">
                <div class="w-10 h-10 rounded-full bg-cyan-500/20 text-cyan-400 border border-cyan-500/40 flex items-center justify-center font-bold text-xs flex-shrink-0 z-10 bg-obsidian">
                    2023
                </div>
                <div class="p-6 rounded-2xl glass-card border border-white/10 flex-1 space-y-1">
                    <h4 class="font-bold text-white text-base">The Founding of Webyotic</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Vinay &amp; Shivam combined senior engineering and digital marketing to build bespoke web solutions for global enterprises.</p>
                </div>
            </div>

            <div class="relative flex items-start space-x-6">
                <div class="w-10 h-10 rounded-full bg-indigo-500/20 text-indigo-400 border border-indigo-500/40 flex items-center justify-center font-bold text-xs flex-shrink-0 z-10 bg-obsidian">
                    2024
                </div>
                <div class="p-6 rounded-2xl glass-card border border-white/10 flex-1 space-y-1">
                    <h4 class="font-bold text-white text-base">Expansion into Microservices &amp; Cloud DevOps</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Scaled operations to handle high-traffic SaaS products, automated AWS CI/CD pipelines, and multi-tenant architectures.</p>
                </div>
            </div>

            <div class="relative flex items-start space-x-6">
                <div class="w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 flex items-center justify-center font-bold text-xs flex-shrink-0 z-10 bg-obsidian">
                    2025-26
                </div>
                <div class="p-6 rounded-2xl glass-card border border-white/10 flex-1 space-y-1">
                    <h4 class="font-bold text-white text-base">Autonomous AI Systems &amp; Modern Laravel 12 Architecture</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Integrated LLM agent pipelines, semantic search engines, and enterprise dashboard platforms across 250+ production deployments.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 border-t border-white/5 text-center">
    <div class="max-w-4xl mx-auto px-4 space-y-6">
        <h2 class="font-display font-bold text-3xl sm:text-4xl text-white">Partner with Vinay &amp; Shivam on Your Next Initiative</h2>
        <p class="text-slate-400 text-base max-w-xl mx-auto">Direct senior architect access. No middle management. Only high-velocity execution.</p>
        <div class="pt-2">
            <a href="{{ route('contact') }}" class="inline-flex px-8 py-3.5 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-brand-500 via-cyan-500 to-accent-600 shadow-glow-cyan hover:scale-105 transition-all">
                Initiate Executive Dialogue
            </a>
        </div>
    </div>
</section>

@endsection
