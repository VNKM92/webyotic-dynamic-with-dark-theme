@extends('layouts.admin')

@section('header')
    Create SEO Hero Slide
@endsection

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Top Navigation Link -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.sliders.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Back to All Sliders</span>
        </a>
    </div>

    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Main Content Card -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 sm:p-8 space-y-6">
            <div class="border-b border-white/10 pb-4">
                <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                    <span>Slide Copy &amp; SEO Positioning</span>
                </h3>
                <p class="text-xs text-slate-400 mt-1">Configure the core messaging and high-impact SEO statements that will display on this slide.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Badge -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Pill Badge / Tag</label>
                    <input type="text" name="badge" value="{{ old('badge', '⚡ NEXT-GEN SEARCH INTELLIGENCE') }}" placeholder="e.g. ⚡ AI-POWERED SEARCH DOMINANCE" class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
                </div>

                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Slide Headline <span class="text-rose-400">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Next-Gen Semantic SEO & #1 SERP Domination" class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
                </div>

                <!-- Highlight Word/Phrase -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Glowing Accent Highlight Phrase</label>
                    <input type="text" name="highlight" value="{{ old('highlight') }}" placeholder="e.g. #1 SERP Domination" class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
                    <p class="text-[11px] text-slate-400 mt-1">This substring inside the headline will be rendered with an animated neon gradient.</p>
                </div>

                <!-- Subtitle -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Subtitle / Marketing Description</label>
                    <textarea name="subtitle" rows="3" placeholder="Explain the technical SEO capability and business value..." class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">{{ old('subtitle') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Visual Media & Image Card -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 sm:p-8 space-y-6" x-data="{ previewUrl: '' }">
            <div class="border-b border-white/10 pb-4">
                <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-accent-400"></span>
                    <span>Slide Visual / Banner Graphic</span>
                </h3>
                <p class="text-xs text-slate-400 mt-1">Upload a high-resolution image file or provide an external image URL / CDN link.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                <!-- File Upload -->
                <div class="space-y-3">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider">Option A: Upload Image File</label>
                    <div class="relative border-2 border-dashed border-white/10 hover:border-cyan-500/50 rounded-2xl p-6 text-center transition-all bg-white/[0.02]">
                        <svg class="w-10 h-10 text-cyan-400/60 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <div class="text-xs text-slate-300 font-semibold">Choose a high-res image</div>
                        <div class="text-[10px] text-slate-500 mt-1">PNG, JPG, WEBP, or SVG (Max 5MB)</div>
                        <input type="file" name="image_file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full" @change="previewUrl = URL.createObjectURL($event.target.files[0])">
                    </div>
                </div>

                <!-- URL Alternative & Live Preview -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Option B: Image URL (CDN / Web Link)</label>
                        <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white text-sm focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 outline-none transition-all">
                    </div>

                    <div class="rounded-2xl border border-white/10 p-3 bg-slate-900/50">
                        <div class="text-[11px] font-mono text-slate-400 uppercase tracking-wider mb-2">Selected Preview</div>
                        <div class="w-full h-32 rounded-xl bg-slate-950/80 border border-white/5 overflow-hidden flex items-center justify-center">
                            <template x-if="previewUrl">
                                <img :src="previewUrl" alt="Preview" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!previewUrl">
                                <span class="text-xs text-slate-500 font-mono">No image selected yet</span>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic SEO Metrics Card -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 sm:p-8 space-y-6">
            <div class="border-b border-white/10 pb-4">
                <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>Dynamic SEO Proof Metrics</span>
                </h3>
                <p class="text-xs text-slate-400 mt-1">Enter 3 high-converting metrics displayed as animated neon pills on this slide.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Stat 1 -->
                <div class="space-y-3 p-4 rounded-2xl bg-white/[0.02] border border-white/5">
                    <div class="text-xs font-mono text-emerald-400 font-bold uppercase tracking-wider">Metric 1 (Green Pill)</div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Display Value</label>
                        <input type="text" name="seo_stat_val_1" value="{{ old('seo_stat_val_1', '+420%') }}" placeholder="e.g. +420%" class="w-full px-3 py-2 rounded-xl bg-white/5 border border-white/10 text-white text-xs font-mono">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Metric Label</label>
                        <input type="text" name="seo_stat_label_1" value="{{ old('seo_stat_label_1', 'Organic Traffic Surge') }}" placeholder="e.g. Organic Surge" class="w-full px-3 py-2 rounded-xl bg-white/5 border border-white/10 text-white text-xs">
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="space-y-3 p-4 rounded-2xl bg-white/[0.02] border border-white/5">
                    <div class="text-xs font-mono text-cyan-400 font-bold uppercase tracking-wider">Metric 2 (Cyan Pill)</div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Display Value</label>
                        <input type="text" name="seo_stat_val_2" value="{{ old('seo_stat_val_2', '100/100') }}" placeholder="e.g. 100/100" class="w-full px-3 py-2 rounded-xl bg-white/5 border border-white/10 text-white text-xs font-mono">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Metric Label</label>
                        <input type="text" name="seo_stat_label_2" value="{{ old('seo_stat_label_2', 'Core Web Vitals') }}" placeholder="e.g. Core Web Vitals" class="w-full px-3 py-2 rounded-xl bg-white/5 border border-white/10 text-white text-xs">
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="space-y-3 p-4 rounded-2xl bg-white/[0.02] border border-white/5">
                    <div class="text-xs font-mono text-indigo-400 font-bold uppercase tracking-wider">Metric 3 (Purple Pill)</div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Display Value</label>
                        <input type="text" name="seo_stat_val_3" value="{{ old('seo_stat_val_3', '4,850+') }}" placeholder="e.g. 4,850+" class="w-full px-3 py-2 rounded-xl bg-white/5 border border-white/10 text-white text-xs font-mono">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Metric Label</label>
                        <input type="text" name="seo_stat_label_3" value="{{ old('seo_stat_label_3', 'First-Page SERPs') }}" placeholder="e.g. First-Page SERPs" class="w-full px-3 py-2 rounded-xl bg-white/5 border border-white/10 text-white text-xs">
                    </div>
                </div>
            </div>
        </div>

        <!-- Action CTAs & Settings Card -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 sm:p-8 space-y-6">
            <div class="border-b border-white/10 pb-4">
                <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                    <span>Action Buttons &amp; Display Order</span>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Primary Button -->
                <div class="space-y-3">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider">Primary Button</label>
                    <input type="text" name="button_text" value="{{ old('button_text', 'Get Free SEO Audit') }}" placeholder="Button Text (e.g. Get Free SEO Audit)" class="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-xs">
                    <input type="text" name="button_url" value="{{ old('button_url', '/contact') }}" placeholder="Button URL (e.g. /contact)" class="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-xs">
                </div>

                <!-- Secondary Button -->
                <div class="space-y-3">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider">Secondary Button</label>
                    <input type="text" name="secondary_button_text" value="{{ old('secondary_button_text', 'View Case Studies') }}" placeholder="Button Text (e.g. View Case Studies)" class="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-xs">
                    <input type="text" name="secondary_button_url" value="{{ old('secondary_button_url', '/gallery') }}" placeholder="Button URL (e.g. /gallery)" class="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-xs">
                </div>

                <!-- Order -->
                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Display Sequence Order</label>
                    <input type="number" name="order" value="{{ old('order', 1) }}" min="0" class="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-xs font-mono">
                    <p class="text-[11px] text-slate-500 mt-1">Lower numbers appear first (e.g. 1, 2, 3).</p>
                </div>

                <!-- Is Active -->
                <div class="flex items-center space-x-3 pt-6">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5 rounded border-white/20 bg-white/5 text-cyan-500 focus:ring-cyan-400">
                    <label for="is_active" class="text-sm font-semibold text-white cursor-pointer">
                        Enable this Slide on Homepage
                    </label>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.sliders.index') }}" class="px-6 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-semibold border border-white/10 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-8 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-accent-500 hover:from-brand-400 hover:to-accent-400 text-white text-xs font-bold shadow-glow-cyan transition-all transform hover:-translate-y-0.5">
                Save &amp; Publish SEO Slide
            </button>
        </div>
    </form>

</div>
@endsection
