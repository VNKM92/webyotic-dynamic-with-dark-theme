@extends('frontend.layouts.app')

@section('content')

{{-- Full-Width Advanced SEO Hero Slider (Immediately After Navbar) --}}
@include('frontend.partials.hero-slider')

{{-- Special CMS Page Content Injection if populated --}}
@if(!empty($page?->content))
<section class="py-8 bg-slate-900/60 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-invert max-w-none">
        {!! $page->content !!}
    </div>
</section>
@endif

<!-- Dynamic Animated SEO Hero Banner & Interactive Simulator -->
<section class="relative pt-12 pb-24 lg:pt-20 lg:pb-32 overflow-hidden" x-data="{
    activeSeoTab: 'audit',
    radarAngle: 0,
    animateKeywords: true
}">
    <!-- Ambient Radial Gradients & Shimmer Glow -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[550px] bg-gradient-to-tr from-brand-600/25 via-accent-600/20 to-emerald-500/10 rounded-full blur-[140px] pointer-events-none -z-10 animate-pulse-slow"></div>
    <div class="absolute top-10 right-10 w-96 h-96 bg-cyan-400/15 rounded-full blur-[100px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-10 left-10 w-80 h-80 bg-purple-500/15 rounded-full blur-[110px] pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Dynamic Copy & Actions (7 cols) -->
            <div class="lg:col-span-7 text-center lg:text-left space-y-8">
                
                <!-- Dynamic Floating Badge -->
                <div class="inline-flex items-center space-x-2.5 px-4 py-2 rounded-full bg-white/[0.04] border border-cyan-500/30 shadow-glow-cyan">
                    <span class="flex h-2.5 w-2.5 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-cyan-500"></span>
                    </span>
                    <span class="text-xs font-mono font-bold text-cyan-300 tracking-wide uppercase">
                        {{ $siteSettings['home_hero_badge'] ?? '⚡ LEADING ENTERPRISE SEO & DIGITAL ENGINEERING LABS' }}
                    </span>
                </div>

                <!-- Dynamic Main Headline with Gradient Accent -->
                <h1 class="font-display font-black text-4xl sm:text-5xl lg:text-6xl tracking-tight text-white leading-[1.12]">
                    @php
                        $fullTitle = $siteSettings['home_hero_title'] ?? 'We Engineer High-Ranking Digital Platforms That Dominate & Scale';
                        $highlight = $siteSettings['home_hero_highlight'] ?? 'Dominate & Scale';
                    @endphp
                    @if(!empty($highlight) && str_contains($fullTitle, $highlight))
                        {!! str_replace($highlight, '<span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 via-cyan-300 to-accent-400">' . e($highlight) . '</span>', e($fullTitle)) !!}
                    @else
                        {{ $fullTitle }}
                    @endif
                </h1>

                <!-- Dynamic Subheadline -->
                <p class="text-lg sm:text-xl text-slate-300 font-normal leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    {{ $siteSettings['home_hero_subtitle'] ?? 'Founded by Vinay & Shivam, Webyotic merges robust software engineering with programmatic SEO architecture to turn complex web systems into market leaders.' }}
                </p>

                <!-- Dual Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-4 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-brand-500 via-cyan-500 to-accent-600 shadow-glow-cyan hover:shadow-cyan-400/40 hover:scale-[1.02] transition-all flex items-center justify-center space-x-2 group">
                        <span>Launch Your Project</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>

                    <button @click="estimatorOpen = true" type="button" class="w-full sm:w-auto px-8 py-4 rounded-2xl font-semibold text-sm text-slate-200 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-cyan-400/40 transition-all flex items-center justify-center space-x-2">
                        <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        <span>Interactive Scope &amp; Cost Estimator</span>
                    </button>
                </div>

                <!-- Dynamic Animated SEO Telemetry Ticker -->
                <div class="pt-8 border-t border-white/10 grid grid-cols-2 sm:grid-cols-4 gap-6 text-left">
                    <div class="group p-3 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-emerald-500/30 transition-all">
                        <div class="flex items-center space-x-1.5 text-emerald-400 font-mono text-[10px] font-bold uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>SEO Audit</span>
                        </div>
                        <div class="font-display font-extrabold text-xl lg:text-2xl text-white tracking-tight mt-1">
                            {{ $siteSettings['home_seo_score'] ?? '100 / 100' }}
                        </div>
                        <div class="text-[11px] text-slate-400 font-medium">Core Web Vitals Pass</div>
                    </div>

                    <div class="group p-3 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-cyan-500/30 transition-all">
                        <div class="flex items-center space-x-1.5 text-cyan-400 font-mono text-[10px] font-bold uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                            <span>Organic ROI</span>
                        </div>
                        <div class="font-display font-extrabold text-xl lg:text-2xl text-cyan-400 tracking-tight mt-1">
                            {{ $siteSettings['home_seo_traffic'] ?? '+340% Pipeline' }}
                        </div>
                        <div class="text-[11px] text-slate-400 font-medium">Avg Client Growth</div>
                    </div>

                    <div class="group p-3 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-purple-500/30 transition-all">
                        <div class="flex items-center space-x-1.5 text-purple-400 font-mono text-[10px] font-bold uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400 animate-pulse"></span>
                            <span>SERP Ranks</span>
                        </div>
                        <div class="font-display font-extrabold text-xl lg:text-2xl text-purple-300 tracking-tight mt-1">
                            {{ $siteSettings['home_seo_keywords'] ?? '1,420+ Top #1' }}
                        </div>
                        <div class="text-[11px] text-slate-400 font-medium">High-Intent Keywords</div>
                    </div>

                    <div class="group p-3 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-amber-500/30 transition-all">
                        <div class="flex items-center space-x-1.5 text-amber-400 font-mono text-[10px] font-bold uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                            <span>Latency</span>
                        </div>
                        <div class="font-display font-extrabold text-xl lg:text-2xl text-amber-300 tracking-tight mt-1">
                            {{ $siteSettings['home_seo_latency'] ?? '< 95ms Edge' }}
                        </div>
                        <div class="text-[11px] text-slate-400 font-medium">Sub-Second Load</div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Interactive Animated SEO & Banner Showcase (5 cols) -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto w-full max-w-lg lg:max-w-none">
                    
                    <!-- Floating Pill 1: Animated SEO Core Web Vitals Pass -->
                    <div class="absolute -top-6 -left-6 z-30 glass-card px-4 py-2.5 rounded-2xl shadow-xl flex items-center space-x-3 border border-emerald-500/30 animate-float">
                        <div class="w-9 h-9 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold shadow-glow-emerald">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <div class="text-[10px] text-slate-400 uppercase font-mono tracking-wider font-bold">SEO Audit Score</div>
                            <div class="text-xs font-black text-white flex items-center space-x-1">
                                <span class="text-emerald-400">100 / 100</span>
                                <span class="text-[10px] text-slate-400">(All Vitals Green)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Pill 2: Keyword Ranking Surge -->
                    <div class="absolute -bottom-6 -right-4 z-30 glass-card px-4 py-2.5 rounded-2xl shadow-xl flex items-center space-x-3 border border-cyan-500/30 animate-float-delayed">
                        <div class="w-9 h-9 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-bold shadow-glow-cyan">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                        <div>
                            <div class="text-[10px] text-slate-400 uppercase font-mono tracking-wider font-bold">SERP Domination</div>
                            <div class="text-xs font-black text-white">#1 Ranked On Google</div>
                        </div>
                    </div>

                    <!-- Main Dynamic Banner Display Card -->
                    <div class="rounded-3xl glass-card border border-white/10 shadow-card-hover-dark overflow-hidden">
                        
                        <!-- Visual Showcase Image (Configurable dynamically from admin) -->
                        <div class="relative h-48 sm:h-52 overflow-hidden bg-slate-950 border-b border-white/10 group">
                            <img loading="lazy" src="{{ !empty($siteSettings['home_hero_image']) ? $siteSettings['home_hero_image'] : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80' }}" alt="Webyotic Enterprise Platform" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-obsidian/40 to-transparent"></div>
                            
                            <!-- Overlay Top Bar with Live Telemetry -->
                            <div class="absolute top-3 left-3 right-3 flex items-center justify-between">
                                <span class="px-3 py-1 rounded-full text-[10px] font-mono font-bold bg-obsidian/80 backdrop-blur-md text-emerald-400 border border-emerald-500/30 flex items-center space-x-1.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                                    <span>Real-Time Indexing Active</span>
                                </span>

                                <span class="px-2.5 py-1 rounded-full text-[10px] font-mono text-cyan-300 bg-obsidian/80 backdrop-blur-md border border-white/10">
                                    HTTP/3 Edge
                                </span>
                            </div>

                            <div class="absolute bottom-3 left-4 right-4 flex items-center justify-between text-xs">
                                <span class="text-white font-display font-bold truncate">Webyotic Digital Engineering Labs</span>
                                <span class="text-cyan-400 font-mono text-[11px] font-semibold">v12.x Architecture</span>
                            </div>
                        </div>

                        <!-- Interactive Animated SEO Simulator Tabs -->
                        <div class="p-6 bg-slate-950/60 space-y-4">
                            <!-- Tab Switcher Header -->
                            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                                <div class="flex items-center space-x-1">
                                    <button type="button" @click="activeSeoTab = 'audit'" :class="activeSeoTab === 'audit' ? 'bg-cyan-500/20 text-cyan-300 border-cyan-400/40' : 'text-slate-400 hover:text-white border-transparent'" class="px-3 py-1.5 rounded-lg text-xs font-mono font-semibold border transition-all">
                                        SEO Audit
                                    </button>
                                    <button type="button" @click="activeSeoTab = 'serp'" :class="activeSeoTab === 'serp' ? 'bg-purple-500/20 text-purple-300 border-purple-400/40' : 'text-slate-400 hover:text-white border-transparent'" class="px-3 py-1.5 rounded-lg text-xs font-mono font-semibold border transition-all">
                                        SERP Tracker
                                    </button>
                                    <button type="button" @click="activeSeoTab = 'vitals'" :class="activeSeoTab === 'vitals' ? 'bg-emerald-500/20 text-emerald-300 border-emerald-400/40' : 'text-slate-400 hover:text-white border-transparent'" class="px-3 py-1.5 rounded-lg text-xs font-mono font-semibold border transition-all">
                                        Edge Speed
                                    </button>
                                </div>
                                <span class="text-[10px] font-mono text-slate-400 font-bold uppercase hidden sm:inline">Telemetry</span>
                            </div>

                            <!-- Tab 1: SEO Audit Metrics -->
                            <div x-show="activeSeoTab === 'audit'" class="space-y-3 font-mono text-xs" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                                <div class="flex items-center justify-between text-[11px]">
                                    <span class="text-slate-300">Technical SEO Structure</span>
                                    <span class="text-emerald-400 font-bold">100% Score</span>
                                </div>
                                <div class="w-full bg-slate-800 rounded-full h-1.5 overflow-hidden">
                                    <div class="bg-gradient-to-r from-emerald-400 to-cyan-400 h-1.5 rounded-full w-[100%] animate-pulse"></div>
                                </div>

                                <div class="flex items-center justify-between text-[11px] pt-1">
                                    <span class="text-slate-300">Structured JSON-LD Schema</span>
                                    <span class="text-cyan-400 font-bold">Validated Graph</span>
                                </div>
                                <div class="w-full bg-slate-800 rounded-full h-1.5 overflow-hidden">
                                    <div class="bg-gradient-to-r from-cyan-400 to-indigo-500 h-1.5 rounded-full w-[98%]"></div>
                                </div>

                                <div class="flex items-center justify-between text-[11px] pt-1">
                                    <span class="text-slate-300">Mobile Responsiveness</span>
                                    <span class="text-purple-400 font-bold">100 / 100</span>
                                </div>
                                <div class="w-full bg-slate-800 rounded-full h-1.5 overflow-hidden">
                                    <div class="bg-gradient-to-r from-purple-400 to-pink-400 h-1.5 rounded-full w-[100%]"></div>
                                </div>
                            </div>

                            <!-- Tab 2: Keyword SERP Tracker -->
                            <div x-show="activeSeoTab === 'serp'" class="space-y-2 font-mono text-xs" style="display: none;" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                                <div class="p-2 rounded-xl bg-white/[0.03] border border-white/5 flex items-center justify-between">
                                    <span class="text-white truncate max-w-[200px]">"Enterprise Web Architecture"</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">#1 (▲ +14)</span>
                                </div>
                                <div class="p-2 rounded-xl bg-white/[0.03] border border-white/5 flex items-center justify-between">
                                    <span class="text-white truncate max-w-[200px]">"Technical SEO Growth Agency"</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">#1 (▲ +22)</span>
                                </div>
                                <div class="p-2 rounded-xl bg-white/[0.03] border border-white/5 flex items-center justify-between">
                                    <span class="text-white truncate max-w-[200px]">"High-Performance Laravel"</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-cyan-500/20 text-cyan-400 border border-cyan-500/30">#1 (▲ +9)</span>
                                </div>
                            </div>

                            <!-- Tab 3: Edge Speed & Core Web Vitals -->
                            <div x-show="activeSeoTab === 'vitals'" class="space-y-2.5 font-mono text-xs" style="display: none;" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                                <div class="grid grid-cols-3 gap-2 text-center">
                                    <div class="p-2 rounded-xl bg-white/[0.03] border border-white/5">
                                        <div class="text-[10px] text-slate-400">LCP</div>
                                        <div class="font-bold text-emerald-400 text-sm">0.6s</div>
                                    </div>
                                    <div class="p-2 rounded-xl bg-white/[0.03] border border-white/5">
                                        <div class="text-[10px] text-slate-400">CLS</div>
                                        <div class="font-bold text-emerald-400 text-sm">0.00</div>
                                    </div>
                                    <div class="p-2 rounded-xl bg-white/[0.03] border border-white/5">
                                        <div class="text-[10px] text-slate-400">FID</div>
                                        <div class="font-bold text-emerald-400 text-sm">11ms</div>
                                    </div>
                                </div>
                                <div class="p-2.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 text-[11px] flex items-center space-x-2">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                    <span>Sub-100ms Edge TTFB Globally Verified</span>
                                </div>
                            </div>

                            <!-- Live Crawler Telemetry Footer -->
                            <div class="pt-2 border-t border-white/5 flex items-center justify-between text-[11px] font-mono text-slate-400">
                                <span class="flex items-center space-x-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                                    <span>Live Googlebot Telemetry</span>
                                </span>
                                <span class="text-cyan-400 font-semibold">200 OK</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Tech Ecosystem & Authority Marquee -->
