@php
    // Prepare slides from DB or high-impact defaults
    $sliderList = (isset($sliders) && $sliders->count() > 0) ? $sliders : collect([
        (object)[
            'badge' => '⚡ AI-POWERED SEARCH DOMINANCE',
            'title' => 'Next-Gen Semantic SEO & #1 SERP Domination',
            'highlight' => '#1 SERP Domination',
            'subtitle' => 'Outpace algorithmic updates with automated Knowledge Graph schemas, generative AI search optimization (AEO), and programmatic high-intent keyword clustering.',
            'image_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=85',
            'button_text' => 'Get Free SEO Audit',
            'button_url' => '/contact',
            'secondary_button_text' => 'View Case Studies',
            'secondary_button_url' => '/gallery',
            'seo_stat_label_1' => 'Organic Traffic Surge',
            'seo_stat_val_1' => '+420%',
            'seo_stat_label_2' => 'Core Web Vitals',
            'seo_stat_val_2' => '100/100',
            'seo_stat_label_3' => 'Top 3 SERPs',
            'seo_stat_val_3' => '4,850+',
        ],
        (object)[
            'badge' => '🚀 LIGHTNING EDGE INFRASTRUCTURE',
            'title' => 'Sub-Second Speed Architecture Engineered for Maximum Crawl Budget',
            'highlight' => 'Maximum Crawl Budget',
            'subtitle' => 'Search engines prioritize instantaneous rendering. We combine edge server caching, zero Cumulative Layout Shift (CLS), and sub-20ms TTFB for dominant indexation.',
            'image_url' => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=1600&q=85',
            'button_text' => 'Audit Speed Score',
            'button_url' => '/contact',
            'secondary_button_text' => 'Explore Solutions',
            'secondary_button_url' => '/services',
            'seo_stat_label_1' => 'Global TTFB',
            'seo_stat_val_1' => '12ms',
            'seo_stat_label_2' => 'Edge Availability',
            'seo_stat_val_2' => '99.99%',
            'seo_stat_label_3' => 'Contentful Paint',
            'seo_stat_val_3' => '0.3s',
        ],
        (object)[
            'badge' => '📈 REVENUE-FIRST ORGANIC CONVERSION',
            'title' => 'Programmatic SEO & High-Authority Organic Conversion Engines',
            'highlight' => 'Organic Conversion Engines',
            'subtitle' => 'Transform search traffic into enterprise client pipeline. Mathematically linked architecture, high-trust entity validation, and data-backed conversion rate optimization.',
            'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=85',
            'button_text' => 'Schedule Consultation',
            'button_url' => '/contact',
            'secondary_button_text' => 'View Proof of Work',
            'secondary_button_url' => '/gallery',
            'seo_stat_label_1' => 'Pipeline Return',
            'seo_stat_val_1' => '18.4x',
            'seo_stat_label_2' => 'Indexed Landers',
            'seo_stat_val_2' => '32,000+',
            'seo_stat_label_3' => 'Conversion Lift',
            'seo_stat_val_3' => '4.6x',
        ]
    ]);
@endphp

