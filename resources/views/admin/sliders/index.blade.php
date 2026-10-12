@extends('layouts.admin')

@section('header')
    Full-Width SEO Hero Sliders
@endsection

@section('content')
<div class="space-y-6">

    <!-- Header Actions & Meta -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold font-display text-white">Full-Width SEO Marquee Sliders</h2>
            <p class="text-xs text-slate-400 mt-1">Manage, reorder, and dynamically customize the high-converting SEO slides displayed right after the navbar.</p>
        </div>
        <a href="{{ route('admin.sliders.create') }}" class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-accent-500 hover:from-brand-400 hover:to-accent-400 text-white text-xs font-bold shadow-glow-cyan transition-all transform hover:-translate-y-0.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Add New SEO Slide</span>
        </a>
    </div>

    <!-- Sliders List Table -->
    <div class="rounded-3xl glass-card border border-white/10 p-6 shadow-card-hover-dark">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300 border-collapse">
                <thead>
                    <tr class="border-b border-white/10 text-slate-400 font-mono text-[11px] uppercase">
                        <th class="pb-3.5 w-16">Order</th>
                        <th class="pb-3.5 w-24">Preview</th>
                        <th class="pb-3.5">Slide Content &amp; Highlight</th>
                        <th class="pb-3.5">SEO Metrics Highlighted</th>
                        <th class="pb-3.5">Status</th>
                        <th class="pb-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($sliders as $slider)
                    <tr class="hover:bg-white/[0.02] transition-colors">
                        <td class="py-4 font-mono font-bold text-cyan-400 text-sm">
                            #{{ $slider->order }}
                        </td>
                        <td class="py-4">
                            <div class="w-20 h-14 rounded-xl overflow-hidden border border-white/10 bg-slate-900 shadow-sm relative group">
                                <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="py-4 pr-4">
                            @if($slider->badge)
                            <span class="inline-block px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-cyan-500/10 text-cyan-300 border border-cyan-500/20 mb-1">
                                {{ $slider->badge }}
                            </span>
                            @endif
                            <div class="font-bold text-white text-sm leading-snug">
                                {{ $slider->title }}
                            </div>
                            @if($slider->highlight)
                            <div class="text-[11px] text-accent-300 font-mono mt-0.5">
                                Glowing Highlight: "{{ $slider->highlight }}"
                            </div>
                            @endif
                            @if($slider->subtitle)
                            <p class="text-[11px] text-slate-400 mt-1 line-clamp-1 max-w-md">
                                {{ $slider->subtitle }}
                            </p>
                            @endif
                        </td>
                        <td class="py-4">
                            <div class="flex flex-wrap gap-1.5 max-w-xs">
                                @if($slider->seo_stat_val_1)
                                <span class="px-2 py-0.5 rounded-lg text-[10px] font-mono bg-emerald-500/10 text-emerald-300 border border-emerald-500/20 font-bold">
                                    {{ $slider->seo_stat_val_1 }} <span class="text-slate-400 font-normal">({{ $slider->seo_stat_label_1 }})</span>
                                </span>
                                @endif
                                @if($slider->seo_stat_val_2)
                                <span class="px-2 py-0.5 rounded-lg text-[10px] font-mono bg-cyan-500/10 text-cyan-300 border border-cyan-500/20 font-bold">
                                    {{ $slider->seo_stat_val_2 }} <span class="text-slate-400 font-normal">({{ $slider->seo_stat_label_2 }})</span>
                                </span>
                                @endif
                                @if($slider->seo_stat_val_3)
                                <span class="px-2 py-0.5 rounded-lg text-[10px] font-mono bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 font-bold">
                                    {{ $slider->seo_stat_val_3 }} <span class="text-slate-400 font-normal">({{ $slider->seo_stat_label_3 }})</span>
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="py-4">
                            @if($slider->is_active)
                            <span class="inline-flex items-center space-x-1 px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-emerald-500/15 text-emerald-300 border border-emerald-500/30">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>Active</span>
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-slate-500/20 text-slate-400 border border-slate-500/20">
                                Inactive
                            </span>
                            @endif
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('admin.sliders.edit', $slider) }}" class="p-2 rounded-xl bg-white/5 hover:bg-white/10 text-cyan-400 hover:text-cyan-300 border border-white/5 transition-all" title="Edit Slide">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this slide?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-xl bg-white/5 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 border border-white/5 transition-all" title="Delete Slide">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">
                            <div class="max-w-xs mx-auto space-y-3">
                                <div class="w-12 h-12 mx-auto rounded-2xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div class="font-bold text-white text-sm">No SEO Sliders Found</div>
                                <p class="text-xs text-slate-400">Get started by creating your first dynamic full-width marquee slide.</p>
                                <a href="{{ route('admin.sliders.create') }}" class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-cyan-500 text-obsidian font-bold text-xs shadow-glow-cyan">
                                    <span>Create Slide</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($sliders->hasPages())
        <div class="mt-6 pt-4 border-t border-white/5">
            {{ $sliders->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