<section class="py-12 border-y border-white/5 bg-slate-950/60 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 text-center">
        <p class="text-xs uppercase font-mono tracking-widest text-slate-400 font-semibold">
            Engineered with Modern Industry Standards &amp; Battle-Tested Technologies
        </p>
    </div>
    
    <!-- Logos Row -->
    <div class="flex items-center justify-center flex-wrap gap-8 sm:gap-12 opacity-70 grayscale hover:grayscale-0 transition-all duration-300 px-4">
        <div class="flex items-center space-x-2 text-slate-300 font-bold text-sm">
            <span class="text-rose-500 font-black text-lg">L</span> Laravel 12
        </div>
        <div class="flex items-center space-x-2 text-slate-300 font-bold text-sm">
            <span class="text-cyan-400 font-black text-lg">▲</span> Next.js &amp; React
        </div>
        <div class="flex items-center space-x-2 text-slate-300 font-bold text-sm">
            <span class="text-sky-400 font-black text-lg">⌘</span> Tailwind CSS
        </div>
        <div class="flex items-center space-x-2 text-slate-300 font-bold text-sm">
            <span class="text-indigo-400 font-black text-lg">⚡</span> Alpine.js
        </div>
        <div class="flex items-center space-x-2 text-slate-300 font-bold text-sm">
            <span class="text-amber-400 font-black text-lg">☁</span> AWS Cloud &amp; Docker
        </div>
        <div class="flex items-center space-x-2 text-slate-300 font-bold text-sm">
            <span class="text-emerald-400 font-black text-lg">◈</span> PostgreSQL &amp; Redis
        </div>
        <div class="flex items-center space-x-2 text-slate-300 font-bold text-sm">
            <span class="text-purple-400 font-black text-lg">🧠</span> OpenAI &amp; Claude AI
        </div>
    </div>
