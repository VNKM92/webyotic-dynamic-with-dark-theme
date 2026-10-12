@extends('layouts.admin')

@section('header')
    Case Studies &amp; Projects Showcase
@endsection

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-display font-bold text-xl text-white">Case Studies Catalog</h2>
            <p class="text-xs text-slate-400">Manage client projects, category tags, technologies, and live demo links</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-accent-600 text-white text-xs font-bold shadow-glow-cyan hover:opacity-90 transition-all flex items-center space-x-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Add New Case Study</span>
        </a>
    </div>

    <div class="rounded-3xl glass-card border border-white/10 p-6 shadow-card-hover-dark">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300 border-collapse">
                <thead>
                    <tr class="border-b border-white/10 text-slate-400 font-mono text-[11px] uppercase">
                        <th class="pb-3.5">Project Title</th>
                        <th class="pb-3.5">Category</th>
                        <th class="pb-3.5">Live Link</th>
                        <th class="pb-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($projects as $project)
                    <tr class="hover:bg-white/[0.02] transition-colors">
                        <td class="py-4">
                            <div class="flex items-center space-x-3">
                                @if(!empty($project->image))
                                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-10 h-10 rounded-xl object-cover ring-1 ring-white/10">
                                @endif
                                <div>
                                    <div class="font-bold text-white text-sm">{{ $project->title }}</div>
                                    <div class="text-[11px] text-slate-400 truncate max-w-sm">{{ $project->description }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 font-mono text-cyan-400">
                            <span class="px-2.5 py-1 rounded-lg bg-cyan-950/40 border border-cyan-800/40 text-[11px]">
                                {{ $project->category ?? 'Platform' }}
                            </span>
                        </td>
                        <td class="py-4 font-mono text-slate-400">
                            @if(!empty($project->link) && $project->link !== '#')
                            <a href="{{ $project->link }}" target="_blank" class="text-cyan-400 hover:underline truncate max-w-xs block">
                                {{ $project->link }}
                            </a>
                            @else
                            <span class="text-slate-600">No live URL</span>
                            @endif
                        </td>
                        <td class="py-4 text-right space-x-2">
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="px-3.5 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 text-cyan-400 text-xs font-semibold">
                                Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Permanently delete this project?');">
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
                            No projects recorded yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
