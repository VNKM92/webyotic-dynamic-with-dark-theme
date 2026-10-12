@extends('layouts.admin')

@section('header')
    Global Platform &amp; Homepage Settings
@endsection

@section('content')
@php
    $get = fn($key, $default = '') => $settings->flatten()->where('key', $key)->first()->value ?? $default;
@endphp

<div class="max-w-5xl mx-auto space-y-6">
    <div>
        <h2 class="font-display font-bold text-xl text-white">System, Hero Banner &amp; SEO Configurations</h2>
        <p class="text-xs text-slate-400">Customize your dynamic homepage banner, highlight SEO metrics, change images, and configure global SEO metadata</p>
    </div>

    <div class="rounded-3xl glass-card border border-white/10 p-8 shadow-card-hover-dark">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div x-data="{ activeTab: 'banner' }">
                <!-- Navigation Tabs -->
                <div class="flex border-b border-white/10 mb-8 gap-2 overflow-x-auto">
                    <button type="button" @click="activeTab = 'banner'" :class="activeTab === 'banner' ? 'border-cyan-400 text-cyan-300 font-bold bg-white/5' : 'border-transparent text-slate-400 hover:text-white'" class="py-3 px-5 border-b-2 text-xs font-mono uppercase tracking-wider rounded-t-xl transition-all focus:outline-none flex items-center space-x-2">
                        <span>⚡ Homepage Banner &amp; SEO Hero</span>
                    </button>
                    <button type="button" @click="activeTab = 'general'" :class="activeTab === 'general' ? 'border-cyan-400 text-cyan-300 font-bold bg-white/5' : 'border-transparent text-slate-400 hover:text-white'" class="py-3 px-5 border-b-2 text-xs font-mono uppercase tracking-wider rounded-t-xl transition-all focus:outline-none">
                        General &bull; Identity
                    </button>
                    <button type="button" @click="activeTab = 'seo'" :class="activeTab === 'seo' ? 'border-cyan-400 text-cyan-300 font-bold bg-white/5' : 'border-transparent text-slate-400 hover:text-white'" class="py-3 px-5 border-b-2 text-xs font-mono uppercase tracking-wider rounded-t-xl transition-all focus:outline-none">
                        Global SEO &bull; Metadata
                    </button>
                    <button type="button" @click="activeTab = 'theme'" :class="activeTab === 'theme' ? 'border-cyan-400 text-cyan-300 font-bold bg-white/5' : 'border-transparent text-slate-400 hover:text-white'" class="py-3 px-5 border-b-2 text-xs font-mono uppercase tracking-wider rounded-t-xl transition-all focus:outline-none">
                        Custom Scripts &bull; Telemetry
                    </button>
                </div>

                <!-- Homepage Banner & SEO Hero Tab -->
                <div x-show="activeTab === 'banner'" class="space-y-6">
                    <div class="p-4 rounded-2xl bg-cyan-950/40 border border-cyan-800/40 text-cyan-300 text-xs flex items-center space-x-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>All changes made here update your live homepage hero banner and SEO animations instantaneously!</span>
                    </div>

                    <!-- Hero Badge & Title -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Hero Floating Badge Text</label>
                            <input type="text" name="home_hero_badge" value="{{ $get('home_hero_badge', '⚡ LEADING ENTERPRISE SEO & DIGITAL ENGINEERING LABS') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Gradient Highlighted Words</label>
                            <input type="text" name="home_hero_highlight" value="{{ $get('home_hero_highlight', 'High-Ranking Platforms') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400" placeholder="e.g. High-Ranking Platforms">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Hero Main Headline</label>
                        <input type="text" name="home_hero_title" value="{{ $get('home_hero_title', 'We Engineer High-Ranking Digital Platforms That Dominate & Scale') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Hero Subtitle / Value Proposition</label>
                        <textarea name="home_hero_subtitle" rows="3" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">{{ $get('home_hero_subtitle', 'Founded by Vinay & Shivam, Webyotic merges robust software engineering with programmatic SEO architecture to turn complex web systems into market leaders.') }}</textarea>
                    </div>

                    <!-- Banner Image Management (URL + File Upload) -->
                    <div class="p-6 rounded-2xl bg-white/[0.02] border border-white/10 space-y-4">
                        <h4 class="font-display font-bold text-sm text-white">Banner Visual Showcase Image</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Image URL (Unsplash or CDN link)</label>
                                    <input type="text" name="home_hero_image" value="{{ $get('home_hero_image', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400" placeholder="https://...">
                                </div>

                                <div>
                                    <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Or Upload Image File from Computer</label>
                                    <input type="file" name="home_hero_image_file" accept="image/*" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-2.5 text-xs text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-cyan-500 file:text-obsidian hover:file:bg-cyan-400">
                                    <span class="text-[11px] text-slate-500 mt-1 block">Supports JPG, PNG, WEBP, SVG (Max 5MB)</span>
                                </div>
                            </div>

                            <!-- Preview Box -->
                            <div>
                                <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Current Active Preview</label>
                                <div class="h-44 rounded-2xl overflow-hidden bg-slate-900 border border-white/10 relative group">
                                    @if($get('home_hero_image'))
                                    <img src="{{ $get('home_hero_image') }}" alt="Hero Banner Preview" class="w-full h-full object-cover">
                                    @else
                                    <div class="w-full h-full flex items-center justify-center text-xs text-slate-500">
                                        No image chosen (default illustrated card will be used)
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Metrics Highlight Controls -->
                    <div class="p-6 rounded-2xl bg-white/[0.02] border border-white/10 space-y-4">
                        <h4 class="font-display font-bold text-sm text-white">Dynamic Animated SEO Metric Badges</h4>
                        <p class="text-xs text-slate-400">These 4 metrics are animated in the live hero banner ticker and interactive audit card.</p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">1. Google SEO Audit</label>
                                <input type="text" name="home_seo_score" value="{{ $get('home_seo_score', '100 / 100 Audit') }}" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-xs text-emerald-400 font-bold focus:outline-none focus:border-cyan-400">
                            </div>
                            <div>
                                <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">2. Organic Traffic Surge</label>
                                <input type="text" name="home_seo_traffic" value="{{ $get('home_seo_traffic', '+340% Organic Pipeline') }}" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-xs text-cyan-400 font-bold focus:outline-none focus:border-cyan-400">
                            </div>
                            <div>
                                <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">3. Page 1 Rankings</label>
                                <input type="text" name="home_seo_keywords" value="{{ $get('home_seo_keywords', '1,420+ Ranked #1') }}" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-xs text-purple-400 font-bold focus:outline-none focus:border-cyan-400">
                            </div>
                            <div>
                                <label class="block text-xs font-mono uppercase text-slate-300 mb-1.5">4. Edge Response Speed</label>
                                <input type="text" name="home_seo_latency" value="{{ $get('home_seo_latency', '< 95ms Edge Speed') }}" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-xs text-amber-400 font-bold focus:outline-none focus:border-cyan-400">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- General Tab -->
                <div x-show="activeTab === 'general'" class="space-y-6" style="display: none;">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Company / Platform Name</label>
                            <input type="text" name="site_name" value="{{ $get('site_name', 'Webyotic') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Contact Email</label>
                            <input type="email" name="contact_email" value="{{ $get('contact_email', 'info@webyotic.com') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Primary Phone / WhatsApp</label>
                            <input type="text" name="contact_phone" value="{{ $get('contact_phone', '+91 8968313005') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Footer Copyright Statement</label>
                            <input type="text" name="footer_text" value="{{ $get('footer_text', '© 2026 Webyotic. All rights reserved.') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">
                        </div>
                    </div>
                </div>

                <!-- Global SEO Tab -->
                <div x-show="activeTab === 'seo'" class="space-y-6" style="display: none;">
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Default Global Meta Title</label>
                        <input type="text" name="default_seo_title" value="{{ $get('default_seo_title', 'Webyotic - Enterprise Digital Engineering & Growth Agency') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">
                    </div>
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Default Meta Description</label>
                        <textarea name="default_seo_description" rows="3" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">{{ $get('default_seo_description', 'High-performance web architecture, custom AI automation, and enterprise SEO engineered for fast-scaling companies.') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Default Keywords (Comma Separated)</label>
                        <input type="text" name="default_seo_keywords" value="{{ $get('default_seo_keywords', 'enterprise web development, custom software, nextjs agency, laravel solutions, ai engineering') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-xs sm:text-sm text-white focus:outline-none focus:border-cyan-400">
                    </div>
                </div>

                <!-- Theme & Scripts Tab -->
                <div x-show="activeTab === 'theme'" class="space-y-6" style="display: none;">
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Header Scripts (Google Analytics / GTM / Meta Pixel)</label>
                        <textarea name="custom_js_header" rows="4" placeholder="<script>...</script>" class="w-full bg-obsidian font-mono text-xs border border-white/10 rounded-2xl p-4 text-cyan-300 focus:outline-none focus:border-cyan-400">{{ $get('custom_js_header') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-mono uppercase text-slate-300 mb-2">Footer Scripts (Chat Widgets / Conversion Tracking)</label>
                        <textarea name="custom_js_footer" rows="4" placeholder="<script>...</script>" class="w-full bg-obsidian font-mono text-xs border border-white/10 rounded-2xl p-4 text-cyan-300 focus:outline-none focus:border-cyan-400">{{ $get('custom_js_footer') }}</textarea>
                    </div>
                </div>

                <!-- Save Action Button -->
                <div class="mt-8 pt-6 border-t border-white/10 flex items-center justify-between">
                    <span class="text-xs text-slate-400 flex items-center space-x-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Instant Cache Invalidation enabled</span>
                    </span>
                    <button type="submit" class="px-8 py-3.5 rounded-2xl bg-gradient-to-r from-brand-500 via-cyan-500 to-accent-600 text-white font-bold text-xs uppercase tracking-wider shadow-glow-cyan hover:opacity-90 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Save &amp; Update Live Banner</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
