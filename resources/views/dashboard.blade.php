@extends('layouts.app')

@section('title', 'Dashboard - EduTrack')
@section('page-title', 'Dashboard')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Dashboard Data
    |--------------------------------------------------------------------------
    */

    $totalStudents = \App\Models\Student::count();

    $activeStudents = \App\Models\Student::where('status', 'Active')->count();

    $pendingStudents = \App\Models\Student::where('status', 'Pending')->count();

    $newThisWeek = \App\Models\Student::where(
        'created_at',
        '>=',
        now()->startOfWeek()
    )->count();

    $programs = [
        'BS Computer Engineering' => \App\Models\Student::where(
            'course',
            'BS COMPUTER ENGINEERING'
        )->count(),

        'BS Information Technology' => \App\Models\Student::where(
            'course',
            'BS INFORMATION TECHNOLOGY'
        )->count(),

        'BS Hospitality Management' => \App\Models\Student::where(
            'course',
            'BS HOSPITALITY MANAGEMENT'
        )->count(),

        'BS Office Administration' => \App\Models\Student::where(
            'course',
            'BS OFFICE ADMINISTRATION'
        )->count(),
    ];

    $maxProgramCount = max(max($programs), 1);

    $activePercentage = $totalStudents > 0
        ? round(($activeStudents / $totalStudents) * 100)
        : 0;

    $pendingPercentage = $totalStudents > 0
        ? round(($pendingStudents / $totalStudents) * 100)
        : 0;

    /*
    |--------------------------------------------------------------------------
    | Registration Trend - Last 7 Days
    |--------------------------------------------------------------------------
    */

    $registrationTrend = [];

    for ($i = 6; $i >= 0; $i--) {
        $date = now()->subDays($i);

        $registrationTrend[] = [
            'label' => $date->format('D'),
            'count' => \App\Models\Student::whereDate(
                'created_at',
                $date->toDateString()
            )->count(),
        ];
    }

    $maxDailyRegistrations = max(
        array_column($registrationTrend, 'count')
    );

    $maxDailyRegistrations = max($maxDailyRegistrations, 1);

    /*
    |--------------------------------------------------------------------------
    | Insight
    |--------------------------------------------------------------------------
    */

    $highestProgram = collect($programs)
        ->sortDesc()
        ->first();

    $highestProgramName = collect($programs)
        ->sortDesc()
        ->keys()
        ->first();

@endphp


