@extends('layouts.app')

@section('title', 'Courses - EduTrack')
@section('page-title', 'Courses')

@section('content')

<div class="space-y-7">

    <!-- Header -->

    <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">

        <div>

            <div class="mb-2 flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-indigo-600">
                <i data-lucide="graduation-cap" class="h-4 w-4"></i>
                Academic Programs
            </div>

            <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                Courses & Programs
            </h1>

            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                Explore the academic programs managed by EduTrack and view the subjects included in each program.
            </p>

        </div>

        <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-sm">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                <i data-lucide="book-open" class="h-4 w-4"></i>
            </div>

            <div>
                <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                    Programs
                </p>

                <p class="text-sm font-bold text-slate-900">
                    {{ count($courses) }} Academic Programs
                </p>
            </div>

        </div>

    </div>


    <!-- Program Cards -->

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

        @foreach($courses as $course)

            <div class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <!-- Card Top -->

                <div class="relative overflow-hidden bg-gradient-to-br from-indigo-600 to-violet-600 p-6 text-white">

                    <div class="absolute -right-8 -top-10 h-32 w-32 rounded-full bg-white/10"></div>

                    <div class="relative flex items-start justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15 backdrop-blur">
                            <i data-lucide="{{ $course['icon'] }}" class="h-6 w-6"></i>
                        </div>

                        <span class="rounded-full bg-white/15 px-3 py-1 text-[11px] font-semibold backdrop-blur">
                            {{ $course['code'] }}
                        </span>

                    </div>

                    <div class="relative mt-6">

                        <h2 class="text-xl font-bold">
                            {{ $course['name'] }}
                        </h2>

                        <p class="mt-2 text-xs text-indigo-100">
                            {{ $course['department'] }}
                        </p>

                    </div>

                </div>


                <!-- Card Content -->

                <div class="p-6">

                    <p class="text-sm leading-6 text-slate-500">
                        {{ $course['description'] }}
                    </p>


                    <!-- Program Information -->

                    <div class="mt-6 grid grid-cols-2 gap-3">

                        <div class="rounded-xl bg-slate-50 p-4">

                            <div class="mb-2 flex items-center gap-2 text-slate-400">

                                <i data-lucide="clock-3" class="h-4 w-4"></i>

                                <span class="text-[10px] font-semibold uppercase tracking-wider">
                                    Duration
                                </span>

                            </div>

                            <p class="text-sm font-bold text-slate-800">
                                {{ $course['duration'] }}
                            </p>

                        </div>


                        <div class="rounded-xl bg-slate-50 p-4">

                            <div class="mb-2 flex items-center gap-2 text-slate-400">

                                <i data-lucide="book-open-check" class="h-4 w-4"></i>

                                <span class="text-[10px] font-semibold uppercase tracking-wider">
                                    Subjects
                                </span>

                            </div>

                            <p class="text-sm font-bold text-slate-800">
                                {{ count($course['subjects']) }} Core Subjects
                            </p>

                        </div>

                    </div>


                    <!-- Preview Subjects -->

                    <div class="mt-6">

                        <div class="mb-3 flex items-center justify-between">

                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                Subject Preview
                            </h3>

                            <span class="text-[11px] text-slate-400">
                                {{ count($course['subjects']) }} subjects
                            </span>

                        </div>


                        <div class="space-y-2">

                            @foreach(array_slice($course['subjects'], 0, 3) as $subject)

                                <div class="flex items-center gap-3 rounded-xl border border-slate-100 px-3 py-2.5">

                                    <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">

                                        <i data-lucide="book" class="h-3.5 w-3.5"></i>

                                    </div>

                                    <span class="truncate text-xs font-medium text-slate-600">
                                        {{ $subject }}
                                    </span>

                                </div>

                            @endforeach

                        </div>

                    </div>


                    <!-- Button -->

                    <a href="{{ route('courses.show', $course['code']) }}"
                       class="mt-6 flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-indigo-600">

                        View Program Details

                        <i data-lucide="arrow-right" class="h-4 w-4"></i>

                    </a>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection