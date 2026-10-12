<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark" x-data="{ mobileMenuOpen: false, estimatorOpen: false }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $seo_title ?? ($siteSettings['site_name'] ?? 'Webyotic') . ' - Enterprise Digital Engineering & Growth Agency' }}</title>
    <meta name="description" content="{{ $seo_description ?? 'Webyotic engineers mission-critical enterprise web applications, high-concurrency cloud systems, and data-driven organic search architectures.' }}">
    @if(!empty($seo_keywords))
    <meta name="keywords" content="{{ $seo_keywords }}">
    @endif
    <meta name="author" content="Webyotic">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $seo_title ?? ($siteSettings['site_name'] ?? 'Webyotic') }}">
    <meta property="og:description" content="{{ $seo_description ?? 'Mission-critical web applications, AI automation, and enterprise organic search architecture.' }}">
    <meta property="og:image" content="{{ asset('images/og-preview.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo_title ?? ($siteSettings['site_name'] ?? 'Webyotic') }}">
    <meta name="twitter:description" content="{{ $seo_description ?? 'Enterprise software engineering and digital transformation.' }}">

    <link rel="alternate" type="application/rss+xml" title="{{ $siteSettings['site_name'] ?? 'Webyotic' }} RSS Feed" href="{{ route('feed') }}">

    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Schema.org Organization Structured Data -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "Organization",
      "name": "Webyotic",
      "url": "{{ url('/') }}",
      "logo": "{{ url('/images/logo.png') }}",
      "description": "Enterprise digital engineering, full-stack web architectures, and organic search growth agency.",
      "founders": [
        {
          "@type": "Person",
          "name": "Vinay",
          "jobTitle": "Head of Engineering"
        },
        {
          "@type": "Person",
          "name": "Shivam",
          "jobTitle": "Creative & Growth Strategist"
        }
      ],
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "{{ $siteSettings['contact_phone'] ?? '+91 8968313005' }}",
        "contactType": "customer service",
        "email": "{{ $siteSettings['contact_email'] ?? 'info@webyotic.com' }}"
      }
    }
    </script>
