<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title', 'EduTrack')</title>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'ui-sans-serif', 'system-ui']
                },
                colors: {
                    brand: {
                        50: '#eef2ff',
                        100: '#e0e7ff',
                        500: '#6366f1',
                        600: '#4f46e5',
                        700: '#4338ca',
                        900: '#312e81'
                    }
                }
            }
        }
    }
</script>

<style>

    * {
        scrollbar-width: thin;
        scrollbar-color: #cbd5e1 transparent;
    }

    body {
        font-family: Inter, ui-sans-serif, system-ui, sans-serif;
    }

    .glass {
        background: rgba(255, 255, 255, 0.78);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
    }

    .sidebar-link {
        transition: all .2s ease;
    }

    .sidebar-link:hover {
        transform: translateX(3px);
    }

    .fade-in {
        animation: fadeIn .45s ease-out;
    }

    @keyframes fadeIn {

        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }

</style>

@stack('styles')
```

</head>

<body class="bg-[#f7f8fc] text-slate-900">

<div class="min-h-screen flex">

```
<!-- SIDEBAR -->
<aside class="hidden lg:flex w-[260px] fixed inset-y-0 left-0 bg-white border-r border-slate-200 flex-col z-40">

    <!-- Logo -->
    <div class="h-20 px-6 flex items-center border-b border-slate-100">

        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center shadow-lg shadow-indigo-200">

                <i data-lucide="graduation-cap"
                   class="w-5 h-5 text-white"></i>

            </div>

            <div>

                <h1 class="font-bold text-lg tracking-tight">
                    EduTrack
                </h1>

                <p class="text-[10px] text-slate-400 uppercase tracking-widest">
                    Student System
                </p>

            </div>

        </div>

    </div>


    <!-- Navigation -->
    <div class="flex-1 px-4 py-6 overflow-y-auto">

        <p class="px-3 mb-3 text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
            Main Menu
        </p>

        <nav class="space-y-1">

            <!-- Dashboard -->
            <a href="{{ url('/') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl
               {{ request()->is('/')
                    ? 'bg-indigo-50 text-indigo-600 font-semibold'
                    : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">

                <i data-lucide="layout-dashboard"
                   class="w-[18px] h-[18px]"></i>

                <span class="text-sm">
                    Dashboard
                </span>

            </a>


            <!-- Students -->
            <a href="{{ route('students.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl
               {{ request()->is('students*')
                    ? 'bg-indigo-50 text-indigo-600 font-semibold'
                    : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">

                <i data-lucide="users"
                   class="w-[18px] h-[18px]"></i>

                <span class="text-sm">
                    Students
                </span>

            </a>


            <!-- Courses -->
            <a href="{{ route('courses.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl
               {{ request()->is('courses*')
                    ? 'bg-indigo-50 text-indigo-600 font-semibold'
                    : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">

                <i data-lucide="book-open"
                   class="w-[18px] h-[18px]"></i>

                <span class="text-sm">
                    Courses
                </span>

            </a>

        </nav>


        <!-- MANAGEMENT -->
        <p class="px-3 mt-8 mb-3 text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
            Management
        </p>

        <nav class="space-y-1">

            <!-- Settings -->
            <a href="{{ route('settings.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl
               {{ request()->is('settings*')
                    ? 'bg-indigo-50 text-indigo-600 font-semibold'
                    : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">

                <i data-lucide="settings"
                   class="w-[18px] h-[18px]"></i>

                <span class="text-sm">
                    Settings
                </span>

            </a>

        </nav>

    </div>


    <!-- Help Card -->
    <div class="px-4 pb-4">

        <div class="rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-600 p-4 text-white">

            <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center mb-3">

                <i data-lucide="life-buoy"
                   class="w-5 h-5"></i>

            </div>

            <h3 class="font-semibold text-sm">
                Need help?
            </h3>

            <p class="text-xs text-indigo-100 mt-1 leading-relaxed">
                Get support with EduTrack.
            </p>

            <button class="mt-3 text-xs font-semibold bg-white text-indigo-600 px-3 py-2 rounded-lg">
                Contact Support
            </button>

        </div>

    </div>


    <!-- Profile -->
    <div class="border-t border-slate-100 p-4">

        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-400 to-violet-500 text-white flex items-center justify-center font-bold text-sm">
                AD
            </div>

            <div class="flex-1 min-w-0">

                <p class="text-sm font-semibold truncate">
                    Administrator
                </p>

                <p class="text-xs text-slate-400 truncate">
                    admin@edutrack.com
                </p>

            </div>

            <button class="text-slate-400 hover:text-slate-700">

                <i data-lucide="more-horizontal"
                   class="w-5 h-5"></i>

            </button>

        </div>

    </div>

</aside>


<!-- MAIN AREA -->
<div class="flex-1 lg:ml-[260px]">

    <!-- TOPBAR -->
    <header class="h-20 bg-white/80 backdrop-blur-xl border-b border-slate-200 sticky top-0 z-30">

        <div class="h-full px-5 md:px-8 flex items-center justify-between">

            <div>

                <p class="text-xs text-slate-400 hidden sm:block">
                    Student Information Management
                </p>

                <h2 class="font-bold text-lg">
                    @yield('header', 'Dashboard')
                </h2>

            </div>


            <div class="flex items-center gap-3">

                <!-- Mobile menu -->
                <button class="lg:hidden w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center">

                    <i data-lucide="menu"
                       class="w-5 h-5"></i>

                </button>

            </div>

        </div>

    </header>


    <!-- PAGE CONTENT -->
    <main class="p-5 md:p-8 fade-in">

        @yield('content')

    </main>

</div>
```

</div>

<script>
    lucide.createIcons();
</script>

@stack('scripts')

</body>
</html>
