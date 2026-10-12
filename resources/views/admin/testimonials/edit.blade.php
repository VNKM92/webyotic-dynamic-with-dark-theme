@extends('layouts.admin')

@section('header')
    Edit Client Testimonial
@endsection

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Back to Testimonials</span>
        </a>
    </div>

    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="rounded-3xl glass-card border border-white/10 p-6 sm:p-8 space-y-6">
            <div class="border-b border-white/10 pb-4">
                <h3 class="text-lg font-bold text-white flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                    <span>Edit Testimonial &amp; Review</span>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Client Full Name <span class="text-rose-400">*</span></label>
                    <input type="text" name="name" value="{{ $testimonial->name }}" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all" required>
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Corporate Position / Title</label>
                    <input type="text" name="position" value="{{ $testimonial->position }}" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Company / Enterprise Name</label>
                    <input type="text" name="company" value="{{ $testimonial->company }}" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Avatar / Photo URL</label>
                    <input type="text" name="image" value="{{ $testimonial->image }}" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Rating (1 to 5 Stars)</label>
                    <select name="rating" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all">
                        <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>★★★★★ (5 Stars - Exceptional)</option>
                        <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>★★★★☆ (4 Stars - Great)</option>
                        <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>★★★☆☆ (3 Stars - Good)</option>
                        <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>★★☆☆☆ (2 Stars - Fair)</option>
                        <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>★☆☆☆☆ (1 Star - Poor)</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-2">Testimonial Content <span class="text-rose-400">*</span></label>
                    <textarea name="content" rows="4" class="w-full px-4 py-3 rounded-2xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-cyan-400 focus:ring-2 focus:ring-cyan-500/20 outline-none transition-all" required>{{ $testimonial->content }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-white/10">
                <a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-semibold border border-white/10 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-7 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-accent-500 hover:from-brand-400 hover:to-accent-400 text-white text-xs font-bold shadow-glow-cyan transition-all transform hover:-translate-y-0.5">
                    Update Testimonial
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