</head>
<body class="bg-obsidian text-slate-100 font-sans antialiased selection:bg-brand-500 selection:text-white min-h-screen flex flex-col relative overflow-x-hidden">
    
    {{-- Header Ad Injection if active --}}
    {!! optional(\App\Models\Ad::where('is_active', true)->where('location', 'header_top')->first())->code !!}

    {{-- Ambient Top Glow Mesh --}}
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[400px] bg-gradient-to-b from-brand-500/10 via-accent-500/5 to-transparent blur-3xl pointer-events-none -z-10"></div>
    <div class="fixed top-20 right-10 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="fixed bottom-20 left-10 w-96 h-96 bg-accent-600/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

    {{-- System Announcement Bar --}}
    <div class="bg-gradient-to-r from-surface via-slate-900 to-surface border-b border-white/5 py-2 px-4 text-xs font-medium text-slate-300">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse mr-1"></span> Q4 2026 Ready
                </span>
                <span class="hidden sm:inline text-slate-400">Engineering Mission-Critical Digital Products & High-Performance SEO.</span>
            </div>
            <div class="flex items-center space-x-4 text-slate-400">
                <a href="mailto:{{ $siteSettings['contact_email'] ?? 'info@webyotic.com' }}" class="hover:text-brand-400 transition-colors flex items-center space-x-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>{{ $siteSettings['contact_email'] ?? 'info@webyotic.com' }}</span>
                </a>
                <span class="hidden md:inline text-slate-700">|</span>
                <a href="tel:{{ $siteSettings['contact_phone'] ?? '+918968313005' }}" class="hidden md:flex hover:text-brand-400 transition-colors items-center space-x-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>{{ $siteSettings['contact_phone'] ?? '+91 8968313005' }}</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="group flex items-center space-x-3">
                    <div class="relative w-11 h-11 rounded-xl bg-gradient-to-tr from-brand-600 via-accent-500 to-brand-400 p-0.5 shadow-glow-cyan transition-transform duration-300 group-hover:scale-105">
                        <div class="w-full h-full bg-obsidian rounded-[10px] flex items-center justify-center">
                            <span class="font-display font-black text-xl text-transparent bg-clip-text bg-gradient-to-tr from-cyan-400 to-indigo-400">W</span>
                        </div>
                        <span class="absolute -top-1 -right-1 w-3 h-3 bg-brand-400 rounded-full animate-ping opacity-75"></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-display font-black text-2xl tracking-tight text-white group-hover:text-cyan-300 transition-colors">
                            Web<span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-accent-400">yotic</span>
                        </span>
                        <span class="text-[10px] font-mono tracking-widest uppercase text-slate-400 -mt-1 font-semibold">Enterprise Labs</span>
                    </div>
                </a>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden lg:flex items-center space-x-1 p-1.5 rounded-full bg-white/[0.03] border border-white/10 shadow-inner">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('home') ? 'bg-white/10 text-brand-300 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('about') ? 'bg-white/10 text-brand-300 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        About Us
                    </a>
                    <a href="{{ route('services') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('services') ? 'bg-white/10 text-brand-300 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Services
                    </a>
                    <a href="{{ route('gallery') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('gallery') ? 'bg-white/10 text-brand-300 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Case Studies
                    </a>
                    <a href="{{ route('testimonials') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('testimonials') ? 'bg-white/10 text-brand-300 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Testimonials
                    </a>
                    <a href="{{ route('blog') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('blog*') ? 'bg-white/10 text-brand-300 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Insights
                    </a>
                    <a href="{{ route('contact') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('contact') ? 'bg-white/10 text-brand-300 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Contact
                    </a>
                </nav>

                <!-- Actions / CTA -->
                <div class="hidden sm:flex items-center space-x-3">
                    <button @click="estimatorOpen = true" type="button" class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl text-xs font-semibold text-slate-300 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-brand-500/40 transition-all hover:scale-[1.02]">
                        <svg class="w-4 h-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        <span>Estimate Scope</span>
                    </button>

                    <a href="{{ route('contact') }}" class="relative group inline-flex items-center justify-center p-0.5 rounded-xl font-semibold text-xs overflow-hidden shadow-glow-cyan hover:shadow-cyan-500/50 transition-all transform hover:-translate-y-0.5">
                        <span class="absolute inset-0 bg-gradient-to-r from-brand-500 via-accent-500 to-brand-400 group-hover:opacity-90 transition-opacity"></span>
                        <span class="relative px-5 py-2.5 rounded-[10px] bg-slate-950/70 text-white font-medium group-hover:bg-transparent transition-colors flex items-center space-x-1.5">
                            <span>Get Started</span>
                            <svg class="w-3.5 h-3.5 text-brand-300 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex lg:hidden items-center space-x-2">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2.5 rounded-xl bg-white/5 border border-white/10 text-slate-300 hover:text-white focus:outline-none">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4" class="lg:hidden glass-card border-b border-white/10 px-6 py-6 space-y-4" style="display: none;">
            <nav class="flex flex-col space-y-2">
                <a href="{{ route('home') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('home') ? 'bg-brand-500/10 text-brand-400 border border-brand-500/20' : 'text-slate-300 hover:bg-white/5' }}">Home</a>
                <a href="{{ route('about') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('about') ? 'bg-brand-500/10 text-brand-400 border border-brand-500/20' : 'text-slate-300 hover:bg-white/5' }}">About Us</a>
                <a href="{{ route('services') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('services') ? 'bg-brand-500/10 text-brand-400 border border-brand-500/20' : 'text-slate-300 hover:bg-white/5' }}">Services</a>
                <a href="{{ route('gallery') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('gallery') ? 'bg-brand-500/10 text-brand-400 border border-brand-500/20' : 'text-slate-300 hover:bg-white/5' }}">Case Studies</a>
                <a href="{{ route('testimonials') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('testimonials') ? 'bg-brand-500/10 text-brand-400 border border-brand-500/20' : 'text-slate-300 hover:bg-white/5' }}">Testimonials</a>
                <a href="{{ route('blog') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('blog*') ? 'bg-brand-500/10 text-brand-400 border border-brand-500/20' : 'text-slate-300 hover:bg-white/5' }}">Insights</a>
                <a href="{{ route('contact') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('contact') ? 'bg-brand-500/10 text-brand-400 border border-brand-500/20' : 'text-slate-300 hover:bg-white/5' }}">Contact</a>
            </nav>
            <div class="pt-4 border-t border-white/10 flex flex-col space-y-3">
                <button @click="estimatorOpen = true; mobileMenuOpen = false" class="w-full py-3 rounded-xl bg-white/5 border border-white/10 text-sm font-semibold text-center text-slate-200">
                    Estimate Project Scope
                </button>
                <a href="{{ route('contact') }}" class="w-full py-3 rounded-xl bg-gradient-to-r from-brand-500 to-accent-600 text-sm font-semibold text-center text-white shadow-glow-cyan">
                    Start Your Project
                </a>
            </div>
        </div>
    </header>

    <!-- Global Toast Notifications -->
    <div class="fixed top-24 right-4 z-50 max-w-md w-full pointer-events-none space-y-3">
        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 7000)" class="pointer-events-auto flex items-start p-4 rounded-2xl glass-card border-l-4 border-emerald-400 shadow-glow-emerald animate-fade-in-up">
            <div class="flex-shrink-0 text-emerald-400 mr-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="flex-1">
                <h4 class="text-sm font-bold text-white">Success</h4>
                <p class="text-xs text-slate-300 mt-0.5">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="text-slate-400 hover:text-white ml-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        @endif

        @if($errors->any())
        <div x-data="{ show: true }" x-show="show" class="pointer-events-auto flex items-start p-4 rounded-2xl glass-card border-l-4 border-rose-400 shadow-xl animate-fade-in-up">
            <div class="flex-shrink-0 text-rose-400 mr-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="flex-1">
                <h4 class="text-sm font-bold text-white">Please check your entries</h4>
                <ul class="text-xs text-rose-200 mt-1 list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button @click="show = false" class="text-slate-400 hover:text-white ml-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        @endif
    </div>

    <!-- Main Content Slot -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Interactive Scope & Cost Estimator Modal -->
    <div x-show="estimatorOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 sm:p-6" style="display: none;" @keydown.escape.window="estimatorOpen = false">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/80 backdrop-blur-md" @click="estimatorOpen = false"></div>

        <!-- Modal Card -->
        <div class="relative w-full max-w-2xl rounded-3xl glass-card border border-white/10 shadow-card-hover-dark p-6 sm:p-8 z-10 overflow-hidden" x-data="{
            step: 1,
            projectType: 'Web Application',
            timeline: '4 - 8 Weeks',
            budgetRange: '$5,000 - $15,000',
            name: '',
            email: '',
            phone: '',
            notes: '',
            submitted: false,
            loading: false,
            submitEstimate() {
                this.loading = true;
                fetch('{{ route('quote.submit') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: this.name,
                        email: this.email,
                        phone: this.phone,
                        project_type: this.projectType,
                        scope: 'Calculated in interactive estimator',
                        timeline: this.timeline,
                        estimated_budget: this.budgetRange,
                        details: this.notes
                    })
                })
                .then(res => res.json())
                .then(data => {
                    this.loading = false;
                    this.submitted = true;
                })
                .catch(() => {
                    this.loading = false;
                    this.submitted = true;
                });
            }
        }">
            <!-- Background Glow -->
            <div class="absolute -top-20 -right-20 w-60 h-60 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Header -->
            <div class="flex items-center justify-between pb-4 border-b border-white/10">
                <div class="flex items-center space-x-3">
                    <div class="p-2.5 rounded-xl bg-brand-500/10 text-brand-400 border border-brand-500/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold font-display text-white">Interactive Project Estimator</h3>
                        <p class="text-xs text-slate-400">Configure your parameters for an instant scope blueprint</p>
                    </div>
                </div>
                <button @click="estimatorOpen = false" class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Content -->
            <div class="py-6">
                <div x-show="!submitted">
                    <!-- Step 1: Select Type -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">1. Solution Category</label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5">
                                <template x-for="type in ['Web Application', 'AI Automation', 'Enterprise SEO', 'Cloud & DevOps', 'Mobile App', 'UI/UX Redesign']" :key="type">
                                    <button type="button" @click="projectType = type" :class="projectType === type ? 'bg-brand-500/20 border-brand-400 text-white font-semibold shadow-glow-cyan' : 'bg-white/5 border-white/10 text-slate-300 hover:border-white/20'" class="p-3 rounded-xl border text-xs text-left transition-all">
                                        <span x-text="type"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Step 2: Target Timeline -->
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">2. Desired Timeline</label>
                            <div class="grid grid-cols-3 gap-2.5">
                                <template x-for="time in ['Urgent (< 4 wks)', '4 - 8 Weeks', 'Flexible / Retainer']" :key="time">
                                    <button type="button" @click="timeline = time" :class="timeline === time ? 'bg-accent-500/20 border-accent-400 text-white font-semibold' : 'bg-white/5 border-white/10 text-slate-300 hover:border-white/20'" class="p-3 rounded-xl border text-xs text-center transition-all">
                                        <span x-text="time"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Step 3: Estimated Budget Range -->
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">3. Anticipated Investment Tier</label>
                            <div class="grid grid-cols-3 gap-2.5">
                                <template x-for="b in ['$2.5k - $5k', '$5k - $15k', '$15k - $50k+']" :key="b">
                                    <button type="button" @click="budgetRange = b" :class="budgetRange === b ? 'bg-emerald-500/20 border-emerald-400 text-emerald-300 font-semibold' : 'bg-white/5 border-white/10 text-slate-300 hover:border-white/20'" class="p-3 rounded-xl border text-xs text-center transition-all">
                                        <span x-text="b"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Step 4: Contact Info -->
                        <div class="pt-2 border-t border-white/10 grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs text-slate-300 mb-1">Your Name</label>
                                <input type="text" x-model="name" placeholder="Alexander Vance" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-400">
                            </div>
                            <div>
                                <label class="block text-xs text-slate-300 mb-1">Corporate Email</label>
                                <input type="email" x-model="email" placeholder="vance@nexis.com" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-400">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs text-slate-300 mb-1">Project Brief / Specific Requirements</label>
                            <textarea x-model="notes" rows="2" placeholder="Brief overview of features, existing tech stack, or targets..." class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-400"></textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <div class="text-xs text-slate-400 flex items-center space-x-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span>Direct architect review within 24h</span>
                        </div>
                        <button type="button" @click="submitEstimate()" :disabled="!name || !email || loading" class="px-6 py-2.5 rounded-xl font-semibold text-xs text-white bg-gradient-to-r from-brand-500 to-accent-600 shadow-glow-cyan hover:opacity-90 disabled:opacity-50 disabled:cursor-not-allowed transition-all flex items-center space-x-1.5">
                            <span x-show="!loading">Send Estimate Request</span>
                            <span x-show="loading" style="display: none;">Generating Scope...</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Submission Success State -->
                <div x-show="submitted" class="py-10 text-center space-y-4" style="display: none;">
                    <div class="w-16 h-16 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 flex items-center justify-center mx-auto shadow-glow-emerald">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h4 class="text-2xl font-bold font-display text-white">Estimate Request Received!</h4>
                    <p class="text-sm text-slate-300 max-w-md mx-auto">
                        Thank you, <span class="text-brand-300 font-semibold" x-text="name"></span>. Vinay & Shivam have received your configuration and will follow up at <span class="text-brand-300 font-semibold" x-text="email"></span> with an architecture proposal.
                    </p>
                    <button type="button" @click="estimatorOpen = false; submitted = false;" class="mt-4 px-6 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-xs font-semibold text-white transition-colors">
                        Close Window
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Quick Contact Bubble -->
    <aside aria-label="Direct Support Contact" class="fixed bottom-6 right-6 z-40 flex items-center space-x-2">
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteSettings['contact_phone'] ?? '918968313005') }}?text={{ urlencode('Hello Webyotic Team, I would like to discuss an enterprise project.') }}" target="_blank" rel="noopener noreferrer" class="group relative flex items-center space-x-2 px-4 py-3 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold shadow-glow-emerald transition-all transform hover:scale-105">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
            <span class="hidden sm:inline">WhatsApp Fast Track</span>
        </a>
    </aside>

    <!-- Global Enterprise Footer -->
    <footer class="bg-slate-950 border-t border-white/10 text-slate-400 relative overflow-hidden">
        <!-- Background accents -->
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-48 bg-gradient-to-t from-brand-950/20 to-transparent pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 lg:gap-8 mb-16">
                <!-- Col 1: Brand & Bio (2 cols wide on desktop) -->
                <div class="lg:col-span-2 space-y-6">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-500 to-accent-500 p-0.5 shadow-glow-cyan">
                            <div class="w-full h-full bg-obsidian rounded-[10px] flex items-center justify-center font-display font-black text-lg text-white">
                                W
                            </div>
                        </div>
                        <span class="font-display font-extrabold text-2xl text-white">
                            Web<span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-accent-400">yotic</span>
                        </span>
                    </a>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                        High-caliber digital engineering and enterprise SEO agency founded by Vinay & Shivam. We build fault-tolerant web applications, AI automation agents, and high-ranking organic search systems for ambitious brands.
                    </p>
                    <div class="flex items-center space-x-2 text-xs font-mono text-emerald-400">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span class="font-semibold">All Systems Operational &bull; 99.98% SLA</span>
                    </div>
                </div>

                <!-- Col 2: Services -->
                <div class="space-y-4">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-white font-mono">Solutions</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('services') }}" class="hover:text-brand-300 transition-colors">Enterprise Web Apps</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-brand-300 transition-colors">AI Engineering & Agents</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-brand-300 transition-colors">Technical SEO Strategy</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-brand-300 transition-colors">Cloud & DevOps Clusters</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-brand-300 transition-colors">UI/UX Design Systems</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-brand-300 transition-colors">Mobile Applications</a></li>
                    </ul>
                </div>

                <!-- Col 3: Company -->
                <div class="space-y-4">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-white font-mono">Company</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('about') }}" class="hover:text-brand-300 transition-colors">About Founders & Vision</a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-brand-300 transition-colors">Client Case Studies</a></li>
                        <li><a href="{{ route('testimonials') }}" class="hover:text-brand-300 transition-colors">Verified Testimonials</a></li>
                        <li><a href="{{ route('blog') }}" class="hover:text-brand-300 transition-colors">Engineering Insights</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-brand-300 transition-colors">Contact Headquarters</a></li>
                        <li><a href="{{ route('sitemap') }}" class="hover:text-brand-300 transition-colors">Sitemap XML</a></li>
                    </ul>
                </div>

                <!-- Col 4: Direct Headquarters & Contact -->
                <div class="space-y-4">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-white font-mono">Direct Connect</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start space-x-2.5">
                            <svg class="w-4 h-4 text-brand-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-slate-300">Engineering Labs &bull; Global Remote Services</span>
                        </div>
                        <div class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-brand-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:{{ $siteSettings['contact_email'] ?? 'info@webyotic.com' }}" class="text-slate-300 hover:text-brand-300 transition-colors">{{ $siteSettings['contact_email'] ?? 'info@webyotic.com' }}</a>
                        </div>
                        <div class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-brand-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:{{ $siteSettings['contact_phone'] ?? '+918968313005' }}" class="text-slate-300 hover:text-brand-300 transition-colors">{{ $siteSettings['contact_phone'] ?? '+91 8968313005' }}</a>
                        </div>
                        <div class="pt-2">
                            <a href="{{ route('login') }}" class="inline-flex items-center space-x-1.5 text-xs text-slate-500 hover:text-slate-300 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <span>Employee & Admin Gateway</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row -->
            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} {{ $siteSettings['site_name'] ?? 'Webyotic' }}. All rights reserved. Precision Engineering by Vinay & Shivam.</p>
                <div class="flex items-center space-x-6">
                    <span class="hover:text-slate-300 transition-colors">High-Availability Architecture</span>
                    <span class="text-slate-700">&bull;</span>
                    <span class="hover:text-slate-300 transition-colors">SSL 256-Bit Encrypted</span>
                    <span class="text-slate-700">&bull;</span>
                    <a href="{{ route('rss') }}" class="hover:text-slate-300 transition-colors">RSS Feed</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Footer Ad Injection if active --}}
    {!! optional(\App\Models\Ad::where('is_active', true)->where('location', 'footer_bottom')->first())->code !!}

    @stack('scripts')
</body>
</html>
