@extends('layouts.app')

@section('title', 'Students - EduTrack')

@section('header', 'Students')

@section('content')

<div class="space-y-6">

```
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">
            Students
        </h1>

        <p class="text-gray-500 mt-1">
            Manage and monitor all student records.
        </p>
    </div>

    <a href="{{ route('students.create') }}"
       class="inline-flex items-center justify-center gap-2 px-5 py-3
              bg-indigo-600 text-white rounded-xl font-medium
              hover:bg-indigo-700 transition shadow-sm">

        <i data-lucide="plus" class="w-5 h-5"></i>

        Add Student
    </a>

</div>


<!-- Success Message -->
@if(session('success'))

    <div class="flex items-center gap-3 bg-green-50 border border-green-200
                text-green-700 px-4 py-3 rounded-xl">

        <i data-lucide="check-circle" class="w-5 h-5"></i>

        <p class="text-sm font-medium">
            {{ session('success') }}
        </p>

    </div>

@endif


<!-- Statistics -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

    <!-- Total Students -->
    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">

        <p class="text-sm text-gray-500">
            Total Students
        </p>

        <p class="text-3xl font-bold text-gray-900 mt-2">
            {{ $students->count() }}
        </p>

        <p class="text-sm text-gray-500 mt-2">
            Registered student records
        </p>

    </div>


    <!-- Active Students -->
    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">

        <p class="text-sm text-gray-500">
            Active Students
        </p>

        <p class="text-3xl font-bold text-gray-900 mt-2">
            {{ $students->where('status', 'Active')->count() }}
        </p>

        <p class="text-sm text-gray-500 mt-2">
            Currently active
        </p>

    </div>


    <!-- Courses -->
    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">

        <p class="text-sm text-gray-500">
            Courses
        </p>

        <p class="text-3xl font-bold text-gray-900 mt-2">
            {{ $students->unique('course')->count() }}
        </p>

        <p class="text-sm text-gray-500 mt-2">
            Programs represented
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
                View and manage registered student records.
            </p>

        </div>


        <!-- Search -->
        <form action="{{ route('students.index') }}"
              method="GET"
              class="relative">

            <i data-lucide="search"
               class="absolute left-3 top-1/2 -translate-y-1/2
                      w-4 h-4 text-gray-400">
            </i>

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Search students..."
                class="pl-10 pr-4 py-2.5 w-full md:w-64 rounded-xl
                       border border-gray-200
                       focus:outline-none
                       focus:ring-2 focus:ring-indigo-500/20
                       focus:border-indigo-500"
            >

        </form>

    </div>


    @if($students->count() > 0)

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
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @foreach($students as $student)

                        <tr class="hover:bg-gray-50 transition">

                            <!-- Student -->
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-full
                                                bg-indigo-100 text-indigo-600
                                                flex items-center justify-center
                                                font-semibold uppercase">

                                        {{ strtoupper(substr($student->name, 0, 1)) }}

                                    </div>

                                    <div>

                                        <p class="font-medium text-gray-900">
                                            {{ $student->name }}
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            Student record
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


                            <!-- Actions -->
                            <td class="px-6 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('students.edit', $student) }}"
                                       title="Edit Student"
                                       class="p-2 rounded-lg text-gray-400
                                              hover:text-indigo-600
                                              hover:bg-indigo-50 transition">

                                        <i data-lucide="pencil"
                                           class="w-4 h-4">
                                        </i>

                                    </a>


                                    <!-- Delete -->
                                    <form action="{{ route('students.destroy', $student) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this student?');">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            title="Delete Student"
                                            class="p-2 rounded-lg text-gray-400
                                                   hover:text-red-600
                                                   hover:bg-red-50 transition">

                                            <i data-lucide="trash-2"
                                               class="w-4 h-4">
                                            </i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <!-- Empty State -->
        <div class="flex flex-col items-center justify-center
                    py-20 px-6 text-center">

            <div class="w-16 h-16 rounded-2xl bg-indigo-50
                        text-indigo-600 flex items-center justify-center mb-5">

                <i data-lucide="users" class="w-8 h-8"></i>

            </div>

            <h3 class="text-lg font-semibold text-gray-900">
                No students found
            </h3>

            <p class="text-sm text-gray-500 mt-2 max-w-sm">

                @if($search)

                    No student records match your search.

                @else

                    You haven't added any students yet.

                @endif

            </p>


            @if($search)

                <a href="{{ route('students.index') }}"
                   class="mt-5 text-sm font-medium text-indigo-600
                          hover:text-indigo-700">

                    Clear Search

                </a>

            @else

                <a href="{{ route('students.create') }}"
                   class="mt-5 inline-flex items-center gap-2
                          px-4 py-2.5 bg-indigo-600 text-white
                          rounded-xl text-sm font-medium
                          hover:bg-indigo-700 transition">

                    <i data-lucide="plus" class="w-4 h-4"></i>

                    Add Your First Student

                </a>

            @endif

        </div>

    @endif

</div>
```

</div>

@endsection
