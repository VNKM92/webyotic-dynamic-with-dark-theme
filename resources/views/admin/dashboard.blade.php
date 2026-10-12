@extends('layouts.admin')

@section('header')
    Executive Telemetry Dashboard
@endsection

@section('content')
<div class="space-y-8">

    <!-- KPI Metric Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Total Inquiries & Leads -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 relative overflow-hidden shadow-card-hover hover:border-cyan-500/40 transition-all">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-mono font-semibold uppercase text-slate-400">Client Inquiries</span>
                <div class="w-10 h-10 rounded-xl bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                </div>
            </div>
            <div class="font-display font-black text-3xl text-white">{{ $stats['inquiries'] ?? 0 }}</div>
            <div class="mt-2 flex items-center justify-between text-xs">
                <span class="text-rose-400 font-mono font-semibold">{{ $stats['inquiries_new'] ?? 0 }} Unreviewed</span>
                <a href="{{ route('admin.inquiries.index') }}" class="text-cyan-400 hover:text-cyan-300 font-semibold">View All &rarr;</a>
            </div>
        </div>

        <!-- Total Visitors -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 relative overflow-hidden shadow-card-hover hover:border-emerald-500/40 transition-all">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-mono font-semibold uppercase text-slate-400">Total Visitors</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
            </div>
            <div class="font-display font-black text-3xl text-white">{{ $stats['visitors'] ?? 0 }}</div>
            <div class="mt-2 text-xs text-slate-400 font-mono">
                <span class="text-emerald-400 font-semibold">+{{ $stats['visitors_today'] ?? 0 }}</span> active today
            </div>
        </div>

        <!-- Case Studies / Projects -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 relative overflow-hidden shadow-card-hover hover:border-purple-500/40 transition-all">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-mono font-semibold uppercase text-slate-400">Deployed Projects</span>
                <div class="w-10 h-10 rounded-xl bg-purple-500/10 text-purple-400 border border-purple-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="font-display font-black text-3xl text-white">{{ $stats['projects'] ?? 0 }}</div>
            <div class="mt-2 flex items-center justify-between text-xs">
                <span class="text-slate-400 font-mono">{{ $stats['services'] ?? 0 }} Solutions Active</span>
                <a href="{{ route('admin.projects.index') }}" class="text-purple-400 hover:text-purple-300 font-semibold">Manage &rarr;</a>
            </div>
        </div>

        <!-- Articles & Testimonials -->
        <div class="rounded-3xl glass-card border border-white/10 p-6 relative overflow-hidden shadow-card-hover hover:border-amber-500/40 transition-all">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-mono font-semibold uppercase text-slate-400">Engineering Articles</span>
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-400 border border-amber-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
            </div>
            <div class="font-display font-black text-3xl text-white">{{ $stats['posts'] ?? 0 }}</div>
            <div class="mt-2 flex items-center justify-between text-xs">
                <span class="text-slate-400 font-mono">{{ $stats['testimonials'] ?? 0 }} Testimonials</span>
                <a href="{{ route('admin.posts.index') }}" class="text-amber-400 hover:text-amber-300 font-semibold">Write Post &rarr;</a>
            </div>
        </div>

    </div>

    <!-- Quick Action Shortcuts Bar -->
    <div class="p-4 rounded-2xl glass-card border border-white/10 flex flex-wrap items-center justify-between gap-4">
        <div class="text-xs font-mono uppercase text-slate-400 font-semibold flex items-center space-x-2">
            <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
            <span>Fast Execution Shortcuts:</span>
        </div>
        <div class="flex flex-wrap gap-2.5">
            <a href="{{ route('admin.projects.create') }}" class="px-3.5 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-semibold text-white transition-colors flex items-center space-x-1.5">
                <svg class="w-3.5 h-3.5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>New Case Study</span>
            </a>
            <a href="{{ route('admin.services.create') }}" class="px-3.5 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-semibold text-white transition-colors flex items-center space-x-1.5">
                <svg class="w-3.5 h-3.5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Add Service</span>
            </a>
            <a href="{{ route('admin.posts.create') }}" class="px-3.5 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-semibold text-white transition-colors flex items-center space-x-1.5">
                <svg class="w-3.5 h-3.5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Publish Article</span>
            </a>
            <a href="{{ route('admin.sliders.index') }}" class="px-3.5 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-semibold text-white transition-colors flex items-center space-x-1.5">
                <svg class="w-3.5 h-3.5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                <span>Hero Sliders</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="px-3.5 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-semibold text-white transition-colors flex items-center space-x-1.5">
                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>Edit Settings</span>
            </a>
        </div>
    </div>

    <!-- Dual Split: Recent Inquiries + Telemetry Log -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Recent Inquiries / Leads (8 cols) -->
        <div class="lg:col-span-8 rounded-3xl glass-card border border-white/10 p-6 space-y-6">
            <div class="flex items-center justify-between pb-4 border-b border-white/10">
                <div>
                    <h3 class="font-display font-bold text-lg text-white">Latest Client Inquiries &amp; Leads</h3>
                    <p class="text-xs text-slate-400">Submissions from contact form and interactive calculator</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-mono font-semibold text-cyan-400 hover:text-cyan-300">
                    View All ({{ $stats['inquiries'] ?? 0 }}) &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300 border-collapse">
                    <thead>
                        <tr class="border-b border-white/10 text-slate-400 font-mono text-[11px] uppercase">
                            <th class="pb-3">Client</th>
                            <th class="pb-3">Service Focus</th>
                            <th class="pb-3">Budget</th>
                            <th class="pb-3">Status</th>
                            <th class="pb-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($recentInquiries as $inquiry)
                        <tr class="hover:bg-white/[0.02]">
                            <td class="py-4">
                                <div class="font-semibold text-white">{{ $inquiry->name }}</div>
                                <div class="text-[11px] text-slate-400">{{ $inquiry->email }}</div>
                            </td>
                            <td class="py-4 font-mono text-cyan-300">
                                {{ $inquiry->service ?? 'General Architecture' }}
                            </td>
                            <td class="py-4 font-mono text-emerald-400">
                                {{ $inquiry->budget ?? 'TBD' }}
                            </td>
                            <td class="py-4">
                                @if($inquiry->status === 'new')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-bold bg-rose-500/20 text-rose-400 border border-rose-500/30">New</span>
                                @elseif($inquiry->status === 'in_review')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-bold bg-amber-500/20 text-amber-400 border border-amber-500/30">In Review</span>
                                @elseif($inquiry->status === 'contacted')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-bold bg-cyan-500/20 text-cyan-400 border border-cyan-500/30">Contacted</span>
                                @else
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">Closed</span>
                                @endif
                            </td>
                            <td class="py-4 text-right">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="px-3 py-1 rounded-lg bg-white/5 hover:bg-white/10 text-cyan-400 text-xs font-semibold">
                                    Review &rarr;
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-500">
                                No client inquiries yet. All incoming quotes and contact inquiries will appear here.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Server Telemetry & System Specs (4 cols) -->
        <div class="lg:col-span-4 space-y-6">
            <div class="rounded-3xl glass-card border border-white/10 p-6 space-y-4">
                <h3 class="font-display font-bold text-lg text-white">System Infrastructure</h3>
                
                <div class="space-y-3 font-mono text-xs">
                    <div class="p-3 rounded-xl bg-white/5 border border-white/5 flex items-center justify-between">
                        <span class="text-slate-400">Framework</span>
                        <span class="text-white font-bold">Laravel {{ $systemInfo['laravel_version'] }}</span>
                    </div>
                    <div class="p-3 rounded-xl bg-white/5 border border-white/5 flex items-center justify-between">
                        <span class="text-slate-400">PHP Runtime</span>
                        <span class="text-white font-bold">v{{ $systemInfo['php_version'] }}</span>
                    </div>
                    <div class="p-3 rounded-xl bg-white/5 border border-white/5 flex items-center justify-between">
                        <span class="text-slate-400">Environment</span>
                        <span class="text-emerald-400 font-bold uppercase">{{ $systemInfo['environment'] }}</span>
                    </div>
                    <div class="p-3 rounded-xl bg-white/5 border border-white/5 flex items-center justify-between">
                        <span class="text-slate-400">Database Driver</span>
                        <span class="text-cyan-300 font-bold uppercase">{{ $systemInfo['db_driver'] }}</span>
                    </div>
                    <div class="p-3 rounded-xl bg-white/5 border border-white/5 flex items-center justify-between">
                        <span class="text-slate-400">Cache Engine</span>
                        <span class="text-purple-300 font-bold uppercase">{{ $systemInfo['cache_driver'] }}</span>
                    </div>
                </div>
            </div>

            <!-- Recent Visitors Log -->
            <div class="rounded-3xl glass-card border border-white/10 p-6 space-y-4">
                <h3 class="font-display font-bold text-base text-white">Live Visitor Telemetry</h3>
                <div class="space-y-2 text-xs">
                    @forelse($recentVisitors as $visitor)
                    <div class="p-2.5 rounded-xl bg-white/[0.02] border border-white/5 flex items-center justify-between text-slate-300 font-mono">
                        <span class="truncate max-w-[140px] text-cyan-300">{{ $visitor->ip_address ?? '127.0.0.1' }}</span>
                        <span class="text-[11px] text-slate-500">{{ $visitor->visited_at ? $visitor->visited_at->diffForHumans() : 'Just now' }}</span>
                    </div>
                    @empty
                    <p class="text-slate-500 text-xs">Telemetry will populate on visits.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
