@extends('layouts.admin')

@section('header')
    Create Case Study / Project
@endsection

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Back to All Projects</span>
        </a>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST" id="project-form" class="space-y-6">
        @csrf

        <!-- Core Project Info -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 sm:p-8 space-y-6">
            <div class="border-b border-white/10 pb-4">
                <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                    <span>Project Architecture</span>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Project Title <span class="text-rose-400">*</span></label>
                    <input type="text" name="title" placeholder="e.g. Fintech Ultra-Low Latency Platform" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all" required>
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Slug (URL Endpoint)</label>
                    <input type="text" name="slug" placeholder="e.g. fintech-platform (or leave empty)" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Category Vertical</label>
                    <input type="text" name="category" placeholder="e.g. Web App, AI Automation, SaaS" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Featured Image URL</label>
                    <input type="text" name="image" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Live Production Link</label>
                    <input type="url" name="link" placeholder="https://..." class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Technology Stack (Comma Separated)</label>
                    <input type="text" name="tags" placeholder="Laravel, Next.js, Redis, Tailwind" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Project Case Study / Overview</label>
                    <div id="editor-container" class="rounded-xl overflow-hidden border border-slate-700"></div>
                    <input type="hidden" name="description" id="description-input">
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
                    <input type="text" name="focus_keyword" placeholder="e.g. fintech platform development" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Meta Title</label>
                    <input type="text" name="seo_title" placeholder="Meta title for Google search..." class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Meta Description</label>
                    <textarea name="seo_description" rows="3" placeholder="Meta description for search snippets..." class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">SEO Keywords (Comma Separated)</label>
                    <input type="text" name="seo_keywords" placeholder="fintech, high frequency, cloud architecture" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>
            </div>
        </div>

        <!-- Submit Bar -->
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-semibold border border-white/10 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-8 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-accent-500 hover:from-brand-400 hover:to-accent-400 text-white text-xs font-bold shadow-glow-cyan transition-all transform hover:-translate-y-0.5">
                Save Project
            </button>
        </div>
    </form>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Detail the project case study, problems solved, and outcomes...'
        });
        var form = document.getElementById('project-form');
        form.onsubmit = function() {
            var desc = document.getElementById('description-input');
            desc.value = quill.root.innerHTML;
        };
    });
</script>
@endpush
@endsection
