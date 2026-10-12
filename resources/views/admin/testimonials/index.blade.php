@extends('layouts.admin')

@section('header')
    Client Testimonials Management
@endsection

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-display font-bold text-xl text-white">Client Testimonials &amp; Trust Ratings</h2>
            <p class="text-xs text-slate-400">Manage client reviews, corporate positions, star ratings, and avatars</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-accent-600 text-white text-xs font-bold shadow-glow-cyan hover:opacity-90 transition-all flex items-center space-x-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Add New Testimonial</span>
        </a>
    </div>

    <div class="rounded-3xl glass-card border border-white/10 p-6 shadow-card-hover-dark">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300 border-collapse">
                <thead>
                    <tr class="border-b border-white/10 text-slate-400 font-mono text-[11px] uppercase">
                        <th class="pb-3.5">Client</th>
                        <th class="pb-3.5">Company &amp; Title</th>
                        <th class="pb-3.5">Rating</th>
                        <th class="pb-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($testimonials as $testimonial)
                    <tr class="hover:bg-white/[0.02] transition-colors">
                        <td class="py-4">
                            <div class="flex items-center space-x-3">
                                <img src="{{ $testimonial->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($testimonial->name) }}" alt="{{ $testimonial->name }}" class="w-10 h-10 rounded-full object-cover ring-1 ring-white/10">
                                <div>
                                    <div class="font-bold text-white text-sm">{{ $testimonial->name }}</div>
                                    <div class="text-[11px] text-slate-400 italic line-clamp-1 max-w-sm">&ldquo;{{ $testimonial->content }}&rdquo;</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 font-mono text-cyan-400">
                            {{ $testimonial->position }} &bull; {{ $testimonial->company }}
                        </td>
                        <td class="py-4 font-mono text-amber-400">
                            ★ {{ $testimonial->rating ?? 5 }}.0 / 5.0
                        </td>
                        <td class="py-4 text-right space-x-2">
                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="px-3.5 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 text-cyan-400 text-xs font-semibold">
                                Edit
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Permanently delete this testimonial?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-xl text-slate-500 hover:text-rose-400 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-8 text-center text-slate-500">
                            No testimonials recorded yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