<!-- Full-Width Advanced SEO Hero Slider -->
<section class="w-full relative bg-slate-950 border-b border-white/10 overflow-hidden select-none"
    x-data="{
        active: 0,
        total: {{ $sliderList->count() }},
        progress: 0,
        isPaused: false,
        duration: 6500,
        timer: null,
        touchStartX: 0,
        touchEndX: 0,
        startProgress() {
            clearInterval(this.timer);
            this.progress = 0;
            const step = 50;
            const increment = (step / this.duration) * 100;
            this.timer = setInterval(() => {
                if (!this.isPaused) {
                    this.progress += increment;
                    if (this.progress >= 100) {
                        this.next();
                    }
                }
            }, step);
        },
        next() {
            this.active = (this.active + 1) % this.total;
            this.startProgress();
        },
        prev() {
            this.active = (this.active - 1 + this.total) % this.total;
            this.startProgress();
        },
        goTo(index) {
            this.active = index;
            this.startProgress();
        },
        handleTouchStart(e) {
            this.touchStartX = e.changedTouches[0].screenX;
        },
        handleTouchEnd(e) {
            this.touchEndX = e.changedTouches[0].screenX;
            if (this.touchStartX - this.touchEndX > 50) {
                this.next();
            } else if (this.touchEndX - this.touchStartX > 50) {
                this.prev();
            }
        }
    }"
    x-init="startProgress()"
    @mouseenter="isPaused = true"
    @mouseleave="isPaused = false"
    @touchstart="handleTouchStart($event)"
    @touchend="handleTouchEnd($event)">

    <!-- High-Tech Ambient Grid & Neon Glow Background -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b0a_1px,transparent_1px),linear-gradient(to_bottom,#1e293b0a_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>
    <div class="absolute top-0 left-1/4 w-[600px] h-[350px] bg-brand-500/15 rounded-full blur-[130px] pointer-events-none -z-10 animate-pulse-slow"></div>
    <div class="absolute bottom-0 right-1/4 w-[500px] h-[300px] bg-cyan-500/15 rounded-full blur-[120px] pointer-events-none -z-10"></div>

    <!-- Slides Wrapper -->
    <div class="w-full relative min-h-[580px] sm:min-h-[620px] lg:min-h-[660px] flex items-center">
        @foreach($sliderList as $index => $slide)
        <div x-show="active === {{ $index }}"
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 translate-x-8 scale-[0.98]"
             x-transition:enter-end="opacity-100 translate-x-0 scale-100"
             x-transition:leave="transition ease-in duration-500 absolute inset-0"
             x-transition:leave-start="opacity-100 translate-x-0 scale-100"
             x-transition:leave-end="opacity-0 -translate-x-8 scale-[0.98]"
             class="w-full py-12 sm:py-16 lg:py-20">
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center">

                    <!-- Left Column: SEO Messaging & Copy (7 cols) -->
                    <div class="lg:col-span-7 space-y-6 sm:space-y-8 text-center lg:text-left">
                        
                        <!-- Top Bar: Index Tag & Badge -->
                        <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3">
                            <span class="px-2.5 py-1 rounded-md bg-white/10 text-cyan-300 font-mono text-[11px] font-bold border border-white/10">
                                0{{ $index + 1 }} / 0{{ $sliderList->count() }}
                            </span>
                            @if(!empty($slide->badge))
                            <span class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 text-xs font-mono font-bold uppercase tracking-wider shadow-glow-cyan">
                                <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                                <span>{{ $slide->badge }}</span>
                            </span>
                            @endif
                        </div>

                        <!-- Main SEO Headline with Dynamic Highlight -->
                        <h2 class="font-display font-black text-3xl sm:text-5xl lg:text-6xl text-white tracking-tight leading-[1.12]">
                            @php
                                $headline = $slide->title;
                                $hl = $slide->highlight;
                            @endphp
                            @if(!empty($hl) && str_contains($headline, $hl))
                                {!! str_replace($hl, '<span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 via-cyan-300 to-accent-400">' . e($hl) . '</span>', e($headline)) !!}
                            @else
                                {{ $headline }}
                            @endif
                        </h2>

                        <!-- SEO Subtitle / Value Proposition -->
                        <p class="text-base sm:text-lg text-slate-300 font-normal leading-relaxed max-w-2xl mx-auto lg:mx-0">
                            {{ $slide->subtitle }}
                        </p>

                        <!-- Dynamic SEO Proof Metric Pills -->
                        <div class="grid grid-cols-3 gap-2 sm:gap-4 pt-2 max-w-lg mx-auto lg:mx-0">
                            @if(!empty($slide->seo_stat_val_1))
                            <div class="p-3 sm:p-4 rounded-2xl bg-white/[0.03] border border-emerald-500/20 backdrop-blur-sm text-left">
                                <div class="text-lg sm:text-2xl font-black font-display text-emerald-400 leading-tight">
                                    {{ $slide->seo_stat_val_1 }}
                                </div>
                                <div class="text-[10px] sm:text-xs font-mono text-slate-400 mt-1 uppercase tracking-wide truncate">
                                    {{ $slide->seo_stat_label_1 ?? 'Metric 1' }}
                                </div>
                            </div>
                            @endif

                            @if(!empty($slide->seo_stat_val_2))
                            <div class="p-3 sm:p-4 rounded-2xl bg-white/[0.03] border border-cyan-500/20 backdrop-blur-sm text-left">
                                <div class="text-lg sm:text-2xl font-black font-display text-cyan-400 leading-tight">
                                    {{ $slide->seo_stat_val_2 }}
                                </div>
                                <div class="text-[10px] sm:text-xs font-mono text-slate-400 mt-1 uppercase tracking-wide truncate">
                                    {{ $slide->seo_stat_label_2 ?? 'Metric 2' }}
                                </div>
                            </div>
                            @endif

                            @if(!empty($slide->seo_stat_val_3))
                            <div class="p-3 sm:p-4 rounded-2xl bg-white/[0.03] border border-indigo-500/20 backdrop-blur-sm text-left">
                                <div class="text-lg sm:text-2xl font-black font-display text-indigo-400 leading-tight">
                                    {{ $slide->seo_stat_val_3 }}
                                </div>
                                <div class="text-[10px] sm:text-xs font-mono text-slate-400 mt-1 uppercase tracking-wide truncate">
                                    {{ $slide->seo_stat_label_3 ?? 'Metric 3' }}
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- CTA Actions -->
                        <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                            @if(!empty($slide->button_text))
                            <a href="{{ $slide->button_url ?? '/contact' }}" class="relative group inline-flex items-center justify-center p-0.5 rounded-2xl font-bold text-sm overflow-hidden shadow-glow-cyan hover:shadow-cyan-500/50 transition-all transform hover:-translate-y-0.5">
                                <span class="absolute inset-0 bg-gradient-to-r from-brand-500 via-accent-500 to-cyan-400"></span>
                                <span class="relative px-6 sm:px-8 py-3.5 rounded-[14px] bg-slate-950 text-white group-hover:bg-transparent transition-colors flex items-center space-x-2">
                                    <span>{{ $slide->button_text }}</span>
                                    <svg class="w-4 h-4 text-cyan-300 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </span>
                            </a>
                            @endif

                            @if(!empty($slide->secondary_button_text))
                            <a href="{{ $slide->secondary_button_url ?? '/gallery' }}" class="px-6 sm:px-8 py-3.5 rounded-2xl bg-white/5 hover:bg-white/10 text-white text-sm font-semibold border border-white/10 hover:border-cyan-400/40 transition-all backdrop-blur-sm">
                                {{ $slide->secondary_button_text }}
                            </a>
                            @endif
                        </div>

                    </div>

                    <!-- Right Column: Visual Showcase & Holographic Image (5 cols) -->
                    <div class="lg:col-span-5 relative">
                        <div class="relative mx-auto max-w-lg lg:max-w-none">
                            
                            <!-- Neon Glow Aura behind visual -->
                            <div class="absolute -inset-1.5 bg-gradient-to-tr from-cyan-500 to-brand-600 rounded-3xl blur-xl opacity-40 group-hover:opacity-75 transition duration-1000 -z-10"></div>

                            <!-- Showcase Card Container -->
                            <div class="relative rounded-3xl border border-white/15 bg-slate-900/90 shadow-2xl overflow-hidden backdrop-blur-xl">
                                
                                <!-- Top Browser / Metric Header Bar -->
                                <div class="px-4 py-3 bg-slate-950/80 border-b border-white/10 flex items-center justify-between">
                                    <div class="flex items-center space-x-1.5">
                                        <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                                        <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                                        <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                                    </div>
                                    <div class="text-[11px] font-mono text-cyan-300 font-semibold flex items-center space-x-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                                        <span>LIVE SEO ENGINE</span>
                                    </div>
                                </div>

                                <!-- Dynamic High-Res Image -->
                                <div class="relative h-64 sm:h-80 lg:h-96 w-full overflow-hidden bg-slate-950">
                                    <img src="{{ $slide->image_url }}" alt="{{ $slide->title }}" class="w-full h-full object-cover transform transition-transform duration-1000 hover:scale-105">
                                    
                                    <!-- Gradient Overlay for readability -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>

                                    <!-- Floating Live Telemetry Badge (Top-Left) -->
                                    <div class="absolute top-4 left-4 p-3 rounded-2xl glass-card border border-white/10 shadow-lg backdrop-blur-md flex items-center space-x-3">
                                        <div class="w-9 h-9 rounded-xl bg-cyan-500/20 border border-cyan-400/30 flex items-center justify-center text-cyan-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-white">#1 SERP Ranking</div>
                                            <div class="text-[10px] font-mono text-emerald-400 font-bold">+420% Organic Lift</div>
                                        </div>
                                    </div>

                                    <!-- Floating Speed Badge (Bottom-Right) -->
                                    <div class="absolute bottom-4 right-4 p-3 rounded-2xl glass-card border border-white/10 shadow-lg backdrop-blur-md flex items-center space-x-3">
                                        <div class="w-9 h-9 rounded-xl bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-white">Core Web Vitals</div>
                                            <div class="text-[10px] font-mono text-cyan-300 font-bold">100 / 100 Score</div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Bottom Status Bar -->
                                <div class="px-5 py-3 bg-slate-950/90 border-t border-white/10 flex items-center justify-between text-[11px] font-mono text-slate-400">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                        <span>Schema JSON-LD Synced</span>
                                    </div>
                                    <span class="text-cyan-400 font-bold">Edge Speed: 12ms</span>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        @endforeach
    </div>

    <!-- Navigation Arrows (Left / Right) -->
    <button @click="prev()" type="button" aria-label="Previous Slide" class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 w-11 h-11 sm:w-13 sm:h-13 rounded-2xl glass-card border border-white/15 text-white hover:text-cyan-300 hover:border-cyan-400/40 hover:scale-105 active:scale-95 transition-all flex items-center justify-center shadow-lg z-20 group">
        <svg class="w-5 h-5 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button @click="next()" type="button" aria-label="Next Slide" class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 w-11 h-11 sm:w-13 sm:h-13 rounded-2xl glass-card border border-white/15 text-white hover:text-cyan-300 hover:border-cyan-400/40 hover:scale-105 active:scale-95 transition-all flex items-center justify-center shadow-lg z-20 group">
        <svg class="w-5 h-5 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
    </button>

    <!-- Bottom Indicator Tabs Bar -->
    <div class="w-full bg-slate-950/80 border-t border-white/10 px-4 py-3 relative z-20">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3">
            
            <!-- Slide Indicators / Tab Buttons -->
            <div class="flex items-center space-x-2">
                @foreach($sliderList as $idx => $slide)
                <button @click="goTo({{ $idx }})" type="button" class="group flex items-center space-x-2 px-3 py-1.5 rounded-xl border text-xs font-mono transition-all"
                    :class="active === {{ $idx }} ? 'bg-cyan-500/15 border-cyan-400/50 text-cyan-300 shadow-glow-cyan' : 'bg-white/5 border-white/10 text-slate-400 hover:text-white hover:bg-white/10'">
                    <span class="font-bold">0{{ $idx + 1 }}</span>
                    <span class="hidden md:inline font-sans font-medium text-[11px] truncate max-w-[120px]">
                        {{ Str::limit($slide->title, 20) }}
                    </span>
                </button>
                @endforeach
            </div>

            <!-- Autoplay Pause / Play & Counter -->
            <div class="flex items-center space-x-3 text-xs font-mono text-slate-400">
                <button @click="isPaused = !isPaused" type="button" class="hover:text-cyan-300 transition-colors flex items-center space-x-1" :title="isPaused ? 'Resume autoplay' : 'Pause autoplay'">
                    <template x-if="!isPaused">
                        <span class="flex items-center space-x-1 text-[11px]">
                            <svg class="w-3.5 h-3.5 text-cyan-400 animate-pulse" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span>Live Autoplay</span>
                        </span>
                    </template>
                    <template x-if="isPaused">
                        <span class="flex items-center space-x-1 text-amber-400 text-[11px]">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
                            <span>Paused</span>
                        </span>
                    </template>
                </button>

                <span class="text-slate-600">|</span>

                <span class="text-[11px] text-slate-400">
                    Slide <span class="text-white font-bold" x-text="active + 1"></span> of <span x-text="total"></span>
                </span>
            </div>

        </div>

        <!-- Top Running Animated Progress Bar -->
        <div class="absolute top-0 left-0 right-0 h-0.5 bg-white/10 overflow-hidden">
            <div class="h-full bg-gradient-to-r from-brand-500 via-cyan-400 to-accent-400 transition-all duration-75 ease-linear shadow-glow-cyan" :style="'width: ' + progress + '%'"></div>
        </div>
    </div>

</section>
