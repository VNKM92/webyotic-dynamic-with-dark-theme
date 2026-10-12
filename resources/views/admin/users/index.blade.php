@extends('layouts.admin')

@section('header')
    Administrators &amp; Access Control
@endsection

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="font-display font-bold text-xl text-white">System Users &amp; Administrators</h2>
            <p class="text-xs text-slate-400 mt-1">Manage executive access privileges, operator accounts, and roles.</p>
        </div>
    </div>

    <!-- Table Card -->
    <div class="rounded-3xl glass-card border border-white/10 p-6 shadow-card-hover-dark">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300 border-collapse">
                <thead>
                    <tr class="border-b border-white/10 text-slate-400 font-mono text-[11px] uppercase">
                        <th class="pb-3.5">User Identity</th>
                        <th class="pb-3.5">Email Address</th>
                        <th class="pb-3.5">Privilege Role</th>
                        <th class="pb-3.5">Member Since</th>
                        <th class="pb-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse ($users as $user)
                    <tr class="hover:bg-white/[0.02] transition-colors">
                        <td class="py-4">
                            <div class="flex items-center space-x-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0284c7&color=fff" alt="{{ $user->name }}" class="w-9 h-9 rounded-xl object-cover ring-1 ring-cyan-500/30">
                                <div class="font-bold text-white text-sm">{{ $user->name }}</div>
                            </div>
                        </td>
                        <td class="py-4 font-mono text-cyan-400">
                            {{ $user->email }}
                        </td>
                        <td class="py-4">
                            @if($user->role === 'admin')
                            <span class="inline-flex items-center space-x-1 px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-cyan-500/15 text-cyan-300 border border-cyan-500/30">
                                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                                <span>Super Admin</span>
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-mono font-bold bg-slate-500/20 text-slate-400 border border-slate-500/20">
                                {{ ucfirst($user->role ?? 'User') }}
                            </span>
                            @endif
                        </td>
                        <td class="py-4 text-slate-400 font-mono text-[11px]">
                            {{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}
                        </td>
                        <td class="py-4 text-right">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="p-2 rounded-xl bg-white/5 hover:bg-white/10 text-cyan-400 hover:text-cyan-300 border border-white/5 transition-all" title="Edit User">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                @if(Auth::id() !== $user->id)
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Permanently remove this user?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-xl bg-white/5 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 border border-white/5 transition-all" title="Delete User">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center text-slate-400">
                            No users found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
        <div class="mt-6 pt-4 border-t border-white/5">
            {{ $users->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