</section>

<!-- Enterprise Services Grid -->
<section class="py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400 bg-cyan-950/60 border border-cyan-800/60">
                Core Capabilities
            </span>
            <h2 class="font-display font-black text-3xl sm:text-4xl lg:text-5xl text-white tracking-tight">
                High-Caliber Solutions Engineered for Market Leadership
            </h2>
            <p class="text-slate-400 text-base sm:text-lg">
                We design and build bespoke software and growth engines that help companies scale with speed, security, and measurable commercial return.
            </p>
        </div>

        <!-- Dynamic Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
            <div class="group relative rounded-3xl glass-card border border-white/10 p-8 shadow-card-hover transition-all duration-300 hover:-translate-y-1.5 hover:border-cyan-500/40 hover:shadow-card-hover-dark flex flex-col justify-between">
                <div>
                    <!-- Icon / Badge -->
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-brand-600/30 to-accent-600/30 border border-cyan-500/20 text-cyan-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-cyan-500 group-hover:text-obsidian transition-all duration-300 shadow-glow-cyan">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </div>

                    <h3 class="font-display font-bold text-2xl text-white mb-3 group-hover:text-cyan-300 transition-colors">
                        {{ $service->title }}
                    </h3>

                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        {{ $service->short_description }}
                    </p>
                </div>

                <div class="pt-6 border-t border-white/10 flex items-center justify-between">
                    <a href="{{ route('services') }}" class="text-xs font-bold font-mono tracking-wider text-cyan-400 hover:text-cyan-300 flex items-center space-x-1.5 group-hover:underline">
                        <span>EXPLORE ARCHITECTURE</span>
                        <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <span class="text-[10px] font-mono text-slate-400 font-semibold uppercase">Enterprise Tier</span>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 text-slate-500">
                Services will appear here once seeded.
            </div>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('services') }}" class="inline-flex items-center space-x-2 px-8 py-3.5 rounded-2xl bg-white/5 hover:bg-white/10 border border-white/10 text-sm font-semibold text-white transition-all hover:scale-105">
                <span>View Full Services Catalog &amp; Technical Specs</span>
                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- Interactive 4-Step Engineering Process Flow -->
