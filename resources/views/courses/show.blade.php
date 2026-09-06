@extends('layouts.app')

@section('title', $course['name'] . ' - EduTrack')
@section('page-title', 'Program Details')

@section('content')

<div class="mx-auto max-w-6xl space-y-6">

    <!-- Back -->

    <a href="{{ route('courses.index') }}"
       class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-indigo-600">

        <i data-lucide="arrow-left" class="h-4 w-4"></i>

        Back to Courses

    </a>


    <!-- Program Hero -->

    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-600 via-indigo-600 to-violet-600 p-7 text-white shadow-xl shadow-indigo-100 md:p-9">

        <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-white/10"></div>

        <div class="relative">

            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">

                <div class="flex items-center gap-5">

                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-white/15 backdrop-blur">

                        <i data-lucide="{{ $course['icon'] }}" class="h-8 w-8"></i>

                    </div>

                    <div>

                        <span class="text-xs font-semibold uppercase tracking-widest text-indigo-200">
                            {{ $course['code'] }}
                        </span>

                        <h1 class="mt-1 text-2xl font-bold md:text-3xl">
                            {{ $course['name'] }}
                        </h1>

                        <p class="mt-2 text-sm text-indigo-100">
                            {{ $course['department'] }}
                        </p>

                    </div>

                </div>

                <div class="rounded-2xl border border-white/20 bg-white/10 px-5 py-4 backdrop-blur">

                    <p class="text-[10px] font-semibold uppercase tracking-wider text-indigo-200">
                        Program Duration
                    </p>

                    <p class="mt-1 text-lg font-bold">
                        {{ $course['duration'] }}
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- Program Description -->

    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-start gap-4">

            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">

                <i data-lucide="info" class="h-5 w-5"></i>

            </div>

            <div>

                <h2 class="font-bold text-slate-900">
                    About the Program
                </h2>

                <p class="mt-2 max-w-4xl text-sm leading-7 text-slate-500">
                    {{ $course['description'] }}
                </p>

            </div>

        </div>

    </section>


    <!-- Curriculum -->

    <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-6 py-5">

            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

                <div>

                    <h2 class="font-bold text-slate-900">
                        Core Subjects
                    </h2>

                    <p class="mt-1 text-xs text-slate-400">
                        Subjects included in this academic program
                    </p>

                </div>

                <div class="rounded-lg bg-indigo-50 px-3 py-2 text-xs font-bold text-indigo-600">
                    {{ count($course['subjects']) }} Subjects
                </div>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-3 p-6 md:grid-cols-2">

            @foreach($course['subjects'] as $index => $subject)

                <div class="group flex items-center gap-4 rounded-xl border border-slate-100 p-4 transition hover:border-indigo-200 hover:bg-indigo-50/40">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-500 transition group-hover:bg-indigo-100 group-hover:text-indigo-600">

                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                    </div>

                    <div class="flex-1">

                        <p class="text-sm font-semibold text-slate-700">
                            {{ $subject }}
                        </p>

                        <p class="mt-1 text-[11px] text-slate-400">
                            Core subject
                        </p>

                    </div>

                    <i data-lucide="chevron-right"
                       class="h-4 w-4 text-slate-300 transition group-hover:text-indigo-500">
                    </i>

                </div>

            @endforeach

        </div>

    </section>


    <!-- Program Summary -->

    <section class="grid grid-cols-1 gap-4 md:grid-cols-3">

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                    <i data-lucide="layers" class="h-5 w-5"></i>
                </div>

                <div>

                    <p class="text-xs text-slate-400">
                        Program Code
                    </p>

                    <p class="font-bold text-slate-900">
                        {{ $course['code'] }}
                    </p>

                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                    <i data-lucide="building-2" class="h-5 w-5"></i>
                </div>

                <div>

                    <p class="text-xs text-slate-400">
                        Department
                    </p>

                    <p class="font-bold text-slate-900">
                        {{ $course['department'] }}
                    </p>

                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <i data-lucide="book-check" class="h-5 w-5"></i>
                </div>

                <div>

                    <p class="text-xs text-slate-400">
                        Core Subjects
                    </p>

                    <p class="font-bold text-slate-900">
                        {{ count($course['subjects']) }}
                    </p>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection