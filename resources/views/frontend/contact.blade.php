@extends('frontend.layouts.app')

@section('content')

@if(!empty($page?->content))
<section class="py-8 bg-slate-900/60 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-invert max-w-none">
        {!! $page->content !!}
    </div>
</section>
@endif

<!-- Contact Hero Section -->
<section class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 overflow-hidden">
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-gradient-to-tr from-brand-600/15 via-accent-600/15 to-transparent rounded-full blur-[130px] pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-block px-3.5 py-1.5 rounded-full text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400 bg-cyan-950/60 border border-cyan-800/60 animate-fade-in-up">
            Direct Executive Access
        </span>
        <h1 class="font-display font-black text-4xl sm:text-5xl lg:text-6xl text-white tracking-tight max-w-4xl mx-auto leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
            Initiate Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 via-cyan-300 to-accent-400">Enterprise Project</span>.
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto font-normal leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
            Engage with founders Vinay &amp; Shivam. We review all technical requirements, discuss architectural blueprints, and provide preliminary scopes within 24 hours.
        </p>
    </div>
</section>

<!-- Main Contact Form & Details Section -->
<section class="py-16 border-t border-white/5 bg-slate-950/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            
            <!-- Left Column: Direct Contact Info (5 cols) -->
            <div class="lg:col-span-5 space-y-8">
                <div class="rounded-3xl glass-card border border-white/10 p-8 space-y-6 shadow-card-hover-dark">
                    <h3 class="font-display font-bold text-2xl text-white">Direct Connect Channels</h3>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                        We prioritize fast, technical conversations with decision makers. Reach out through any of our executive communication links below.
                    </p>

                    <div class="space-y-5 pt-2">
                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-mono font-semibold uppercase text-slate-400">Corporate Email</h4>
                                <a href="mailto:{{ $siteSettings['contact_email'] ?? 'info@webyotic.com' }}" class="text-sm sm:text-base font-bold text-white hover:text-cyan-300 transition-colors">
                                    {{ $siteSettings['contact_email'] ?? 'info@webyotic.com' }}
                                </a>
                                <p class="text-[11px] text-slate-500 mt-0.5">Average response: &lt; 4 hours</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-mono font-semibold uppercase text-slate-400">Direct Hotline</h4>
                                <a href="tel:{{ $siteSettings['contact_phone'] ?? '+918968313005' }}" class="text-sm sm:text-base font-bold text-white hover:text-emerald-300 transition-colors">
                                    {{ $siteSettings['contact_phone'] ?? '+91 8968313005' }}
                                </a>
                                <p class="text-[11px] text-slate-500 mt-0.5">Mon - Sat, 9am - 8pm IST</p>
                            </div>
                        </div>

                        <!-- WhatsApp Fast Track -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-mono font-semibold uppercase text-slate-400">WhatsApp Fast Track</h4>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteSettings['contact_phone'] ?? '918968313005') }}?text={{ urlencode('Hello Webyotic Team, I would like to discuss an enterprise project.') }}" target="_blank" rel="noopener noreferrer" class="text-sm sm:text-base font-bold text-white hover:text-emerald-300 transition-colors">
                                    Instant Chat with Founders
                                </a>
                                <p class="text-[11px] text-slate-500 mt-0.5">Real-time status</p>
                            </div>
                        </div>
                    </div>

                    <!-- SLA Box -->
                    <div class="p-4 rounded-2xl bg-cyan-950/40 border border-cyan-800/40 text-cyan-300 text-xs flex items-center space-x-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>NDA Available: We are pleased to execute non-disclosure agreements prior to technical reviews.</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Enterprise Inquiry Form (7 cols) -->
            <div class="lg:col-span-7">
                <div class="rounded-3xl glass-card border border-white/10 p-8 sm:p-10 shadow-card-hover-dark">
                    <h3 class="font-display font-bold text-2xl text-white mb-2">Project Brief &amp; Scope Inquiry</h3>
                    <p class="text-slate-400 text-xs sm:text-sm mb-8">Fill in your specifications below. Vinay &amp; Shivam will personally review your brief.</p>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Anti-spam Honeypot (hidden from real users) -->
                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="website_honeypot" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Full Name *</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Alexander Vance" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 transition-colors">
                            </div>

                            <!-- Corporate Email -->
                            <div>
                                <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Corporate Email *</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="alex@company.com" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 transition-colors">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Phone / WhatsApp</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+1 (555) 000-0000" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 transition-colors">
                            </div>

                            <!-- Solution Focus -->
                            <div>
                                <label for="service" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Core Solution Needed</label>
                                <select id="service" name="service" class="w-full bg-slate-900 border border-white/10 rounded-2xl px-4 py-3 text-sm text-white focus:outline-none focus:border-cyan-400 transition-colors">
                                    <option value="Enterprise Web Applications">Enterprise Web Applications</option>
                                    <option value="AI Engineering & Automation">AI Engineering &amp; Automation</option>
                                    <option value="High-Impact Technical SEO">High-Impact Technical SEO</option>
                                    <option value="Cloud Architecture & DevOps">Cloud Architecture &amp; DevOps</option>
                                    <option value="Bespoke UI/UX Design System">Bespoke UI/UX Design System</option>
                                    <option value="Mobile Application">Mobile Application</option>
                                    <option value="General Architecture Consultation">General Architecture Consultation</option>
                                </select>
                            </div>
                        </div>

                        <!-- Budget Range -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Target Investment Tier</label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">
                                @foreach(['$2.5k - $5k', '$5k - $15k', '$15k - $30k', '$30k+'] as $tier)
                                <label class="flex items-center justify-center p-3 rounded-xl bg-white/5 border border-white/10 text-xs font-medium text-slate-300 hover:border-cyan-400/50 cursor-pointer has-[:checked]:bg-cyan-500/20 has-[:checked]:border-cyan-400 has-[:checked]:text-white">
                                    <input type="radio" name="budget" value="{{ $tier }}" class="sr-only" {{ $loop->first ? 'checked' : '' }}>
                                    <span>{{ $tier }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label for="subject" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Project Subject / Title</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="New SaaS Platform Redesign &amp; Scalability Sprints" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 transition-colors">
                        </div>

                        <!-- Message Brief -->
                        <div>
                            <label for="message" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Project Brief / Technical Requirements *</label>
                            <textarea id="message" name="message" rows="5" required placeholder="Describe your existing tech stack, target goals, timelines, or performance bottlenecks you are solving..." class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 transition-colors">{{ old('message') }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full py-4 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-brand-500 via-cyan-500 to-accent-600 shadow-glow-cyan hover:shadow-cyan-400/50 hover:scale-[1.01] transition-all flex items-center justify-center space-x-2">
                                <span>Transmit Executive Brief</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                            <p class="text-center text-[11px] text-slate-500 mt-3 font-mono">
                                🔒 Encrypted Transmission &bull; Direct Architect Review Within 24 Hours
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
