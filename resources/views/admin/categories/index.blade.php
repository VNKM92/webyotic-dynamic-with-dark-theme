@extends('layouts.admin')

@section('header')
    Categories Management
@endsection

@section('content')
<div class="space-y-6">

    <!-- Header & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="font-display font-bold text-xl text-white">Taxonomy &amp; Categories</h2>
            <p class="text-xs text-slate-400 mt-1">Organize insights, publications, and service verticals</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-accent-500 hover:from-brand-400 hover:to-accent-400 text-white text-xs font-bold shadow-glow-cyan transition-all transform hover:-translate-y-0.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Add New Category</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="rounded-3xl glass-card border border-white/10 p-6 shadow-card-hover-dark">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300 border-collapse">
                <thead>
                    <tr class="border-b border-white/10 text-slate-400 font-mono text-[11px] uppercase">
                        <th class="pb-3.5">Category Name</th>
                        <th class="pb-3.5">Slug Endpoint</th>
                        <th class="pb-3.5">Created Date</th>
                        <th class="pb-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse ($categories as $category)
                    <tr class="hover:bg-white/[0.02] transition-colors">
                        <td class="py-4 font-bold text-white text-sm">
                            {{ $category->name }}
                        </td>
                        <td class="py-4 font-mono text-cyan-400">
                            /category/{{ $category->slug }}
                        </td>
                        <td class="py-4 text-slate-400 font-mono text-[11px]">
                            {{ $category->created_at ? $category->created_at->format('d M Y') : 'N/A' }}
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="p-2 rounded-xl bg-white/5 hover:bg-white/10 text-cyan-400 hover:text-cyan-300 border border-white/5 transition-all" title="Edit Category">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-xl bg-white/5 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 border border-white/5 transition-all" title="Delete Category">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-10 text-center text-slate-400">
                            No categories created yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
        <div class="mt-6 pt-4 border-t border-white/5">
            {{ $categories->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
