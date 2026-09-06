@extends('layouts.app')

@section('title', 'Students')

@section('page-title', 'Students')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Students
            </h1>

            <p class="text-gray-500 mt-1">
                Manage and monitor all student records.
            </p>
        </div>

        <button class="inline-flex items-center justify-center gap-2 px-5 py-3
                       bg-indigo-600 text-white rounded-xl font-medium
                       hover:bg-indigo-700 transition shadow-sm">

            <i data-lucide="plus" class="w-5 h-5"></i>

            Add Student

        </button>

    </div>


    <!-- Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        <!-- Total -->
        <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">

            <p class="text-sm text-gray-500">
                Total Students
            </p>

            <p class="text-3xl font-bold text-gray-900 mt-2">
                {{ $students->count() }}
            </p>

            <p class="text-sm text-green-600 mt-2">
                Registered students
            </p>

        </div>


        <!-- Active -->
        <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">

            <p class="text-sm text-gray-500">
                Active
            </p>

            <p class="text-3xl font-bold text-gray-900 mt-2">
                {{ $students->where('status', 'Active')->count() }}
            </p>

            <p class="text-sm text-gray-500 mt-2">
                Currently enrolled
            </p>

        </div>


        <!-- Pending -->
        <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">

            <p class="text-sm text-gray-500">
                Pending
            </p>

            <p class="text-3xl font-bold text-gray-900 mt-2">
                {{ $students->where('status', 'Pending')->count() }}
            </p>

            <p class="text-sm text-yellow-600 mt-2">
                Needs attention
            </p>

        </div>


        <!-- New Students -->
        <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">

            <p class="text-sm text-gray-500">
                New Students
            </p>

            <p class="text-3xl font-bold text-gray-900 mt-2">
                {{ $students->count() }}
            </p>

            <p class="text-sm text-indigo-600 mt-2">
                Recently registered
            </p>

        </div>

    </div>


    <!-- Student Table -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">


        <!-- Table Header -->
        <div class="p-5 border-b border-gray-100
                    flex flex-col md:flex-row gap-4
                    md:items-center md:justify-between">

            <div>

                <h2 class="font-semibold text-gray-900">
                    All Students
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Student records from the database
                </p>

            </div>


            <!-- Search -->
            <div class="relative">

                <i data-lucide="search"
                   class="absolute left-3 top-1/2
                          -translate-y-1/2 w-4 h-4 text-gray-400">
                </i>

                <input
                    type="text"
                    placeholder="Search students..."
                    class="pl-10 pr-4 py-2.5 w-full md:w-64
                           rounded-xl border border-gray-200
                           focus:outline-none
                           focus:ring-2 focus:ring-indigo-500/20
                           focus:border-indigo-500">

            </div>

        </div>


        <!-- Table -->
        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-gray-50 text-sm text-gray-500">

                    <tr>

                        <th class="px-6 py-4 font-medium">
                            Student
                        </th>

                        <th class="px-6 py-4 font-medium">
                            Student ID
                        </th>

                        <th class="px-6 py-4 font-medium">
                            Course
                        </th>

                        <th class="px-6 py-4 font-medium">
                            Email
                        </th>

                        <th class="px-6 py-4 font-medium">
                            Status
                        </th>

                        <th class="px-6 py-4 font-medium text-right">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">


                    @forelse($students as $student)

                    <tr class="hover:bg-gray-50 transition">


                        <!-- Student -->
                        <td class="px-6 py-4">

                            <div class="flex items-center gap-3">


                                <div class="w-10 h-10 rounded-full
                                            bg-indigo-100 text-indigo-600
                                            flex items-center justify-center
                                            font-semibold">

                                    {{ strtoupper(substr($student->name, 0, 2)) }}

                                </div>


                                <div>

                                    <p class="font-medium text-gray-900">
                                        {{ $student->name }}
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Registered recently
                                    </p>

                                </div>

                            </div>

                        </td>


                        <!-- Student ID -->
                        <td class="px-6 py-4 text-sm text-gray-600">

                            {{ $student->student_id }}

                        </td>


                        <!-- Course -->
                        <td class="px-6 py-4 text-sm text-gray-600">

                            {{ $student->course }}

                        </td>


                        <!-- Email -->
                        <td class="px-6 py-4 text-sm text-gray-600">

                            {{ $student->email }}

                        </td>


                        <!-- Status -->
                        <td class="px-6 py-4">


                            @if($student->status === 'Active')

                                <span class="px-3 py-1 rounded-full
                                             text-xs font-medium
                                             bg-green-50 text-green-600">

                                    Active

                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full
                                             text-xs font-medium
                                             bg-yellow-50 text-yellow-600">

                                    Pending

                                </span>

                            @endif


                        </td>


                        <!-- Action -->
                        <td class="px-6 py-4 text-right">

                            <button
                                class="text-gray-400
                                       hover:text-indigo-600
                                       transition">

                                <i data-lucide="more-horizontal"
                                   class="w-5 h-5">
                                </i>

                            </button>

                        </td>


                    </tr>


                    @empty


                    <!-- Empty State -->
                    <tr>

                        <td colspan="6" class="px-6 py-12 text-center">

                            <div class="flex flex-col items-center">


                                <i data-lucide="users"
                                   class="w-10 h-10 text-gray-300">
                                </i>


                                <p class="mt-3 font-medium text-gray-900">
                                    No students found
                                </p>


                                <p class="text-sm text-gray-500">
                                    Add a student to get started.
                                </p>


                            </div>

                        </td>

                    </tr>


                    @endforelse


                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection