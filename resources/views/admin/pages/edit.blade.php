@extends('layouts.admin')

@section('header')
    Edit Page Template
@endsection

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.pages.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Back to All Pages</span>
        </a>
    </div>

    <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" id="page-form" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Core Page Details -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 sm:p-8 space-y-6">
            <div class="border-b border-white/10 pb-4">
                <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                    <span>Page Architecture &amp; Template</span>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Page Title <span class="text-rose-400">*</span></label>
                    <input type="text" name="title" value="{{ $page->title }}" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all" required>
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Slug (URL Endpoint)</label>
                    <input type="text" name="slug" value="{{ $page->slug }}" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Associated Template</label>
                    <select name="template" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                        <option value="default" {{ $page->template == 'default' ? 'selected' : '' }}>Default Page Layout</option>
                        <option value="home" {{ $page->template == 'home' ? 'selected' : '' }}>Home Page</option>
                        <option value="about" {{ $page->template == 'about' ? 'selected' : '' }}>About Us</option>
                        <option value="contact" {{ $page->template == 'contact' ? 'selected' : '' }}>Contact Us</option>
                        <option value="services" {{ $page->template == 'services' ? 'selected' : '' }}>Services</option>
                        <option value="gallery" {{ $page->template == 'gallery' ? 'selected' : '' }}>Gallery &amp; Case Studies</option>
                        <option value="testimonials" {{ $page->template == 'testimonials' ? 'selected' : '' }}>Testimonials</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Page Body / Custom Content</label>
                    <div id="editor-container" class="rounded-xl overflow-hidden border border-slate-700">{!! $page->content !!}</div>
                    <input type="hidden" name="content" id="content-input" value="{{ $page->content }}">
                </div>
            </div>
        </div>

        <!-- SEO Metadata Card -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 sm:p-8 space-y-6">
            <div class="border-b border-white/10 pb-4">
                <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>Search Engine Optimization (SEO)</span>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Focus Target Keyword</label>
                    <input type="text" name="focus_keyword" value="{{ $page->focus_keyword }}" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Meta Title</label>
                    <input type="text" name="seo_title" value="{{ $page->seo_title }}" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Meta Description</label>
                    <textarea name="seo_description" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">{{ $page->seo_description }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">SEO Keywords (Comma Separated)</label>
                    <input type="text" name="seo_keywords" value="{{ $page->seo_keywords }}" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>
            </div>
        </div>

        <!-- Submit Bar -->
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.pages.index') }}" class="px-6 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-semibold border border-white/10 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-8 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-accent-500 hover:from-brand-400 hover:to-accent-400 text-white text-xs font-bold shadow-glow-cyan transition-all transform hover:-translate-y-0.5">
                Update Page
            </button>
        </div>
    </form>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });
        var form = document.getElementById('page-form');
        form.onsubmit = function() {
            var content = document.querySelector('input[name=content]');
            content.value = quill.root.innerHTML;
        };
    });
</script>
@endpush
@endsection