<section class="py-24 bg-slate-950/70 border-y border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-emerald-400 bg-emerald-950/60 border border-emerald-800/60">
                Systematic Execution
            </span>
            <h2 class="font-display font-black text-3xl sm:text-4xl lg:text-5xl text-white tracking-tight">
                How We Deliver Predictable Excellence
            </h2>
            <p class="text-slate-400 text-base sm:text-lg">
                No guesswork. Our battle-tested lifecycle ensures rapid turnaround, zero security vulnerabilities, and frictionless project scalability.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Step 1 -->
            <div class="rounded-3xl glass-card border border-white/10 p-6 relative">
                <div class="font-mono font-black text-4xl text-cyan-500/20 mb-4">01</div>
                <h4 class="font-display font-bold text-lg text-white mb-2">Discovery &amp; Blueprint</h4>
                <p class="text-xs text-slate-400 leading-relaxed">
                    In-depth requirement analysis, system architecture mapping, data modeling, and performance KPI definition.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="rounded-3xl glass-card border border-white/10 p-6 relative">
                <div class="font-mono font-black text-4xl text-cyan-500/20 mb-4">02</div>
                <h4 class="font-display font-bold text-lg text-white mb-2">High-Velocity Build</h4>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Clean, modular code utilizing Laravel 12, Next.js, and Tailwind CSS. Daily commits, continuous integration, and transparent sprint demos.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="rounded-3xl glass-card border border-white/10 p-6 relative">
                <div class="font-mono font-black text-4xl text-cyan-500/20 mb-4">03</div>
                <h4 class="font-display font-bold text-lg text-white mb-2">Security &amp; QA Audit</h4>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Penetration testing, automated unit tests, Core Web Vitals optimization, and strict multi-device responsiveness audits.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="rounded-3xl glass-card border border-white/10 p-6 relative">
                <div class="font-mono font-black text-4xl text-cyan-500/20 mb-4">04</div>
                <h4 class="font-display font-bold text-lg text-white mb-2">Edge Launch &amp; Scale</h4>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Zero-downtime deployment to AWS/Cloudflare edge networks with 24/7 telemetry monitoring and organic SEO indexation.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- Featured Case Studies & Projects Showcase -->
<section class="py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="space-y-4 max-w-2xl">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-purple-400 bg-purple-950/60 border border-purple-800/60">
                    Real-World Impact
                </span>
                <h2 class="font-display font-black text-3xl sm:text-4xl lg:text-5xl text-white tracking-tight">
                    Featured Case Studies
                </h2>
                <p class="text-slate-400 text-base">
                    Discover how our architectures power transaction volume, customer engagement, and market leadership for enterprise partners.
                </p>
            </div>
            <div>
                <a href="{{ route('gallery') }}" class="inline-flex items-center space-x-2 px-6 py-3 rounded-2xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-semibold text-white transition-all">
                    <span>View All 18+ Projects</span>
                    <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
            <div class="group rounded-3xl glass-card border border-white/10 overflow-hidden shadow-card-hover transition-all duration-300 hover:-translate-y-2 hover:border-cyan-500/40">
                <!-- Preview Image -->
                <div class="relative h-56 overflow-hidden bg-slate-900">
                    <img loading="lazy" src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-obsidian/40 to-transparent"></div>
                    
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[11px] font-mono font-semibold bg-obsidian/80 backdrop-blur-md text-cyan-300 border border-white/10">
                        {{ $project->category ?? 'Enterprise Platform' }}
                    </span>
                </div>

                <!-- Info -->
                <div class="p-6 space-y-4">
                    <h3 class="font-display font-bold text-xl text-white group-hover:text-cyan-300 transition-colors">
                        {{ $project->title }}
                    </h3>
                    
                    <p class="text-slate-400 text-xs leading-relaxed line-clamp-2">
                        {{ $project->description }}
                    </p>

                    <!-- Tags -->
                    @if(!empty($project->tags))
                    <div class="flex flex-wrap gap-1.5 pt-2">
                        @foreach(is_array($project->tags) ? $project->tags : json_decode($project->tags, true) ?? [] as $tag)
                        <span class="px-2 py-0.5 rounded text-[10px] font-mono text-slate-300 bg-white/5 border border-white/10">
                            #{{ $tag }}
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 text-slate-500">
                Case studies will appear here.
            </div>
            @endforelse
        </div>

    </div>
