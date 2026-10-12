@extends('layouts.admin')

@section('header')
    Create Engineering Article
@endsection

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Back to All Posts</span>
        </a>
    </div>

    <form action="{{ route('admin.posts.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Core Content Card -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 sm:p-8 space-y-6">
            <div class="border-b border-white/10 pb-4">
                <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                    <span>Article Content</span>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="title" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Article Title <span class="text-rose-400">*</span></label>
                    <input type="text" name="title" id="title" placeholder="e.g. Scaling Next.js Architecture with Edge Caching" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all" required>
                </div>

                <div>
                    <label for="category_id" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Category Vertical</label>
                    <select name="category_id" id="category_id" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                        <option value="">None / General</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="image" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Cover Image URL</label>
                    <input type="text" name="image" id="image" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div class="md:col-span-2">
                    <label for="body" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Article Body Content <span class="text-rose-400">*</span></label>
                    <textarea name="body" id="body" rows="10" placeholder="Write full article body..." class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all font-sans leading-relaxed" required></textarea>
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
                    <label for="focus_keyword" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Focus Target Keyword</label>
                    <input type="text" name="focus_keyword" id="focus_keyword" placeholder="e.g. edge caching laravel" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label for="seo_title" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Meta Title</label>
                    <input type="text" name="seo_title" id="seo_title" placeholder="Meta title for Google SERPs..." class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div class="md:col-span-2">
                    <label for="seo_description" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Meta Description</label>
                    <textarea name="seo_description" id="seo_description" rows="3" placeholder="Meta description for search snippets..." class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all"></textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="seo_keywords" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">SEO Keywords (Comma Separated)</label>
                    <input type="text" name="seo_keywords" id="seo_keywords" placeholder="laravel, nextjs, high performance, caching" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>
            </div>
        </div>

        <!-- Submit Bar -->
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.posts.index') }}" class="px-6 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-semibold border border-white/10 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-8 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-accent-500 hover:from-brand-400 hover:to-accent-400 text-white text-xs font-bold shadow-glow-cyan transition-all transform hover:-translate-y-0.5">
                Publish Article
            </button>
        </div>
    </form>

</div>
@endsection
