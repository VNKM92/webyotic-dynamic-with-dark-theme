@extends('layouts.admin')

@section('header')
    Client Inquiries &amp; Pipeline Leads
@endsection

@section('content')
<div class="space-y-6">

    <!-- Header & Status Filter Pills -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.inquiries.index') }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ empty($status) ? 'bg-cyan-500 text-obsidian shadow-glow-cyan' : 'bg-white/5 text-slate-300 hover:bg-white/10 border border-white/10' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'new' ? 'bg-rose-500 text-white' : 'bg-white/5 text-slate-300 hover:bg-white/10 border border-white/10' }}">
                New Unread ({{ $counts['new'] }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'in_review']) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'in_review' ? 'bg-amber-500 text-obsidian' : 'bg-white/5 text-slate-300 hover:bg-white/10 border border-white/10' }}">
                In Review ({{ $counts['in_review'] }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'contacted']) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'contacted' ? 'bg-cyan-500 text-obsidian' : 'bg-white/5 text-slate-300 hover:bg-white/10 border border-white/10' }}">
                Contacted ({{ $counts['contacted'] }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'closed']) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'closed' ? 'bg-emerald-500 text-obsidian' : 'bg-white/5 text-slate-300 hover:bg-white/10 border border-white/10' }}">
                Closed ({{ $counts['closed'] }})
            </a>
        </div>
    </div>

    <!-- Inquiries Table Card -->
    <div class="rounded-3xl glass-card border border-white/10 p-6 shadow-card-hover-dark">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300 border-collapse">
                <thead>
                    <tr class="border-b border-white/10 text-slate-400 font-mono text-[11px] uppercase">
                        <th class="pb-3.5">Client Identity</th>
                        <th class="pb-3.5">Solution Scope</th>
                        <th class="pb-3.5">Budget Tier</th>
                        <th class="pb-3.5">Status</th>
                        <th class="pb-3.5">Received Date</th>
                        <th class="pb-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($inquiries as $inquiry)
                    <tr class="hover:bg-white/[0.02] transition-colors">
                        <td class="py-4">
                            <div class="font-bold text-white text-sm">{{ $inquiry->name }}</div>
                            <div class="text-[11px] text-slate-400">{{ $inquiry->email }}</div>
                            @if(!empty($inquiry->phone))
                            <div class="text-[11px] text-cyan-400 font-mono">{{ $inquiry->phone }}</div>
                            @endif
                        </td>
                        <td class="py-4 font-mono text-cyan-300">
                            {{ $inquiry->service ?? 'Custom Solution' }}
                        </td>
                        <td class="py-4 font-mono text-emerald-400 font-semibold">
                            {{ $inquiry->budget ?? 'Flexible / TBD' }}
                        </td>
                        <td class="py-4">
                            @if($inquiry->status === 'new')
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-rose-500/20 text-rose-400 border border-rose-500/30">New Unread</span>
                            @elseif($inquiry->status === 'in_review')
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-amber-500/20 text-amber-400 border border-amber-500/30">Under Review</span>
                            @elseif($inquiry->status === 'contacted')
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-cyan-500/20 text-cyan-400 border border-cyan-500/30">Contacted</span>
                            @else
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">Closed</span>
                            @endif
                        </td>
                        <td class="py-4 font-mono text-slate-400 text-[11px]">
                            {{ $inquiry->created_at->format('M d, Y - h:i A') }}
                        </td>
                        <td class="py-4 text-right space-x-2">
                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="px-3.5 py-1.5 rounded-xl bg-cyan-500/10 hover:bg-cyan-500/20 text-cyan-400 border border-cyan-500/30 font-semibold transition-colors">
                                Review Brief
                            </a>
                            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="inline-block" onsubmit="return confirm('Permanently remove this inquiry?')">
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
                        <td colspan="6" class="py-12 text-center text-slate-500">
                            No inquiries match the current filter.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $inquiries->links() }}
        </div>
    </div>

</div>
@endsection
