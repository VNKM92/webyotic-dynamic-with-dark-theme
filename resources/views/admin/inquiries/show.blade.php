@extends('layouts.admin')

@section('header')
    Inquiry Detail &bull; {{ $inquiry->name }}
@endsection

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Back Button -->
    <div>
        <a href="{{ route('admin.inquiries.index') }}" class="inline-flex items-center space-x-1.5 text-xs font-mono text-cyan-400 hover:text-cyan-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Back to Inquiries List</span>
        </a>
    </div>

    <!-- Main Card -->
    <div class="rounded-3xl glass-card border border-white/10 p-8 space-y-8 shadow-card-hover-dark">
        
        <!-- Header Info -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-white/10 gap-4">
            <div>
                <span class="text-xs font-mono uppercase text-slate-400">Client Profile</span>
                <h2 class="font-display font-black text-2xl text-white">{{ $inquiry->name }}</h2>
                <div class="flex flex-wrap items-center gap-3 mt-1 text-xs text-slate-300">
                    <a href="mailto:{{ $inquiry->email }}" class="text-cyan-400 hover:underline flex items-center space-x-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ $inquiry->email }}</span>
                    </a>
                    @if(!empty($inquiry->phone))
                    <span>&bull;</span>
                    <a href="tel:{{ $inquiry->phone }}" class="text-emerald-400 hover:underline flex items-center space-x-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>{{ $inquiry->phone }}</span>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Status Form -->
            <form action="{{ route('admin.inquiries.status', $inquiry) }}" method="POST" class="flex items-center space-x-2">
                @csrf
                @method('PATCH')
                <select name="status" class="bg-slate-900 border border-white/10 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-cyan-400">
                    <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New Unread</option>
                    <option value="in_review" {{ $inquiry->status === 'in_review' ? 'selected' : '' }}>Under Review</option>
                    <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="closed" {{ $inquiry->status === 'closed' ? 'selected' : '' }}>Closed / Won</option>
                </select>
                <button type="submit" class="px-4 py-2 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-obsidian text-xs font-bold transition-colors">
                    Update Status
                </button>
            </form>
        </div>

        <!-- Meta Details Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                <div class="text-[10px] font-mono uppercase text-slate-400">Requested Service</div>
                <div class="text-xs font-bold text-white mt-1">{{ $inquiry->service ?? 'Not specified' }}</div>
            </div>
            <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                <div class="text-[10px] font-mono uppercase text-slate-400">Budget Range</div>
                <div class="text-xs font-bold text-emerald-400 mt-1">{{ $inquiry->budget ?? 'Flexible' }}</div>
            </div>
            <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                <div class="text-[10px] font-mono uppercase text-slate-400">Subject</div>
                <div class="text-xs font-bold text-white mt-1 truncate">{{ $inquiry->subject ?? 'Inquiry' }}</div>
            </div>
            <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                <div class="text-[10px] font-mono uppercase text-slate-400">Submitted At</div>
                <div class="text-xs font-bold text-slate-300 mt-1 font-mono">{{ $inquiry->created_at->format('M d, Y h:i A') }}</div>
            </div>
        </div>

        <!-- Project Brief Message -->
        <div class="space-y-3">
            <h4 class="text-xs font-mono uppercase tracking-wider text-slate-400 font-semibold">Message &amp; Scope Requirements</h4>
            <div class="p-6 rounded-2xl bg-obsidian border border-white/10 text-xs sm:text-sm text-slate-200 leading-relaxed whitespace-pre-wrap font-sans">
{{ $inquiry->message }}
            </div>
        </div>

        <!-- Quick Response Action Buttons -->
        <div class="pt-6 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                <a href="mailto:{{ $inquiry->email }}?subject={{ urlencode('Re: ' . ($inquiry->subject ?? 'Your Webyotic Inquiry')) }}" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-accent-600 text-white text-xs font-bold shadow-glow-cyan flex items-center space-x-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Reply via Corporate Email</span>
                </a>

                @if(!empty($inquiry->phone))
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}" target="_blank" class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold flex items-center space-x-1.5">
                    <span>Chat on WhatsApp</span>
                </a>
                @endif
            </div>

            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Permanently delete this inquiry?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2.5 rounded-xl bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 text-xs font-semibold">
                    Delete Inquiry
                </button>
            </form>
        </div>

    </div>

</div>
@endsection