</section>

<!-- Client Testimonials & Social Proof -->
<section class="py-24 bg-slate-950/80 border-t border-white/5 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-amber-400 bg-amber-950/60 border border-amber-800/60">
                Client Accolades
            </span>
            <h2 class="font-display font-black text-3xl sm:text-4xl lg:text-5xl text-white tracking-tight">
                Trusted by Forward-Thinking Leaders
            </h2>
            <p class="text-slate-400 text-base sm:text-lg">
                See what technical founders, CTOs, and growth executives say about scaling their infrastructure with Webyotic.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($testimonials as $t)
            <div class="rounded-3xl glass-card border border-white/10 p-8 relative flex flex-col justify-between shadow-card-hover hover:border-amber-500/30 transition-all duration-300">
                <div class="space-y-4">
                    <!-- Rating Stars -->
                    <div class="flex items-center space-x-1 text-amber-400">
                        @for($i = 0; $i < ($t->rating ?? 5); $i++)
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>

                    <p class="text-slate-200 text-sm sm:text-base leading-relaxed italic">
                        &ldquo;{{ $t->content }}&rdquo;
                    </p>
                </div>

                <div class="pt-6 border-t border-white/10 flex items-center space-x-4 mt-6">
                    <img loading="lazy" src="{{ $t->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($t->name) }}" alt="{{ $t->name }}" class="w-12 h-12 rounded-full object-cover ring-2 ring-brand-500/40">
                    <div>
                        <h4 class="font-bold text-white text-sm">{{ $t->name }}</h4>
                        <p class="text-xs text-slate-400">{{ $t->position }} &bull; <span class="text-cyan-300 font-semibold">{{ $t->company }}</span></p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-2 text-center py-12 text-slate-500">
                Testimonials will appear here once seeded.
            </div>
            @endforelse
        </div>

    </div>
</section>

<!-- Latest Insights & Articles -->
<section class="py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="space-y-4 max-w-2xl">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400 bg-cyan-950/60 border border-cyan-800/60">
                    Knowledge Base
                </span>
                <h2 class="font-display font-black text-3xl sm:text-4xl lg:text-5xl text-white tracking-tight">
                    Engineering Blueprints &amp; Insights
                </h2>
                <p class="text-slate-400 text-base">
                    Read the latest technical write-ups on scaling architecture, SEO best practices, and modern digital engineering.
                </p>
            </div>
            <div>
                <a href="{{ route('blog') }}" class="inline-flex items-center space-x-2 px-6 py-3 rounded-2xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-semibold text-white transition-all">
                    <span>View All Articles</span>
                    <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <article class="group rounded-3xl glass-card border border-white/10 overflow-hidden shadow-card-hover transition-all duration-300 hover:-translate-y-2 hover:border-cyan-500/40 flex flex-col justify-between">
                <div>
                    @if(!empty($post->image))
                    <div class="h-48 overflow-hidden bg-slate-900">
                        <img loading="lazy" src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    @endif

                    <div class="p-6 space-y-3">
                        <div class="flex items-center justify-between text-xs text-slate-400">
                            <span class="text-cyan-400 font-mono font-semibold">{{ $post->category->name ?? 'Engineering' }}</span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>

                        <h3 class="font-display font-bold text-lg text-white group-hover:text-cyan-300 transition-colors line-clamp-2">
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>

                        <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed">
                            {{ Str::limit(strip_tags($post->body), 140) }}
                        </p>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-2">
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-xs font-bold text-cyan-400 hover:text-cyan-300 inline-flex items-center space-x-1.5">
                        <span>Read Blueprint</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-12 text-slate-500">
                Articles will appear here.
            </div>
            @endforelse
        </div>

    </div>
</section>

<!-- High-Conversion Final CTA -->
<section class="py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden p-10 sm:p-16 text-center border border-white/10 shadow-card-hover-dark bg-gradient-to-tr from-slate-950 via-midnight to-surface">
            <!-- Glow background -->
            <div class="absolute -top-32 -left-32 w-80 h-80 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-32 -right-32 w-80 h-80 bg-accent-500/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl mx-auto space-y-6">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400 bg-cyan-950/80 border border-cyan-800">
                    Ready to Scale?
                </span>
                <h2 class="font-display font-black text-3xl sm:text-5xl text-white tracking-tight">
                    Let's Build Something Exceptional Together.
                </h2>
                <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                    Schedule an executive architecture session with founders Vinay &amp; Shivam. We analyze your requirements and provide a detailed roadmap within 48 hours.
                </p>
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-4 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-brand-500 via-cyan-500 to-accent-600 shadow-glow-cyan hover:scale-105 transition-all">
                        Schedule Architecture Consultation
                    </a>
                    <button @click="estimatorOpen = true" type="button" class="w-full sm:w-auto px-8 py-4 rounded-2xl font-semibold text-sm text-slate-200 bg-white/5 hover:bg-white/10 border border-white/10 transition-all">
                        Calculate Instant Estimate
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