<div class="space-y-6">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                Welcome back! 👋
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Here's an overview of what's happening in EduTrack.
            </p>

        </div>

        <div class="text-sm text-gray-400">
            {{ now()->format('F d, Y') }}
        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SUMMARY CARDS --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">


        {{-- Total Students --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Total Students
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $totalStudents }}
                    </p>

                    <p class="mt-2 text-xs text-gray-400">
                        Registered records
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl bg-indigo-50
                            flex items-center justify-center">

                    <i data-lucide="users"
                       class="w-5 h-5 text-indigo-600"></i>

                </div>

            </div>

        </div>


        {{-- Active Students --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Active Students
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $activeStudents }}
                    </p>

                    <p class="mt-2 text-xs text-green-600">
                        {{ $activePercentage }}% of total
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl bg-green-50
                            flex items-center justify-center">

                    <i data-lucide="user-check"
                       class="w-5 h-5 text-green-600"></i>

                </div>

            </div>

        </div>


        {{-- Academic Programs --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Academic Programs
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ count($programs) }}
                    </p>

                    <p class="mt-2 text-xs text-gray-400">
                        Programs in catalog
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl bg-purple-50
                            flex items-center justify-center">

                    <i data-lucide="graduation-cap"
                       class="w-5 h-5 text-purple-600"></i>

                </div>

            </div>

        </div>


        {{-- New This Week --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        New This Week
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $newThisWeek }}
                    </p>

                    <p class="mt-2 text-xs text-blue-600">
                        New registrations
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl bg-blue-50
                            flex items-center justify-center">

                    <i data-lucide="trending-up"
                       class="w-5 h-5 text-blue-600"></i>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- CHARTS ROW --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">


        {{-- Registration Trend --}}
        <div class="xl:col-span-2 bg-white rounded-2xl
                    border border-gray-100 shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-base font-semibold text-gray-900">
                        Registration Trend
                    </h2>

                    <p class="mt-1 text-xs text-gray-500">
                        New student registrations over the last 7 days
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-indigo-50
                            flex items-center justify-center">

                    <i data-lucide="chart-line"
                       class="w-5 h-5 text-indigo-600"></i>

                </div>

            </div>


            {{-- Chart --}}
            <div class="mt-8">

                <div class="flex items-end justify-between gap-3 h-48">

                    @foreach($registrationTrend as $day)

                        @php
                            $height = $day['count'] > 0
                                ? max(
                                    round(
                                        ($day['count'] / $maxDailyRegistrations) * 100
                                    ),
                                    8
                                )
                                : 3;
                        @endphp

                        <div class="flex-1 h-full flex flex-col
                                    justify-end items-center gap-2">

                            <span class="text-xs font-medium text-gray-500">
                                {{ $day['count'] }}
                            </span>

                            <div class="w-full max-w-10 bg-indigo-100
                                        rounded-t-lg relative"
                                 style="height: {{ $height }}%;">

                                <div class="absolute inset-0
                                            bg-indigo-500 rounded-t-lg">
                                </div>

                            </div>

                            <span class="text-xs text-gray-400">
                                {{ $day['label'] }}
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>


        {{-- Enrollment Status --}}
        <div class="bg-white rounded-2xl border border-gray-100
                    shadow-sm p-6">

            <div>

                <h2 class="text-base font-semibold text-gray-900">
                    Enrollment Status
                </h2>

                <p class="mt-1 text-xs text-gray-500">
                    Current student distribution
                </p>

            </div>


            {{-- Donut --}}
            <div class="flex justify-center mt-6">

                <div class="relative w-40 h-40 rounded-full"
                     style="
                        background: conic-gradient(
                            #6366f1 {{ $activePercentage }}%,
                            #e5e7eb {{ $activePercentage }}% 100%
                        );
                     ">

                    <div class="absolute inset-5 bg-white
                                rounded-full flex flex-col
                                items-center justify-center">

                        <span class="text-3xl font-bold text-gray-900">
                            {{ $totalStudents }}
                        </span>

                        <span class="text-xs text-gray-400">
                            Students
                        </span>

                    </div>

                </div>

            </div>


            {{-- Legend --}}
            <div class="mt-6 space-y-3">

                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-2">

                        <span class="w-3 h-3 rounded-full bg-indigo-500"></span>

                        <span class="text-sm text-gray-600">
                            Active
                        </span>

                    </div>

                    <span class="text-sm font-semibold text-gray-900">
                        {{ $activeStudents }}
                    </span>

                </div>


                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-2">

                        <span class="w-3 h-3 rounded-full bg-gray-200"></span>

                        <span class="text-sm text-gray-600">
                            Pending
                        </span>

                    </div>

                    <span class="text-sm font-semibold text-gray-900">
                        {{ $pendingStudents }}
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- PROGRAM DISTRIBUTION + SYSTEM STATUS --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">


        {{-- Program Distribution --}}
        <div class="bg-white rounded-2xl border border-gray-100
                    shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-base font-semibold text-gray-900">
                        Program Distribution
                    </h2>

                    <p class="mt-1 text-xs text-gray-500">
                        Student distribution by academic program
                    </p>

                </div>

                <i data-lucide="school"
                   class="w-5 h-5 text-gray-400"></i>

            </div>


            <div class="mt-6 space-y-5">

                @foreach($programs as $program => $count)

                    @php
                        $percentage = $totalStudents > 0
                            ? round(($count / $totalStudents) * 100)
                            : 0;

                        $barWidth = $count > 0
                            ? max(
                                round(($count / $maxProgramCount) * 100),
                                6
                            )
                            : 0;
                    @endphp

                    <div>

                        <div class="flex items-center justify-between mb-2">

                            <span class="text-sm font-medium text-gray-700">
                                {{ $program }}
                            </span>

                            <span class="text-xs text-gray-400">
                                {{ $count }} student{{ $count != 1 ? 's' : '' }}
                            </span>

                        </div>

                        <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">

                            <div
                                class="h-full bg-indigo-500 rounded-full"
                                style="width: {{ $barWidth }}%">
                            </div>

                        </div>

                        <div class="mt-1 text-right">

                            <span class="text-xs text-gray-400">
                                {{ $percentage }}%
                            </span>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>


        {{-- System Overview --}}
        <div class="bg-white rounded-2xl border border-gray-100
                    shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-base font-semibold text-gray-900">
                        System Overview
                    </h2>

                    <p class="mt-1 text-xs text-gray-500">
                        Current EduTrack system health
                    </p>

                </div>

                <div class="w-10 h-10 rounded-xl bg-green-50
                            flex items-center justify-center">

                    <i data-lucide="activity"
                       class="w-5 h-5 text-green-600"></i>

                </div>

            </div>


            <div class="mt-6 space-y-3">


                {{-- Application --}}
                <div class="flex items-center justify-between
                            p-4 rounded-xl bg-gray-50">

                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9 rounded-lg bg-green-100
                                    flex items-center justify-center">

                            <i data-lucide="monitor-check"
                               class="w-4 h-4 text-green-600"></i>

                        </div>

                        <div>

                            <p class="text-sm font-medium text-gray-900">
                                Application
                            </p>

                            <p class="text-xs text-gray-400">
                                EduTrack platform
                            </p>

                        </div>

                    </div>

                    <span class="text-xs font-medium text-green-600">
                        Operational
                    </span>

                </div>


                {{-- Database --}}
                <div class="flex items-center justify-between
                            p-4 rounded-xl bg-gray-50">

                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9 rounded-lg bg-blue-100
                                    flex items-center justify-center">

                            <i data-lucide="database"
                               class="w-4 h-4 text-blue-600"></i>

                        </div>

                        <div>

                            <p class="text-sm font-medium text-gray-900">
                                Database
                            </p>

                            <p class="text-xs text-gray-400">
                                Student records
                            </p>

                        </div>

                    </div>

                    <span class="text-xs font-medium text-blue-600">
                        Connected
                    </span>

                </div>


                {{-- API --}}
                <div class="flex items-center justify-between
                            p-4 rounded-xl bg-gray-50">

                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9 rounded-lg bg-purple-100
                                    flex items-center justify-center">

                            <i data-lucide="plug-zap"
                               class="w-4 h-4 text-purple-600"></i>

                        </div>

                        <div>

                            <p class="text-sm font-medium text-gray-900">
                                API Service
                            </p>

                            <p class="text-xs text-gray-400">
                                Student API endpoint
                            </p>

                        </div>

                    </div>

                    <span class="text-xs font-medium text-purple-600">
                        Available
                    </span>

                </div>


                {{-- System Status --}}
                <div class="flex items-center gap-3
                            p-4 mt-4 rounded-xl
                            border border-green-100 bg-green-50">

                    <div class="w-9 h-9 rounded-lg bg-white
                                flex items-center justify-center">

                        <i data-lucide="check-circle-2"
                           class="w-5 h-5 text-green-600"></i>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-green-800">
                            All systems are running normally
                        </p>

                        <p class="text-xs text-green-600 mt-1">
                            EduTrack is ready for use.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- INSIGHT --}}
    {{-- ========================================================= --}}

    <div class="bg-gradient-to-r from-indigo-600 to-purple-600
                rounded-2xl shadow-sm p-6 text-white">

        <div class="flex flex-col sm:flex-row
                    sm:items-center sm:justify-between gap-5">

            <div class="flex items-start gap-4">

                <div class="w-11 h-11 rounded-xl bg-white/15
                            flex items-center justify-center flex-shrink-0">

                    <i data-lucide="lightbulb"
                       class="w-5 h-5"></i>

                </div>

                <div>

                    <p class="text-xs font-medium text-white/70 uppercase
                              tracking-wide">
                        Enrollment Insight
                    </p>

                    @if($totalStudents > 0)

                        <p class="mt-1 text-lg font-semibold">
                            {{ $highestProgramName }} currently has the
                            highest enrollment.
                        </p>

                        <p class="mt-1 text-sm text-white/70">
                            {{ $highestProgram }} student{{ $highestProgram != 1 ? 's' : '' }}
                            currently registered in this program.
                        </p>

                    @else

                        <p class="mt-1 text-lg font-semibold">
                            Your dashboard is ready.
                        </p>

                        <p class="mt-1 text-sm text-white/70">
                            Add student records to start seeing enrollment insights.
                        </p>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection