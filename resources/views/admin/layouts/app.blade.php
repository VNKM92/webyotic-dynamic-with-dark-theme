<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex">

    {{-- Sidebar --}}
    <aside class="w-64 h-screen bg-gray-900 text-white fixed">
        <div class="p-4 text-xl font-bold border-b border-gray-700">
            Admin Panel
        </div>

        <nav class="mt-4">
            <a href="{{ route('admin.dashboard') }}"
                class="block py-2.5 px-4 hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="block py-2.5 px-4 hover:bg-gray-800 {{ request()->routeIs('admin.users.*') ? 'bg-gray-800' : '' }}">
                👥 Users
            </a>

            <a href="{{ route('admin.posts.index') }}"
               class="block py-2.5 px-4 hover:bg-gray-800 {{ request()->routeIs('admin.posts.*') ? 'bg-gray-800' : '' }}">
                📝 Posts
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="block py-2.5 px-4 hover:bg-gray-800 {{ request()->routeIs('admin.categories.*') ? 'bg-gray-800' : '' }}">
                🗂️ Categories
            </a>

            <a href="{{ route('admin.settings.index') }}"
               class="block py-2.5 px-4 hover:bg-gray-800 {{ request()->routeIs('admin.settings.*') ? 'bg-gray-800' : '' }}">
                ⚙️ Settings
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left py-2.5 px-4 hover:bg-red-600 mt-6 border-t border-gray-800">
                    🚪 Logout
                </button>
            </form>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="ml-64 w-full p-6">

        {{-- Top Bar --}}
        <header class="bg-white shadow p-4 flex justify-between items-center rounded">
            <h1 class="text-xl font-bold capitalize">
                {{ str_replace('admin.', '', Route::currentRouteName()) }}
            </h1>

            <div class="flex items-center space-x-3">
                <span>{{ auth()->user()->name }}</span>
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="w-10 h-10 rounded-full">
            </div>
        </header>

        {{-- Page Content --}}
        <section class="mt-6">
            @yield('content')
        </section>

    </main>
</div>

</body>
</html>
